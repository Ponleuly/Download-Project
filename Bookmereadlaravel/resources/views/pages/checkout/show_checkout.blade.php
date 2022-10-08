@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">

        <!--/breadcrums-->


        <!--/checkout-options-->

        <div style=" text-align: center;" class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-4">
                    <div class="shopper-info">
                        <p style="background-color: yellow;  margin-top:20px;">Shopper Information</p>
                        <form style="width: 400px;" action="{{URL::to('/save-checkout-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="shipping_email" placeholder="Email">
                            <input type="text" name="shipping_name" placeholder="User Name">
                            <input type="text" name="shipping_address" placeholder="Address">
                            <input type="text" name="shipping_phone" placeholder="Phone Number">
                            <textarea name="shipping_notes" style="resize: none; margin-top:10px;" cols="70" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                            <input type="submit" value="Place Order" class="btn">
                        </form>

                    </div>



                </div>
            </div>


        </div>
</section>
@endsection