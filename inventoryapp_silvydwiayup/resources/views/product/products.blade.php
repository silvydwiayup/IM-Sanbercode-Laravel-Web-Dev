@extends('home')
@section('header', "Product")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (Auth::check() && Auth::user()->role === 'admin')
<a href="/products/create" class="btn btn-primary flex-fill mx-1 mb-3">Tambah</a>
@endif


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
              
              @if (Auth::check() && Auth::user()->role === 'admin')
              <div class="d-flex justify-content-between" style="gap:0.5rem;">
                <a href="/products/{{ $item->id }}/edit" class="btn btn-warning w-50">Edit</a>
                <button type="button" class="btn btn-danger w-50" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                  Delete
                </button>

              </div>
              @endif
            </div>


            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0 shadow" style="border-radius: 15px;">

                <div class="modal-header border-0">
                  <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                  <p class="text-muted mb-2">Apakah kamu yakin ingin menghapus produk:</p>
                  <h6 class="fw-bold text-dark">{{ $item->name }}</h6>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-center">
                  <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Batal</button>
                  <form action="/products/delete/{{ $item->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Ya, Hapus</button>
                  </form>
                </div>

              </div>
            </div>
          </div>


          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection