@extends('home')
@section('header', "Tambah Transaksi")
@section('bodyContent')

<form action="/transaction">

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
        <label for="inputProduct" class="form-label">Product</label>
        <input type="text" class="form-control" id="inputProduct" >
    </div>
    <div class="mb-3">
        <label for="selectType" class="form-label">Select Type</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>--Select Type--</</option>
            <option value="1">Produk Masuk</option>
            <option value="2">Produk Keluar</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="inputAmount" class="form-label">Amount</label>
        <input type="text" class="form-control" id="inputAmount">
    </div>
    <div class="mb-3">
        <label for="inputNotes" class="form-label">Notes</label>
        <textarea class="form-control" id="inputNotes" rows="3"></textarea>
    </div>

    <div class="d-flex justify-content-start mt-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="/transaction" class="btn btn-danger mx-1">Cancel</a>
    </div>

</form>
    
@endsection