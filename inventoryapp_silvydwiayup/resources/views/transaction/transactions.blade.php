@extends('home')
@section('header', "Transaction")
@section('bodyContent')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/transaction/add" class="btn btn-primary flex-fill mx-1 mb-3">Tambah</a>

<div class="container-fluid py-4">
  <div class="card shadow-sm border-0 rounded-3">
    <div class="card-body">
      <h4 class="fw-bold mb-4 text-dark">Daftar Transaksi</h4>

      <div class="table-responsive">
        <table class="table">
          <thead class="table-dark text-center">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Product</th>
              <th scope="col">Type</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>John</td>
              <td>Doe</td>
              <td>@social</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection