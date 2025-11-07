@extends('home')
@section('header', "Update Category")
@section('bodyContent')

<div class="container py-4">
  <div class="card shadow-sm border-0 rounded-4" style="width: 100%; margin: 0 auto;">
    <div class="card-body">

      <form action="/categories/{{ $editCategory->id }}" method="POST">
        @csrf

          @method("PUT")

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Edit Category Name</label>
          <input 
            type="text" 
            id="name"
            name="name" 
            class="form-control shadow-sm" 
            placeholder="Masukkan nama kategori"
            value="{{ old('name', $editCategory->name) }}"
          >
        </div>

        <div class="mb-3">
          <label for="description" class="form-label fw-semibold">Edit Category Description</label>
          <textarea 
            name="description" 
            id="description" 
            class="form-control shadow-sm" 
            rows="4" 
            placeholder="Masukkan deskripsi kategori">{{old('description', $editCategory->description)}}</textarea>
        </div>

        <div class="d-flex justify-content-start mt-4">
          <button type="submit" class="btn btn-primary px-4 me-2">Submit</button>
          <a href="/categories" class="btn btn-danger px-4">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
    
@endsection