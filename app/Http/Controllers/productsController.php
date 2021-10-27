<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class productsController extends Controller
{
    public function getProductsData(){

        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function storeProductsData(Request $req){

        $req->validate([

            'file' => 'required | mimes:jpg,jpeg,png,webp,gif | max:20000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'type' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'brand' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'price' => 'required | max:12',
        ]);
        $products = new Product;
        if($req->hasFile('file')){

            $destination = 'public/uploads';
            $image = uniqid('', true) . '.' . $req->file('file')->guessClientExtension();
            $req->file('file')->storeAs($destination, $image);
            $products->image = $image;
        }
        $products->name = $req->name;
        $products->type = $req->type;
        $products->brand = $req->brand;
        $products->price = $req->price;
        $products->save();
        $req->session()->flash('status', 'New product has been added successfully');
        return redirect('/');
    }

    public function productData($id){

        $product = Product::find($id);
        $ratings = Product::find($id)->getProductRating->sortByDesc('id');
        $productRating = $ratings->map(fn($item, $key) => $item->rating)->avg();
        return view('moreinfo', ['product' => $product, 'ratings' => $ratings, 'productAvgRating' => $productRating]);
    }

    public function getEditData($id){

        $product = Product::find($id);
        return view('edit', ['product' => $product]);
    }

    public function editProductData(Request $req){

        $req->validate([

            'file' => 'nullable | mimes:jpg,jpeg,png,webp,gif | max:20000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'type' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'brand' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'price' => 'required | max:12',
        ]);
        $product = Product::find($req->id);
        if($req->hasFile('file')){

            $destination = 'public/uploads';
            $image = uniqid('', true) . '.' . $req->file('file')->guessClientExtension();
            Storage::disk('public')->delete('uploads/' . $product->image);
            $req->file('file')->storeAs($destination, $image);
            $product->image = $image;
        }
        $product->name = $req->name;
        $product->type = $req->type;
        $product->brand = $req->brand;
        $product->price = $req->price;
        $product->save();
        $req->session()->flash('status', 'Product data updated successfully');
        return redirect('/');
    }

    public function deleteProductData($id){

        $product = Product::find($id);
        $product->delete();
        Storage::disk('public')->delete('uploads/' . $product->image);
        Session::flash('status', 'Product data deleted successfully');
        return redirect('/');
    }

    public function searchProductData(Request $req){

        $products = Product::where('name', 'like', '%'. $req->search .'%')
                    ->orWhere('type', 'like', '%'. $req->search .'%')
                    ->orWhere('brand', 'like', '%'. $req->search .'%')
                    ->get();
        return view('products', ['products' => $products]);
    }
}
