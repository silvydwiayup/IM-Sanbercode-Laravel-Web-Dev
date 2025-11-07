@extends('home')
@section('header', "Tampil Product")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/products/create" class="btn btn-primary flex-fill mx-1 mb-3">Tambah</a>

<div class="container-fluid">
  <div class="row">
      <div class="col-md-4">
          <div class="card shadow-sm border-0" style="border-radius: 20px; overflow: hidden;">
              <img src="templating/src/assets/images/products/s4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                  <h6 class="card-category text-uppercase text-muted mb-2">Categories</h6>

                  <h5 class="card-title fw-semibold mb-3">Card Title</h5>
                  <div class="mb-2">
                    <label class="form-label text-primary fw-bold mb-1">Harga</label>
                    <p class="product-price text-dark mb-0">Rp 25.000</p>
                  </div>

                  <div class="mb-2">
                    <label class="form-label text-primary fw-bold mb-1">Stok</label>
                    <p class="product-stock text-dark mb-0">20</p>
                  </div>

                  <div class="mb-3">
                    <label class="form-label text-black fw-bold mb-1">Detail</label>
                    <p class="card-text text-muted small"
                      style="display: -webkit-box; 
                              -webkit-line-clamp: 3; 
                              -webkit-box-orient: vertical; 
                              overflow: hidden; 
                              text-overflow: ellipsis; 
                              max-width: 100%;">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                  </div>
                    
                  <div class="d-flex justify-content-center mb-3">
                    <a href="/products/show" class="btn btn-primary w-100">Read More</a>
                  </div>

                  <div class="d-flex justify-content-between px-4">
                    <a href="#" class="btn btn-warning flex-fill mx-1">Edit</a>
                    <a href="#" class="btn btn-danger flex-fill mx-1">Delete</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
              
              
</div>

@endsection