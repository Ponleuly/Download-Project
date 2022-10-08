@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Add Product</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Book's title</label>
                <input id="name" name="product_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input id="name" name="product_price" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input id="name" name="product_image" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label>Describe Product</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="product_desc" placeholder="Mổ tả sản phẩm" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Product Details</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="product_content" placeholder="Mổ tả nội dung" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Book's Category</label>
                <select name="product_cate" class="form-control">
                    @foreach($cate_product as $key => $cate)
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    <!-- <option value="1">Motivation Book</option> -->
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Author</label>
                <select name="product_brand" class="form-control">
                    @foreach($brand_product as $key => $brand)
                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                    <!-- <option value="1">Seavpov Jivit</option> -->
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
            <button type="submit" name="add_product" class="btn btn-info">Add Product</button>


        </form>
    </div>
</div>
</div>
@endsection