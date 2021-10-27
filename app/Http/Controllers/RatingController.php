<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class RatingController extends Controller
{
    public function productRating($id){

        $product = Product::find($id);
        return view('rating', ['product' => $product]);
    }

    public function storeProductRating(Request $req){

        $req->validate([
            'username' => ['required', 'regex: /^[a-zA-Z0-9\s]*$/'],
            'rating' => 'required | numeric | max:5',
            'review' => 'nullable'
        ]);
        $rating = new Rating;
        $rating->username = $req->username;
        $rating->rating = $req->rating;
        $rating->review = $req->review;
        $rating->product_id = $req->id;
        $rating->save();
        $req->session()->flash('status', "$rating->username has been rated the product");
        return redirect('/moreinfo/' . $req->id);
    }

}
