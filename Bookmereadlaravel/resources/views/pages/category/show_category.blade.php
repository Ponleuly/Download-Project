@extends('layout')
@section('content')
<div class="small-container">
    @foreach($category_name as $key => $name)
    <h2 class="title">{{$name->category_name}}</h2>
    @endforeach
    <div style="text-align: center;" class="row">
        @foreach($category_by_id as $key => $product)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
            <div class="col-3">
                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                <h4>{{$product->product_name}}</h4>

                <p>by
                    <a href="author">{{$product->brand_name}}</a>
                </p>

                <p>{{($product->product_price).''.'$'}}</p>
            </div>
        </a>
        @endforeach
    </div>

</div>
<!-- Feater_product -->
<!-- <div class="small-container">
    <h2 class="title">Featured Product</h2>
    <div class="row">
        <div class="col-4">
            <a href="product-detail.html"><img src="{{('public/frontend/images/What-I-Wish-I-Knew-About-Love_Book_Cody_Lidtke_001.jpg')}}"></a>
            <h4>What I Wish I Know About Love</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$14.99</p>

        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
    </div> -->

<!-- lastest product -->
<!-- <h2 class="title">Lastest Product</h2>
    <div class="row">
        <div class="col-4">
            <img src="{{('public/frontend/images/BriannaWiest_TheMountainIsYou_sized-for-SC-Cropped.jpg')}}">
            <h4>The Mountain Is You</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$17.00</p>

        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
        <div class="col-4">


        </div>
        <div class="col-4">



        </div>
        <div class="col-4">


        </div>
    </div>

</div> -->

@endsection