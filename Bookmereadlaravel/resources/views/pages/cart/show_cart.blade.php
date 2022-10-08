@extends('layout')
@section('content')

<h2 class="title">Your Cart</h2>
<div class="small-container cart-page">

    <?php
    $content = Cart::content();

    ?>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @foreach($content as $v_content)
        <tr>
            <td>
                <div class="cart-info">

                    <img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="80px" height="80px">
                    <div>
                        <p>{{$v_content->name}}</p>
                        <small>Price: {{($v_content->price).''.'$'}}</small>
                        <br>
                        <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}/">Remove</a>
                    </div>
                </div>
            </td>
            <td>
                <form style="width: 30px;" action="{{URL::to('/update-cart-quantity')}}" method="POST">
                    {{csrf_field()}}
                    <input style="text-align: center;  margin-right:10px; " type="text" min="1" value="{{$v_content->qty}}" name="cart_quantity">
                    <input style="text-align: center;  margin-right:10px; " type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                    <input style="width: 100px;" type="submit" value="Submit" name="update_qty" class="btn btn-default btn-sm">
                </form>
            </td>
            <td>
                <?php
                $subtotal = $v_content->price * $v_content->qty;
                echo ($subtotal) . ' ' . '$';
                ?>
            </td>
        </tr>
        @endforeach

    </table>
    <!-- total price -->
    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>
                    {{Cart::subtotal().''.'$'}}
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
                    {{Cart::subtotal().''.'$'}}
                </td>
            </tr>
            <tr>
                <?php
                $customer_id = Session::get('customer_id');
                if ($customer_id != NULL) {

                ?>


                    <td><a class="btn" href="{{URL::to('/checkout')}}">Proceed To Checkout &#8594;</a></td>

                <?php
                } else {
                ?>
                    <td><a class="btn" href="{{URL::to('/login-checkout')}}">Proceed To Checkout &#8594;</a></td>

                <?php
                }
                ?>


            </tr>
        </table>

    </div>

</div>

@endsection