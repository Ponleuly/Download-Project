@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Cập nhật Book's Category</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red; " class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        @foreach($edit_category_product as $key => $edit_value)
        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Books</label>
                <input id="name" value="{{$edit_value->category_name}}" name="category_product_name" type="text" placeholder="Tên danh mục" class="form-control">
            </div>
            <div class="form-group">
                <label>Describe Book</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="category_product_desc" rows="5">{{$edit_value->category_desc}}</textarea>
            </div>
            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật Book's Category</button>


        </form>
        @endforeach
    </div>
</div>
</div>
@endsection