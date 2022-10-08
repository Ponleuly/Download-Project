<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Province;
use App\Wards;

class DeliveryController extends Controller
{
    public function delivery(Request $request)
    {
        return view(('admin.delivery.add_delivery'));
    }
}
