@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dados para pagamento</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="card_number">Número do cartão </label>  <span id='brand'></span> <br>
                                <input class="form-control" type="text" name="card_number" id="card_number"> 
                            
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 form-group">
                        <label for="card_month">Mês de expiração  </label> <br>
                            <input class="form-control" type="text" name="card_month" id="card_month">
                       
                    </div>
                    
                    <div class="col-md-4 form-group">
                        <label for="card_year"> Ano de expiração  </label> <br>
                            <input class="form-control" type="text" name="card_year" id="card_year">
                       
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="card_cvv">Código de Segurança </label> <br>
                            <input class="form-control" type="text" name="card_cvv" id="card_cvv">
                       
                    </div>
                </div>
                <button class="btn btn-success btn-lg">Efetuar Pagamento</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    
    <script>
        /* Identificando a sessão com o sessionId da pagSeguro */
        const sessionId = '{{session()->get("pagseguro_session_code")}}';
        PagSeguroDirectPayment.setSessionId(sessionId);

    </script>

    <script>
        /* Pegar bandeira do cartão com helpers do pagSeguro - https://dev.pagseguro.uol.com.br/reference/checkout-transparente#checkout-transparente-gerando-uma-sessao*/
        let cardNumber = document.querySelector("#card_number");
        let spanBrand = document.querySelector("#brand");
       
        cardNumber.addEventListener('keyup', function(){
                if(cardNumber.value.length >= 6){

                    PagSeguroDirectPayment.getBrand({
                        cardBin: cardNumber.value.substr(0, 6),
                        success: function(res){
                            let imgFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`;
                            spanBrand.innerHTML = imgFlag;

                            getInstallments(40, res.brand.name);
                        },
                        error: function(error){
                            console.log(error);
                        },
                        complete: function(comp){
                        }
                    }); /* traz as infos dos cartoões*/

                }
        });

        function getInstallments(amount, brand){
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,
                maxInstallmentNoInterest: 0,
                success: function(res){
                    console.log(res);
                },
                error: function(error){
                },
                complete: function(comp){
                }
            });
        }
    </script>
@endsection