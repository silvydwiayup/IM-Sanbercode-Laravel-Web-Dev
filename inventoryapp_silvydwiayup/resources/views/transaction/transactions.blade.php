@extends('home')
@section('header', "Transaction")
@section('bodyContent')



<form action="/transaction">

  
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
              <th scope="col">User</th>
              <th scope="col">Type</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($transactionList as $item)
                <tr>
                <th scope="row">{{ $item->users_id }}</th>
                <td>{{ $item->users->name }}</td>
                <td>{{ $item->products->name }}</td>
                <td>
                  <span 
                    class="badge 
                    {{ $item->type === 'in' ? 'bg-primary' : ($item->type === 'out' ? 'bg-danger' : 'bg-secondary') }}"
                  >
                    {{ ucfirst($item->type) }}
                  </span>
                </td>
                <td>{{ $item->amount }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

</form>


@endsection