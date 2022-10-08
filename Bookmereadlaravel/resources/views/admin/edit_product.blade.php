@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Cập nhật Product</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        @foreach($edit_product as $key => $pro)
        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Book's Name</label>
                <input value="{{$pro->product_name}}" id="name" name="product_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input value="{{$pro->product_price}}" id="name" name="product_price" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input id="name" name="product_image" type="file" class="form-control">
                <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" width="100" height="100">
            </div>
            <div class="form-group">
                <label>Describe Book</label>
                <textarea style=" resize: none;" rows="10" class="form-control" id="message" name="product_desc">{{$pro->product_desc}}</textarea>
            </div>
            <div class="form-group">
                <label>Product Details</label>
                <textarea style=" resize: none;" rows="10" class="form-control" id="message" name="product_content">{{$pro->product_content}}</textarea>
            </div>
            <div class="form-group">
                <label>Book's Category</label>
                <select name="product_cate" class="form-control">
                    @foreach($cate_product as $key => $cate)
                    @if($cate->category_id==$pro->category_id)
                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @else
                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Author</label>
                <select name="product_brand" class="form-control">
                    @foreach($brand_product as $key => $brand)
                    @if($cate->category_id==$pro->category_id)
                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                    @else
                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Hiến thị</label>
                <select name="product_status" class="form-control">
                    <option value="0">Ấn</option>
                    <option value="1">Hiến thị</option>

                </select>
            </div>
            <button type="submit" name="add_product" class="btn btn-info">Cập nhật Product</button>


        </form>@endforeach
    </div>
</div>
</div>
@endsection