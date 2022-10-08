@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">


            <h2 class="title">Checkout Cart</h2>

        </div>
        <!--/breadcrums-->



        <div class="small-container cart-page">
            <div style="margin-bottom: 20px;" class="review-payment">
                <h3>Review & Payment</h3>
            </div>
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
            <h4 style="margin-top: 50px; font-size:20px; ">Select your checkout method </h4>
            <form action="{{URL::to('/order-place')}}" method="POST">
                {{csrf_field()}}
                <div style="margin-top: 20px; " class="payment-options">
                    <span>
                        <label style="display:inline-flex;"><input type="checkbox" name="payment_option" value="1"> Direct Bank Transfer</label>
                    </span>
                    <span>
                        <label style="display:inline-flex;"><input type="checkbox" name="payment_option" value="2"> Check Payment</label>
                    </span>

                </div>
                <input style="width: 200px;" type="submit" name="send_order_place" value="Booking Product" class="btn">
            </form>

        </div>

</section>
@endsection