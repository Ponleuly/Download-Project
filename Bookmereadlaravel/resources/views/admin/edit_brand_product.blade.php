@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Cập nhật Author</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red; " class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        @foreach($edit_brand_product as $key => $edit_value)
        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Author's Name</label>
                <input id="name" value="{{$edit_value->brand_name}}" name="brand_product_name" type="text" placeholder="Tên thương hiệu " class="form-control">
            </div>
            <div class="form-group">
                <label>Describe Author</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="brand_product_desc" rows="5">{{$edit_value->brand_desc}}</textarea>
            </div>
            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật Author</button>


        </form>
        @endforeach
    </div>
</div>
</div>
@endsection