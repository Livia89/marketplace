<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Verificar se o user esta logado, se sim manda para a página de pagamento, se não manda para a tela de login
        if(!auth()->check()){
            
            return redirect()->route('login');
        }

        dd($this->makePagSeguroSession());

        return view('checkout');
    }

    private function makePagSeguroSession(){

        $sessionCode = \PagSeguro\Services\Session::create(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        print $sessionCode->getResult();
    }
}
