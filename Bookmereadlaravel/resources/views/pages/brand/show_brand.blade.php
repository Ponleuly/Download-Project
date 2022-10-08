@extends('layout')
@section('content')
<div class="small-container">
    @foreach($brand_name as $key => $name)
    <h2 class="title">{{$name->brand_name}}</h2>
    @endforeach
    <div class="row">
        @foreach($brand_by_id as $key => $product)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
            <div class="col-3">
                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                <h4>{{$product->product_name}}</h4>
                @foreach($brand_name as $key => $name)
                <p>by
                    <a href="author">{{$name->brand_name}}</a>
                </p>
                @endforeach
                <p>{{($product->product_price).''.'$'}}</p>


            </div>
        </a>
        @endforeach
    </div>

</div>


@endsection