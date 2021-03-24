<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
         session()->forget('pagseguro_session_code');
         $this->makePagSeguroSession();
        // Verificar se o user esta logado, se sim manda para a página de pagamento, se não manda para a tela de login
        if(!auth()->check()){
            
            return redirect()->route('login');
        }

      
        return view('checkout');
    }

    private function makePagSeguroSession(){

        if(!session()->has('pagseguro_session_code')){
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
        }

        return session()->put('pagseguro_session_code', $sessionCode->getResult());
    }

    
}
