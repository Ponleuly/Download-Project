@extends('layout')
@section('content')
<div class="account-page">
    <div class="container">

        <div class="form-container">
            <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                <hr id="Indicator">
            </div>
            <form id="LoginForm" action="{{URL::to('/login-customer')}}" method="POST">
                {{csrf_field()}}
                <input type="text" name="email_account" placeholder="Email">
                <input type="password" name="password_account" placeholder="Password">
                <button type="submit" class="btn">Login</button>
                <a href="">Forgot password</a>
            </form>
            <form id="RegForm" action="{{URL::to('/add-customer')}}" method="POST">
                {{csrf_field()}}
                <input type="text" name="customer_name" placeholder="Username">
                <input type="email" name="customer_email" placeholder="Email">
                <input type="password" name="customer_password" placeholder="Password">
                <input type="text" name="customer_phone" placeholder="Phone Number">
                <button type="submit" class="btn">Register</button>

            </form>

        </div>

    </div>
</div>
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }
</script>
@endsection