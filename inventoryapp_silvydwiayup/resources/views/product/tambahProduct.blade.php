@extends('home')
@section('header', "Tambah Produk")
@section('bodyContent')

<form action="/products">

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
        <label for="inputNama" class="form-label">Categories</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Categories</option>
            <option value="1">Baju</option>
            <option value="2">Celana</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="inputNama" class="form-label">Name</label>
        <input type="nama" class="form-control" id="inputNama" >
    </div>
    <div class="mb-3">
        <label for="inputGambar" class="form-label">Image</label>
        <input type="file" class="form-control" id="inputGroupFile01">
    </div>
    <div class="mb-3">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="text" class="form-control" id="inputPrice">
    </div>
    <div class="mb-3">
        <label for="inputStock" class="form-label">Stock</label>
        <input type="text" class="form-control" id="inputStock">
    </div>
    <div class="mb-3">
        <label for="inputDescription" class="form-label">Description</label>
        <textarea class="form-control" id="inputDescription" rows="3"></textarea>
    </div>

    <div class="d-flex justify-content-start mt-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="/products" class="btn btn-danger mx-1">Cancel</a>
    </div>

</form>
    
@endsection