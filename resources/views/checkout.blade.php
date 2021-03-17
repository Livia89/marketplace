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
                            <label for="card_number">Número do cartão <br>
                                <input class="form-control" type="text" name="card_number" id="card_number">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 form-group">
                        <label for="card_month">Mês de expiração <br>
                            <input class="form-control" type="text" name="card_month" id="card_month">
                        </label>
                    </div>
                    
                    <div class="col-md-4 form-group">
                        <label for="card_year"> Ano de expiração <br>
                            <input class="form-control" type="text" name="card_year" id="card_year">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="card_cvv">Código de Segurança<br>
                            <input class="form-control" type="text" name="card_cvv" id="card_cvv">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success btn-lg">Efetuar Pagamento</button>
            </form>
        </div>
    </div>
@endsection