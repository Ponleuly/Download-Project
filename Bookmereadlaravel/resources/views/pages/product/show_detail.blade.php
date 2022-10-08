@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" width="500px" height="500px" id="ProductImg">

        </div>

        <div class="col-2">
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{csrf_field()}}
                <h1>{{$value->product_name}}</h1>
                <h4>{{($value->product_price).''.'$'}}</h4>
                <p>by
                    <a href="author">{{$value->brand_name}}</a>
                </p>

                <input name="qty" type="number" min="1" value="1">
                <input name="productid_hidden" type="hidden" value="{{$value->product_id}}">
                <button style="width: 150px;" type="submit" class="btn">
                    Add To Cart
                </button>
                <!-- <a href="" class="btn" type="submit">Add To Cart</a> -->
            </form>
            <p>{{$value->product_content}}</p>
            <!-- <div class="small-img-row">
                <div class="small-img-col">
                    <img src="{{URL::to('public/frontend/images/IMG_4689.jpg')}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{URL::to('public/frontend/images/IMG_6436.jpg')}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{URL::to('public/frontend/images/IMG_6441.jpg')}}" width="100%" class="small-img">
                </div>
            </div> -->

        </div>

    </div>
</div>
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View more</p>
    </div>
</div>

<div class="small-container">

    <div class="row">
        @foreach($relate as $key => $lienquan)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
            <div class="col-4">
                <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}">
                <h4 style="font-weight:bold; font-size:15px">{{$lienquan->product_name}}</h4>
                <p>by
                    <a href="author">{{$lienquan->brand_name}}</a>
                </p>
                <p>{{($lienquan->product_price).''.'$'}}</p>
            </div>
        </a>
        @endforeach

    </div>

</div>


</div>
@endforeach
@endsection