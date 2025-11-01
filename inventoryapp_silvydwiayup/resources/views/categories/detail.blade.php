@extends('home')
@section('header', "Detail Category")
@section('bodyContent')

<h1 class="text-primary">{{ $detailCategory->name }}</h1>
<p>{{ $detailCategory->description }}</p>

<a href="/categories" class="btn btn-secondary btn-sm">Kembali</a>

@endsection