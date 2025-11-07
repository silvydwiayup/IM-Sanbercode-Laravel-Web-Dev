@extends('home')
@section('header', "Detail Produk")
@section('bodyContent')


<div class="container-fluid my-4">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="row g-0 align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('templating/src/assets/images/products/s4.jpg') }}" class="img-fluid h-100 object-fit-cover" alt="Product Image" style="border-radius: 1rem 0 0 1rem; object-fit: cover;">
        </div>
            <div class="col-md-8">
                <div class="card-body px-4 py-3">
                <h6 class="card-category text-uppercase text-muted mb-2">Categories</h6>
                <h2 class="card-title fw-bolder mb-3" style="font-size: 25px;">Card Title</h2>
                <div class="mb-2">
                    <label class="form-label text-primary text-uppercase fw-bold">Harga</label>
                    <p class="card-price text-dark mb-0 fw-bolder">Rp 25.000</p>
                </div>
                <div class="mb-2">
                    <label class="form-label text-primary text-uppercase fw-bold">Stok</label>
                    <p class="card-stock text-dark mb-0 fw-bold">20</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-primary text-uppercase fw-bold">Detail</label>
                    <p class="card-text text-muted small">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.            </p>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="/products/create" class="btn btn-warning flex-fill mx-1">Edit</a>
                    <a href="#" class="btn btn-danger flex-fill mx-1">Delete</a>
                </div>
                </div>
            </div>
        </div>
  </div>
</div>


<a href="/products" class="btn btn-primary flex-fill mx-1 mb-3">Kembali</a>

@endsection