<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use App\Order;
use App\Product;
use DateTime;

use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0){
            return redirect()->route('order.index');
        }
        Stripe::setApiKey('sk_test_51H57bhC5QLYczCj4Te8SdNlRt3KX1k9fXSdpbmxxcOdNStc1mzobyuOIvHe8xK2Nc9EPGoXfAH8GxweSLje6bPbV00B4XnTyvt');
        $intent = PaymentIntent::create([
            'amount' => intval(Cart::total()),
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => [
                'userId'=> Auth::user()->id,
                'integration_check' => 'accept_a_payment'
            ],
          ]);

        $clientSecret= Arr::get($intent,'client_secret');
        return view('checkout.index',[
            'clientSecret' => $clientSecret
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();
        $order= new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];
        $order->payment_created_at=(new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');
        $products =[];
        $i=0;
        foreach (Cart::content() as $product){
            $products['product_'.$i]['id']=$product->model->id;
            $products['product_'.$i]['name']=$product->model->name;
            $products['product_'.$i]['ref']=$product->model->refNumber;
            $products['product_'.$i]['price']=$product->model->price/100;
            $products['product_'.$i]['qty']=$product->qty;
            $i++;
        }
        $order->products = serialize($products);
        $order->user_id=Auth::user()->id;
        $order->save();
        if($data['paymentIntent']['status']==='succeeded'){
            Cart::destroy();
            Session::flash('success', 'Your order is successful');
            
            return response()->json(['success'=>'Payment Intent Succeeded']);
        }
        else{
            return response()->json(['error'=>'Payment Intent Not Succeeded']);
        }
    }

    public function orderFormatMail($data){
        $message="";
        $newdata=['name','e-mail','subject','message'];
        $newdata['name']=Auth::user()->name;
        $newdata['email']=Auth::user()->email;
        $newdata['subject']="New Order";
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                $message=' '.$message.$key."=".$value."  ";
            }
            $message=$message."\\\r\\\n";
        }
        $newdata['message']=$message;
        return $newdata;

    }


    public function thankyou(Request $request){

        $order= Order::where('user_id',Auth::user()->id)->latest()->first();
        
        $amount=getPrice($order->amount);
        $orderProducts=unserialize($order->products);
        $mailformat=$this->orderFormatMail($orderProducts);
        $products =[];
        foreach ($orderProducts as $key => $value) {
            $product = Product::find($value['id']);
            $product->qty= $value['qty'];
            $products[]=$product;
        }
        Session::flash('success', 'Your order is successful');

        Mail::to('superadmin@admin.com')->send(new ContactMail($mailformat));
        
        return Session::has('success')? view('checkout.thankyou',['products'=>$products,'amount'=>$amount]):dd($request);
    }
}
