<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Category;
use App\Product;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function index(){
        return view('order.panier');
    }

    public function search(){
        request()->validate([
            'q'=>'required|min:3'
        ]);
        $categories=Category::get(); 
        $q = request()->input('q');
        $salableProducts=Product::whereNotNull('price')
            ->where('name','like',"%$q%")
            ->orWhere('description','like',"%$q%")->paginate(24);
        return view('order.orderindex')->with(['salableProducts'=>$salableProducts,'categories'=>$categories]);
    }
    
    public function productsByCategory(Request $request){
        $categories=Category::get(); 
        $salableProducts = Product::whereNotNull('price')->where('category_id',$request->category)->paginate(24);
        return view('order.orderindex')->with(['salableProducts'=>$salableProducts,'categories'=>$categories]);
    }
    public function indexSalableProducts(){
        $categories= Category::get();
        $salableProducts = Product::whereNotNull('price')->paginate(24);
        return view('order.orderindex')->with(['salableProducts'=>$salableProducts,'categories'=>$categories]);
    }

    public function store(Request $request){
        if(Auth::user()){
            $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
                return $cartItem->id == $request->product_id;
            });
            if ($duplicata->isNotEmpty()){
                return redirect()->route('order.indexSalableProducts')->with('success','le produit a déjà été ajouté');
            }
            $product= Product::find($request->product_id);
            Cart::add($product->id,$product->name,1,$product->price)
            ->associate('App\Product');
            return redirect()->route('order.indexSalableProducts')->with('success','le produit a bien été ajouté');
        }
        else{
            return view('auth.login')->with('warning','You need to be logged in to order.');
        }
    }
    
    public function update(Request $request,$rowId){
        $data=$request->json()->all();
        $validator= Validator::make($request->all(),[
            'qty'=>'required|numeric|between:1,10'

        ]);
        if($validator->fails()){
            Session::flash('danger','Quantity cannot be higher than 10');
            return response()->json(['success'=>'Cart quantity has not been updated']);
        }
        else{
        Cart::update($rowId,$data['qty']);
        Session::flash('success','Quantity is at '.$data['qty'].'');
        return response()->json(['success'=>'Cart quantity has been updated']);
        }
    }

    public function destroy($rowId){
        Cart::remove($rowId);
        return back()->with('success','Le produit a bien été supprimé de votre panier.');
    }
}
