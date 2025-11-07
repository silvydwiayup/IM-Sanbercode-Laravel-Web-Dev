@extends('home')
@section('header', "Category")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/categories/create" class="btn btn-primary flex-fill mx-1 mb-3">Tambah</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td colspan="2">{{ $item->name }}</td>
            <td>
                <form action="/categories/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" class="btn btn-danger btn flex-fill mx-1 mb-3" value="Delete">
                    <a href="/categories/{{ $item->id }}" class="btn btn-warning btn flex-fill mx-1 mb-3">Detail</a>
                    <a href="/categories/{{ $item->id }}/edit" class="btn btn-info btn flex-fill mx-1 mb-3">Edit</a>

                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada Categories</td>
        </tr>
    @endforelse
  </tbody>
</table>

@endsection