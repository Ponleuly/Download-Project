@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Add Author</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Author's Name</label>
                <input id="name" name="brand_product_name" type="text" placeholder="Tên danh mục" class="form-control">
            </div>
            <div class="form-group">
                <label>Describe about Author</label>
                <textarea style="resize: none;" rows="10" class="form-control" id="message" name="brand_product_desc"></textarea>
            </div>
            <div class="form-group">
                <label>Hiến thị</label>
                <select name="brand_product_status" class="form-control">
                    <option value="0">Ấn</option>
                    <option value="1">Hiến thị</option>

                </select>
            </div>
            <button type="submit" name="add_brand_product" class="btn btn-info">Add Author</button>


        </form>
    </div>
</div>
</div>
@endsection