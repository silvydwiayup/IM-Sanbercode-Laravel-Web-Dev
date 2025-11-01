@extends('home')
@section('header', "Tampil Category")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/categories/create" class="btn btn-primary btn-sm my-2">Tambah</a>

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

                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                    <a href="/categories/{{ $item->id }}" class="btn btn-warning btn-sm">Detail</a>
                    <a href="/categories/{{ $item->id }}/edit" class="btn btn-info btn-sm">Edit</a>

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