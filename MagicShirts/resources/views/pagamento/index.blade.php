@extends('layout')
@section('content')

    <style>
        body {
            background: #f5f5f5
        }

        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }

    </style>

    {{-- @csrf

    <div class="btn-group" style="width: 100%;">
        <button class="col-lg-6 btn btn-primary">PAYPAL</button>
        <button class="col-lg-6 btn btn-success">VISA</button>
    </div>





    <div class="col-12 col-lg-3" style="display: none" id="div_hidden">
        <div style="position: relative; left: 0; top: 0;">
            <a href="#">News <span class="badge">5</span></a><br>


        </div>
    </div> --}}


    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Pagamento</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i
                                            class="fas fa-credit-card mr-2"></i> VISA </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i
                                            class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form role="form" onsubmit="event.preventDefault()">
                                    <div class="form-group"> <label for="username">
                                            <h6>Nome</h6>
                                        </label> <input type="text" name="username" required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Número do Cartão</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" class="form-control "
                                                required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i
                                                        class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name=""
                                                        class="form-control" required> <input type="number" placeholder="YY"
                                                        name="" class="form-control" required> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="button"
                                            class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <h6 class="pb-2">Selecione o seu tipo de conta paypal</h6>
                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio"
                                        checked> Domestica </label> <label class="radio-inline"> <input type="radio"
                                        name="optradio" class="ml-5">Internacional </label></div>
                            <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into
                                    my Paypal</button> </p>
                            <p class="text-muted"> Nota: Após clicar no botão, você será direcionado a um gateway seguro para pagamento. Após concluir o processo de pagamento, você será redirecionado ao site para ver os detalhes do seu pedido. </p>
                        </div> <!-- End -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })

        </script>

    @endsection
