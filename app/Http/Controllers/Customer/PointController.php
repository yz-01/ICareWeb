<?php

namespace App\Http\Controllers\Customer;

use App\DataTables\Admin\AdminDataTable;
use App\DataTables\Customer\PointDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PointController extends Controller
{
    public function index(PointDataTable $dataTable)
    {
        $customer = Customer::where('id', auth()->user()->id)->first();

        return $dataTable->render('customer.point.index', compact('customer'));
    }
}
