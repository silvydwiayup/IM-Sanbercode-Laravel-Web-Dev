@extends('home')
@section('header', "Category")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/categories/create" class="btn btn-primary mb-3">Tambah</a>

<div class="container-fluid py-4">
  <div class="card shadow-sm border-0 rounded-3">
    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-dark text-center">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $item)
                <tr class="text-center  text-uppercase fw-bolder mb-3" style="font-size: 15px;">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/categories/{{ $item->id }}" class="btn btn-warning mb-3">Detail</a>
                            <a href="/categories/{{ $item->id }}/edit" class="btn btn-info mb-3">Edit</a>
                            <form action="/categories/{{ $item->id }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-3">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada Categories</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection
