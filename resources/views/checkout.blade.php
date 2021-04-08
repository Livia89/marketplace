@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Dados para pagamento</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <label for="card_number">Número do cartão </label>  <br>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input class="form-control" type="text" name="card_number" id="card_number">  
                            <input class="form-control" type="hidden" name="card_brand" id="card_brand">  
                        </div>
                    </div>
                    <div class="col col-md-3"><span class='form-group' id='brand'></span> </div>
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
                    <div class="col-md-8 form-group installments">
                        <label for="card_cvv"> </label> <br>
                        
                    </div>
                </div>
                <button class="btn btn-success btn-lg processCheckout">Efetuar Pagamento</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{asset('assets/js/jquery.ajax.js')}}"></script>
    
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
                            console.log(spanBrand);
                            document.querySelector("input[name='card_brand']").value = res.brand.name;
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

        let submitBtn = document.querySelector("button.processCheckout");


        submitBtn.addEventListener("click", function(evt){
            evt.preventDefault();
            PagSeguroDirectPayment.createCardToken({
                cardNumber: document.querySelector("input[name=card_number]").value,
                brand: document.querySelector("input[name=card_brand]").value,
                cvv: document.querySelector("input[name=cvv]").value,
                expirationMonth: document.querySelector("input[name=card_month]").value,
                expirationYear: document.querySelector("input[name=card_year]").value,
                success: function(res){
                    proccessPayment(res.card.token)
                }

            });
        });
        
        /* TODO- Parei aqui pois a API estava dando erro */

        function proccessPayment(token){
            let data = {
                card_token: token,
                hash: PagSeguroDirectPayment.getSenderHash(),
                installment: document.querySelector(".select_installments").value,
                _token: '{{csrf_token()}}'
            };

            $.ajax({
                type: 'POST',
                url: '{{route("checkout.proccess")}}',
                data: data,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                }
            });
        }

        function getInstallments(amount, brand){
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,   
                maxInstallmentNoInterest: 0,
                success: function(res){
                    
                    let selectInstallments = drawSelectInstallments(res.installments[brand]);
                    document.querySelector('div.installments').innerHTML = selectInstallments;
                },
                error: function(error){ 

                },
                complete: function(comp){
                }
            });
        }

        
    function drawSelectInstallments(installments) {
		let select = '<label>Opções de Parcelamento:</label>';

            select += '<select class="form-select select_installments" aria-label="Default select example">';

            for(let l of installments) {
                select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
            }


            select += '</select>';

            return select;
	}
    </script>
@endsection