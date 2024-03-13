<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

class CompanyController extends Controller
{
    //Company dashboard
    public function companyDashboard(){

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'company') {
            
            return view('/'.Auth::user()->role.'/dashboard');

        }

        return view('/company/dashboard');

    }

    //Company profile
    public function companyProfile(){

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'company') {
            
            return view('/'.Auth::user()->role.'/profile');

        }

        return view('/company/profile');

    }

    //Company orders
    public function companyOrders(){
       
        $companyId =  Auth::user()->id;
        $orders = Order::where('company_id', $companyId)->get();

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'company') {
            
            return view('/'.Auth::user()->role.'/orders',compact('orders'));

        }

        return view('/company/orders',compact('orders'));

    }

    //Company Catalog
    public function companyCatalog(){

        // Get the ID of the currently authenticated company
        $companyId = Auth::user()->id;

        // Get all products related to the current company
        $products = Product::where('company_id', $companyId)->get();

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'company') {
            
            return view('/'.Auth::user()->role.'/catalog',compact('products'));

        }

        return view('/company/catalog',compact('products'));

    }

    //Show page product
    public function showproduct($id){

        $product = Product::find($id);
          
        return view('/company/showproduct',compact('product'));

    }

    //Update page product
    public function updateproduct($id){

        $product = Product::find($id);
          
        return view('/company/product_update',compact('product'));

    }

    //Update product
    public function edit_product(Request $request, $id){

        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->type = $request->type;
        $product->brand = $request->brand;
        $product->model_number = $request->model_number;
        $product->upc = $request->upc;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->shipping = $request->shipping;
        $product->weight = $request->weight;
        $product->color = $request->color;
        $product->dimensions = $request->dimensions;
        $product->material =$request->material;
        $product->warranty = $request->warranty;
        $product->features = $request->features;

        //checkbox active?
        if(!$request->active){
            $product->active = 0;
        }
        else{
             $product->active = $request->active;
        }

        $image = $request->image;

        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images/products',$imagename);
            $product->image = $imagename;

        }

        $product->save();
        return redirect()->back();
    }

    //Create page product
    public function createproduct(){
          
        return view('/company/createproduct');

    }

    //Create the product
    public function add_product(Request $request){
          
         $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->type = $request->type;
        $product->brand = $request->brand;
        $product->model_number = $request->model_number;
        $product->upc = $request->upc;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->shipping = $request->shipping;
        $product->weight = $request->weight;
        $product->color = $request->color;
        $product->dimensions = $request->dimensions;
        $product->material =$request->material;
        $product->warranty = $request->warranty;
        $product->features = $request->features;

        //Associate product to the company
        $product->company_id = Auth::user()->id;

        //checkbox active?
        if(!$request->active){
            $product->active = 0;
        }
        else{
             $product->active = $request->active;
        }

        $image = $request->image;

        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images/products',$imagename);
            $product->image = $imagename;

        }
        else{
            $product->image = "default.png";
        }

        $product->save();
        return redirect()->back();

    }

    //Delete page product
    public function deleteproduct($id){

        $product = Product::find($id);
          
        return view('/company/product_delete',compact('product'));

    }

    //Delete product
    public function destroy($id)
{
        $product = Product::find($id);

        $product->delete();

    return redirect()->route('company.catalog');
}
}
