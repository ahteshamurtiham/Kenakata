 {{--  error msg notification social  --}}
 @if(session('errorMsg'))
 <div class="alert alert-danger" role="alert">
    {{ session('errorMsg') }}
 </div>
@endif

<div class="col-md-6">
    <div class="login-account">
        <h3>login your account</h3>
        {{-- laravel er login authentcation kaj korbe --}}
    <form action="{{ route('login')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
       <div class="tahsan3">
           <div class="checkbox chek2 checkbox-success check33">
                <input id="checkbox111" type="checkbox">
                <label for="checkbox111">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
       </div>
       <div class="procd">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        </form>

        <div class="social-login" style="margin-top:30px;">
           <p style="margin-bottom:20px; color:brown; font-size:16px;">You Can Also Login With:</p>
            <a href="{{ url('/login/github') }}" style="padding:12px 22px; background:#270b0d; border-radius:5px;" class=""><i class="fa fa-github" style="font-size:20px; color:#ffffff;"></i></a>
            <a href="#" style="padding:12px 22px; background:#0c9fe8; border-radius:5px; margin-left:8px;" class=""><i class="fa fa-google" style="font-size:20px;color:#030303"></i></a>
        </div>

    </div>

</div>

<div class="col-md-6">
    <div class="register">
        <h3>Register Now <a href="#">(If don’t have any account)</a></h3>
    <form action="{{route('register')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-6 login-account">
                <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" >
            </div>
        </div>
            <div class="col-md-6 login-account">
                <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" >
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6 login-account">
            <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="E-mail" >
        </div>
    </div>
        <div class="col-md-6 login-account">
            <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" >
        </div>
    </div>
    </div>
        <div class="row">
            <div class="col-md-6 login-account">
                <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" >
            </div>
        </div>
            <div class="col-md-6 login-account">
                <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >
            </div>
        </div>
        </div>
        <div class="tahsan3 tahsan5">
           <div class="checkbox chek2 checkbox-success check33">
                <input id="checkbox113" type="checkbox">
                <label for="checkbox113"> I accept all the term and conditions, including privacy policy</label>
            </div>
       </div>
       <div class="register-now">
           <div class="procd">
              <button type="submit" class="btn btn-primary">Register</button>
          </div>
       </div>
       </form>
    </div>
</div>
