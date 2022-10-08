@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">Add delivery</div>
<div class="panel-body">

    <div class="col-md-6">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form>
            @csrf

            <div class="form-group">
                <label>Chọn thành phố</label>
                <select name="brand_product_status" class="form-control">

                    <option value="">--Chọn thành phố--</option>

                </select>
            </div>
            <div class="form-group">
                <label>Chọn quận huyện</label>
                <select name="brand_product_status" class="form-control">

                    <option value="">--Chọn quận huyện--</option>

                </select>
            </div>
            <div class="form-group">
                <label>Chọn xã phương</label>
                <select name="brand_product_status" class="form-control">

                    <option value="">--Chọn xã phương--</>

                </select>
            </div>
            <div class="form-group">
                <label>Phí vận chuyển</label>
                <input id="name" name="fee_ship" type="text" placeholder="Tên danh mục" class="form-control">
            </div>
            <button type="submit" name="add_brand_product" class="btn btn-info">Add Author</button>


        </form>
    </div>
</div>
</div>
@endsection