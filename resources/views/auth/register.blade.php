@extends('frontend.master')

@section('content')
<section id="about">
    <div class="container">
        <div class="row">
            <div class="about-heading text-center">
                <h2>My Account</h2>
                <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>My Account</span></p>
            </div>
        </div>
    </div>
</section>
<!-- About Banner End -->

<!-- my account part Start -->
<section id="account">
 <div class="container">
     <div class="row">
        @component('auth.log_reg')
            
        @endcomponent
     </div>
 </div>
</section>
<!-- my account part End -->  
@component('frontend.includes.brand')
    
@endcomponent
@endsection
