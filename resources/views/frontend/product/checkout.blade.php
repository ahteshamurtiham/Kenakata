@extends('frontend.master')

@section('content')

<!-- About Banner Start -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="about-heading text-center">
                <h2>Checkout</h2>
                <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>Checkout</span></p>
            </div>
        </div>
    </div>
</section>
<!-- About Banner End -->

<!-- checkout part Start -->
<section id="checkout">
 <div class="container">
     <div class="row">
        <form action="{{ route('shipping-post') }}" method="POST" id="payment-form">
            {{--  upore id payment form ta payment gateway er jonno  --}}
            @csrf
         <div class="col-md-8">
            <div class="checkout-input">
               <div class="">
                    <div class="">
                     <ul class="nav nav-tabs" role="tablist">
                         <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">BILLING DETAILS</a></li>
                          <li><a href="#">|</a></li>
                         <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Shipping Address</a></li>
                         <li class="tahsan12"><a href="#">(if there is any different shipping address)</a></li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                         <div role="tabpanel" class="tab-pane active" id="home">
                             <div class="form-group">
                             <input type="text" class="form-control" value="{{ $users->first_name .' '. $users->last_name }}" id="name" name="name" placeholder="Name*" >
                         </div>
                         <div class="form-group col-md-6 pl0">
                             <input type="text" class="form-control"  value="{{ $users->email }}" id="email" name="email" placeholder="Email*" >
                         </div>
                         <div class="form-group col-md-6 pr0">
                             <input type="text" class="form-control"  value="{{ $users->phone }}" id="mobile" name="phone" placeholder="Phone*" >
                         </div>
                         <div class="form-group">
                             <select class="form-control singlecountry" name="country_id" id="country">
                                 <option>Country*</option>
                                 @foreach ($countries as $country)
                                 <option value="{{ $country->id }}"> {{  $country->name   }}</option>
                                 @endforeach


                             </select>
                         </div>
                         <div class="form-group">
                             <select class="form-control" name="city_id" id="city">

                             </select>
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" id="address" name="address" placeholder="Address*" >
                         </div>

                         <div class="form-group">
                             <textarea class="form-control" id="message" name="notes" placeholder="Order Notes Here" maxlength="140" rows="7"></textarea>
                         </div>
                         </div>
                         {{-- <div role="tabpanel" class="tab-pane" id="profile">
                             <div class="form-group">
                             <input type="text" class="form-control" id="name09" name="name" placeholder="Name*" >
                             </div>
                             <div class="form-group col-md-6 pl0">
                                 <input type="text" class="form-control" id="email02" name="email" placeholder="Email*" >
                             </div>
                             <div class="form-group col-md-6 pr0">
                                 <input type="text" class="form-control" id="mobile01" name="mobile" placeholder="Phone*" required>
                             </div>
                             <div class="form-group">
                                 <select class="form-control">
                                     <option value="">Country*</option>
                                     <option value="">Bangladesh</option>
                                     <option value="">United states</option>
                                     <option value="">United Kingdom</option>
                                     <option value="">Canada</option>
                                     <option value="">Spain</option>
                                     <option value="">Italy</option>
                                     <option value="">France</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <select class="form-control">
                                     <option value="">Town/City*</option>
                                     <option value="">Dhaka</option>
                                     <option value="">London</option>
                                     <option value="">NewYork</option>
                                     <option value="">Barcelona</option>
                                     <option value="">Paris</option>
                                     <option value="">Roma</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <textarea class="form-control" id="message01" placeholder="Order Notes Here" maxlength="140" rows="7"></textarea>
                             </div>
                         </div> --}}
                     </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 totala">
            <div class="total-amount">
                 <ul>
                     <li><h3>Cart Total</h3></li>
                     {{--  <li><span>Cart Subtotal</span><a href="#">$ {{$totals }} </a></li>
                     <li><span>(+) Shipping</span><a href="#">$ 10.00</a></li>
                     <li><span>(-) Discount</span><a href="#">$ {{ $discount }}</a></li>  --}}
                     <li><span>Grand Total</span><a href="#">৳ {{ $grand_total }}</a></li>
                 </ul>
             </div>
              <div class="payments">
                <div class="payment-head">
                    <h3>Payments</h3>

                     <div class="payments">
                         <input type="radio"  name="payment" id="stripe" value="stripe">Stripe<br>
                         <input type="radio" name="payment" id="paypal" value="paypal">Paypal<br>
                     </div>

                     {{--  ****stripe er css  --}}
                     <style>
                        .StripeElement {
                            box-sizing: border-box;

                            height: 40px;

                            padding: 10px 12px;

                            border: 1px solid transparent;
                            border-radius: 4px;
                            background-color: white;

                            box-shadow: 0 1px 3px 0 #e6ebf1;
                            -webkit-transition: box-shadow 150ms ease;
                            transition: box-shadow 150ms ease;
                          }

                          .StripeElement--focus {
                            box-shadow: 0 1px 3px 0 #cfd7df;
                          }

                          .StripeElement--invalid {
                            border-color: #fa755a;
                          }

                          .StripeElement--webkit-autofill {
                            background-color: #fefde5 !important;
                          }
                     </style>


                            <div class="form-row"  id="payform">
                              <label for="card-element">
                                Credit or debit card
                              </label>
                              <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                              </div>

                              <!-- Used to display form errors. -->
                              <div id="card-errors" role="alert"></div>
                            </div>

                            {{--  <button>Submit Payment</button>  --}}


                     <div class="procd">
                         <button type="submit" class="btn btn-primary">Place Order</button>

                     </div>
                     @if ($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                </ul>
    </div>
@endif
                </div>
            </div>
        </div>
        </form>
     </div>
 </div>
</section>
<!-- checkout part End -->


@component('frontend.includes.brand')

@endcomponent


@endsection

@section('footer_js')
<link rel="stylesheet" href="css/jQuery.fancybox.css">
{{--  //stripr er link  --}}
<script src="//js.stripe.com/v3/"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="{{ url('/front') }}/js/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="{{ url('/front') }}/js/jquery.fancybox.pack.js"></script>
<script src="{{ url('/front') }}/js/setup.js"></script>
<script>

    $('#country').change(function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
               type:"GET",
               url:"{{url('/country/cities')}}/"+countryID,
               success:function(res){
                if(res){
                    $("#city").empty();
                    $("#city").append('<option> Select One</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+ value.id +'">'+ value.name+'</option>');
                    });

                }else{
                   $("#city").empty();
                }
               }
            });
        }else{
            $("#city").empty();
            $("#city").empty();
        }
       });


    {{--  show hide radio button jquery  --}}
    $("#payform").hide(); //agei hide thakbe
    $('#stripe').click(function(){

        if ($("#stripe").is(":checked")) {
          $("#payform").show();
        } else {
          $("#payform").hide();
        }
       });

</script>

{{--  stripe er raw js  --}}
<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_ge0asYvLQCyym4QL1Y6odWRQ003akcSmQe');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>




@endsection
