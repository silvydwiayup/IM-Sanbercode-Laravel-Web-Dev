@extends('home')
@section('header', "Detail Category")
@section('bodyContent')

<h1 class="text-primary">{{ $detailCategory->name }}</h1>
{{-- <p>{{ $detailCategory->description }}</p> --}}


<div class="container-fluid py-4">
  <div class="card shadow-sm border-0 rounded-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-dark text-center">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Stock</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($detailCategory->produk as $item)
            
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->stock }}</td>
                  <td>
                    <a href="/products/show/{{ $item->id }}" class="btn btn-secondary btn flex-fill mx-1 mb-3">detail</a>
                  </td>
                </tr>
            @endforeach
            

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<a href="/categories" class="btn btn-secondary btn flex-fill mx-1 mb-3">Kembali</a>

@endsection