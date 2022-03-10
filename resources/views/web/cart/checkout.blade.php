
@extends('web.layouts.master')
@section('content')
    <!-- begin main -->
    <main class="container-fluid">
        <div class="site-padding">
            <div class="row  mb-5">
                <div class="col-12 mt-5 ">
                    <h1 class="font-xl">تأكيد الدفع</h1>
                </div>
                <div class="col-12 mt-3 mb-3 ">
                    <div class="custom-card">
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide' >
                                <div class='alert-danger alert'>Please correct the errors
                                    and try
                                    again.
                                </div>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <form action="{{route('confirm.checkout')}}" method="POST"
                                  class="require-validation"
                                  data-cc-on-file="false"
                                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                  id="payment-form">
                                @csrf
                                <input type="hidden" name="paymentIntentId" value="{{$paymentIntentId}}">
                                <div class="col-lg-12">
                                    <div>
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Name on Card</label> <input
                                                    class='form-control' size='4' type='text'>
                                            </div>
                                        </div>
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group  required'>
                                                <label class='control-label'>Card Number</label> <input
                                                    autocomplete='off' class='form-control card-number'
                                                    size='20'
                                                    type='text'>
                                            </div>
                                        </div>
                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label> <input
                                                    autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311'
                                                    size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM'
                                                    size='2'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY'
                                                    size='4'
                                                    type='text'>
                                            </div>
                                        </div>

                                    </div>

                                        <div class="col-12 pt-4">

                                            <div id="paymentMethods">
                                                <div class="font-md text-primary">
                                                </div>
                                                <div class="mt-3">

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="text-end">

                                        <button class="btn btn-primary px-4" type="submit">
                                            تأكيد الدفع
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->

@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function () {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
@endsection

