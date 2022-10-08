@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Add Book's Category</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Book's Category Name</label>
                <input id="name" name="category_product_name" type="text" placeholder="Tên danh mục" class="form-control">
            </div>
            <div class="form-group">
                <label>Describe Book's Category</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="category_product_desc" placeholder="Mổ tả danh mục..." rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Hiến thị</label>
                <select name="category_product_status" class="form-control">
                    <option value="0">Ấn</option>
                    <option value="1">Hiến thị</option>

                </select>
            </div>
            <button type="submit" name="add_category_product" class="btn btn-info">Thêm Book's Category</button>


        </form>
    </div>
</div>
</div>
@endsection