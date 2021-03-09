<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
        
    }
    public function add(Request $r)
    {
        
        $product = $r->get('product');
        
        // check if already start cart session 
        if(session()->has("cart")){
            // yes - add products in session [push -> append]
            session()->push('cart', $product);
        }else{
            // no - create session to first product [put -> create]
            $products[] = $product;
            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho')->success();
        return redirect()->route('product.single', ['slug' => $product["slug"]]);
    }

    public function remove($slug)
    {
        
        if(!session()->has("cart")) return redirect()->route('cart.index');

        $products = session()->get('cart');

        // Passa por cada registo e verifica se o slug é diferente do enviado
        $products = array_filter($products, function($line) use($slug){
            return $line["slug"] != $slug;
        });

        session()->put('cart', $products);
        // flash("Artigo removido do carrinho")->success();
        return redirect()->route('cart.index');

    }
}
