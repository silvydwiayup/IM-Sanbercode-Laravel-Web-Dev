<?php

namespace App\Http\Controllers;

use App\Models\TransactionModels;
use App\Models\ProductModels;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){

        $transaction = TransactionModels::with('products')->get();
        return view('transaction.transactions', ['transactionList' => $transaction]);
    }

    public function add(){
        $product = ProductModels::pluck('name', 'id');
        return view('transaction.addTransaction', ['productList' => $product]);
    }

    public function store(Request $request){

        $userAuth = Auth::user();

        $transactionValidated = $request->validate(
            [
                'product' => 'required',
                'type' => 'required',
                'amount' => 'required|integer',
                'notes' => 'required|string',
            ],[
                'product.required' => 'Product wajib dipilih.',
                'type.required' => 'Type wajib diisi.',
                'amount.required' => 'Nama Melebihi Maximal.',
                'notes.required' => 'Deskripsi wajib diisi.',
            ]

        ); 

        $product = ProductModels::find($transactionValidated['product']);
        if ($transactionValidated['type'] == 'in') {
            $product->update ([
                'stock' => $product->stock += $transactionValidated['amount']
            ]);
        } else if ($transactionValidated['type'] == 'out') {
            $product->update ([
                'stock' => $product->stock -= $transactionValidated['amount']
            ]);
        }

        $product->save();

        TransactionModels::create([
            'products_id' => $transactionValidated['product'],
            'type' => $transactionValidated['type'],
            'amount' => $transactionValidated['amount'],
            'notes' => $transactionValidated['notes'],
            'users_id' => $userAuth->id
        ]);
        


        return redirect('/transaction')->with('success', 'Berhasil Masukkan Produk');
    }
}

