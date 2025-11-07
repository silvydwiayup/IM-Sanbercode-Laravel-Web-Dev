@extends('home')
@section('header', "Detail Produk")
@section('bodyContent')


<div class="container-fluid my-4">
  <div class="card shadow-sm border-0 overflow-hidden" 
       style="border-radius: 20px; max-width: 100%;">

    <div class="row g-0 align-items-stretch" style="height: 100%;">
      <!-- Gambar -->
      <div class="col-md-4" style="height: 100%;">
        <img src="{{ asset('storage/' . $detailProduct->image) }}" 
             alt="{{ $detailProduct->name }}" 
             style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px 0 0 20px;">
      </div>

      <!-- Detail Produk -->
      <div class="col-md-8 d-flex align-items-center">
        <div class="card-body px-4 py-3" style="flex: 1;">
          <h6 class="text-uppercase text-muted mb-2">{{ $detailProduct->category->name }}</h6>
          <h2 class="text-uppercase fw-bolder mb-3" style="font-size: 25px;">{{ $detailProduct->name }}</h2>

          <div class="mb-2">
            <label class="form-label text-primary text-uppercase fw-bold mb-1">Harga</label>
            <p class="card-price text-dark mb-0 fw-bolder">Rp {{ number_format($detailProduct->price, 0, ',', '.') }}</p>
          </div>

          <div class="mb-2">
            <label class="form-label text-primary text-uppercase fw-bold mb-1">Stok</label>
            <p class="card-stock text-dark mb-0 fw-bold">{{ $detailProduct->stock }}</p>
          </div>

          <div class="mb-3">
            <label class="form-label text-primary text-uppercase fw-bold mb-1">Detail</label>
            <p class="card-text text-muted small mb-0">{{ $detailProduct->description }}</p>
          </div>

          <div class="d-flex justify-content-between" style="gap:0.5rem;">
                <a href="/products/{{ $detailProduct->id }}/edit" class="btn btn-warning w-50">Edit</a>
                <form action="/products/delete/{{ $detailProduct->id }}" method="POST" class="w-50">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>
              </div>
        </div>
      </div>
    </div>

  </div>
</div>



<a href="/products" class="btn btn-primary flex-fill mx-1 mb-3">Kembali</a>

@endsection