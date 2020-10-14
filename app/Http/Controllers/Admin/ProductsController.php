<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Product;
use App\Role;
use App\Category;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index','show']);
    }

    /**
     * Display a listing of the products.
     * According to their authorisation, users are redirected to different views.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        $categories = Category::get();
        return view('admin.products.index')->with(['categories' => $categories, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource for admin users.
     * If the user isn't authorised to create a product, he gets redirected to
     * the products list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created product in the database and confirm to the user it's update in case of success
     * or warn them in case of failure.
     * The product is stored once it mets the requirement specified in this method.
     * Once stored, the user is redirected to the view of the products list.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:5|string',
            'description' => 'required|min:10|string',
            'image' => 'required|file|max:5000|image',
            'refNumber' => 'required|unique:products|max:8'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->refNumber = $request->refNumber;
        $product->image = $this->storeImage($product);
        if ($request->price) {
            $product->price = ($request->price) * 100;
        }
        $product->category_id = $request->category;

        if ($product->save()) {
            $request->session()->flash('success', $product->name . ' has been created');
            return redirect()->route('admin.products.index');
        } else {
            $request->session()->flash('error', 'There was an error at the creation');
            return redirect()->back();
        }  
    }

    /**
     * Display the product choosen by the user.
     * If the user has admin access it gives them access to a view which allow to modify it.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return view('admin.products.show')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::get();
        $roles = Role::all();
        return view('admin.products.edit')->with([
            'product' => $product,
            'roles' => $roles,
            'categories' => $categories
        ]);
    }

    /**
     * Update the product in the database and confirm to the user it's update in case of success
     * or warn them in case of failure.
     * Then it redirect them to the admin product's list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'min:5',
            'refNumber'=>'max:8',
            'description' => 'min:10',
            'image' => 'file|max:5000|image',
        ]);
        $product->name = $request->name;
        $product->refNumber = $request->refNumber;
        $product->description = $request->description;

        $path = $this->storeImage($product);
        if ($path) {
            $product->image = $path;
        }
        if ($request->price) {
            $product->price = ($request->price) * 100;
        }
        $product->category_id = $request->category;
        if ($product->save()) {
            $request->session()->flash('success', $product->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating');
        }
        return redirect()->route('admin.products.index');
    }


    /**
     * Remove the specified resource from storage.
     * Use a gate to redirect unauthorized user to common product's list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Le produit a bien été supprimé.');
    }
    /**
     * Used to store the Images for the product already inserted into the database
     * into the public file to get access to it anywhere and to load
     * it on the website later on.
     * @param Product product
     */
    private function storeImage($product)
    {
        if (request()->has('image')) {
            return request()->image->store('uploads');
        }
    }
}
