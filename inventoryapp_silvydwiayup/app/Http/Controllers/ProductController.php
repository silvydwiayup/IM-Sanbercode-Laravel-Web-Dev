<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function product()
    {
        return view('product.products');
    }

    public function create()
    {
        return view('product.tambahProduct');
    }

    public function show()
    {
        return view('product.detailProduct');
    }
}
