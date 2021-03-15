<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function __construct(Product $products)
     {
        $this->products = $products;
     }

    public function index()
    {
        $products = $this->products->limit(9)->orderBy('id','DESC')->get();
        return view('welcome', compact('products'));
    }

    public function single($slug)
    {
        $product = $this->products->whereSlug($slug)->first();

        return view('single', compact('product'));
    }
}
