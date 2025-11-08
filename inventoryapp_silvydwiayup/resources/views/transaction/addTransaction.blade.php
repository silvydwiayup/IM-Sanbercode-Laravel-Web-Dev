@extends('home')
@section('header', "Tambah Transaksi")
@section('bodyContent')

<form action="/transaction/add" method="POST">

    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="mb-3">
        <label for="selectType" class="form-label">Select Product</label>
        <select name="product" class="form-select" aria-label="Default select example">
            <option selected>--Select Product--</option>
            @foreach ($productList as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="selectType" class="form-label">Select Type</label>
        <select name="type" class="form-select" aria-label="Default select example">
            <option selected>--Select Type--</option>
            <option value="in">Produk Masuk</option>
            <option value="out">Produk Keluar</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="inputAmount" class="form-label">Amount</label>
        <input name="amount" type="text" class="form-control" id="inputAmount" value="">
    </div>
    <div class="mb-3">
        <label for="inputNotes" class="form-label">Notes</label>
        <textarea class="form-control" name="notes" id="inputNotes" rows="3"></textarea>
    </div>

    <div class="d-flex justify-content-start mt-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="/transaction" class="btn btn-danger mx-1">Cancel</a>
    </div>

</form>
    
@endsection