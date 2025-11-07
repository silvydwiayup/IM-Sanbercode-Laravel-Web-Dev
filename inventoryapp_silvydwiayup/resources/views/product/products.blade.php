@extends('home')
@section('header', "Product")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/products/create" class="btn btn-primary flex-fill mx-1 mb-3">Tambah</a>

<div class="container-fluid">
  <div class="row g-3">
    @foreach ($productsCard as $item)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
        <div class="card shadow-sm border-0 w-100" 
             style="border-radius:20px; overflow:hidden; display:flex; flex-direction:column; height:100%;">
          
          <img src="{{ asset('storage/' . $item->image) }}" 
               alt="{{ $item->name }}" 
               style="height:220px; width:100%; object-fit:cover;">

          <div class="card-body d-flex flex-column" 
               style="display:flex; flex-direction:column; justify-content:space-between; flex-grow:1;">

            <div>
              <h6 class="text-uppercase text-muted mb-2">{{ $item->category->name }}</h6>
              <h5 class="text-uppercase fw-semibold mb-3">{{ $item->name }}</h5>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <label class="form-label text-primary fw-bold mb-1 d-block">Stok</label>
                  <p class="mb-0 text-dark">{{ $item->stock }}</p>
                </div>
                <div class="text-end">
                  <label class="form-label text-primary fw-bold mb-1 d-block">Harga</label>
                  <p class="mb-0 text-dark">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label text-black fw-bold mb-1">Detail</label>
                <p class="small text-muted mb-0"
                   style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; 
                          overflow:hidden; text-overflow:ellipsis; font-size:0.9rem; color:#6c757d;">
                  {{ $item->description }}
                </p>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-center mb-3">
                <a href="/products/show/{{ $item->id }}" class="btn btn-primary w-100">Read More</a>
              </div>

              <div class="d-flex justify-content-between" style="gap:0.5rem;">
                <a href="/products/{{ $item->id }}/edit" class="btn btn-warning w-50">Edit</a>
                <form action="/products/delete/{{ $item->id }}" method="POST" class="w-50">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection