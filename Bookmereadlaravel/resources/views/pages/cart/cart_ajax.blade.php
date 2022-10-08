@extends('layout')
@section('content')

<h2 class="title">Your Cart</h2>
<div class="small-container cart-page">


    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <!-- @foreach($content as $v_content)

        @endforeach -->
        @php
        print_r(Session::get('cart'));
        @endphp
        <tr>
            <td>
                <div class="cart-info">

                    <img src="" width="80px" height="80px">
                    <div>
                        <p>{{$v_content->name}}</p>
                        <small>Price: </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td>
                <form style="width: 30px;" action="" method="POST">

                    <input style="text-align: center;  margin-right:10px; " type="text" min="1" value="" name="cart_quantity">
                    <input style="text-align: center;  margin-right:10px; " type="hidden" value="" name="rowId_cart" class="form-control">
                    <input style="width: 100px;" type="submit" value="Submit" name="update_qty" class="btn btn-default btn-sm">
                </form>
            </td>
            <td>
                < </td>
        </tr>


    </table>
    <!-- total price -->
    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>

                </td>
            </tr>
            <!-- <tr>
                <td>Tax</td>
                <td>{{Cart::tax().''.'$'}}</td>
            </tr> -->
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>

                </td>
            </tr>
            <tr>



                <td><a class="btn" href="">Proceed To Checkout &#8594;</a></td>

                <td><a class="btn" href="">Proceed To Checkout &#8594;</a></td>




            </tr>
        </table>

    </div>

</div>

@endsection