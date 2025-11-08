@extends('home')
@section('header', "Edit Produk")
@section('bodyContent')

<form action="/products/edit/{{ $editProduct->id }}" method="POST" enctype="multipart/form-data">
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
                <label for="inputNama" class="form-label">Categories</label>
                <select name="categories_id" class="form-select" aria-label="Default select example">
                    <option disabled>--Select Categories--</option>
                    @foreach ($editCategories as $id => $name)
                        <option value="{{ $id }}" {{ $editProduct->categories_id == $name ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="inputNama" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputNama" id="inputNama" value="{{ old('nama', $editProduct->name) }}">
            </div>

            <div class="mb-3">
                <label for="inputGambar" class="form-label">Image</label><br>
                @if ($editProduct->image)
                    <img src="{{ asset('storage/' . $editProduct->image) }}" alt="Gambar Produk" width="150" class="mb-2">
                @endif
                <input type="file" class="form-control" name="inputImage" id="inputImage" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" name="inputPrice" id="inputPrice" value="{{ old('price', $editProduct->price) }}">
            </div>

            <div class="mb-3">
                <label for="inputStock" class="form-label">Stock</label>
                <input type="text" class="form-control" name="inputStock" id="inputStock" value="{{ old('stock', $editProduct->stock) }}" required>
            </div>

            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea 
                    name="inputDescription" 
                    id="description" 
                    class="form-control shadow-sm" 
                    rows="4" 
                    placeholder="Masukkan deskripsi produk">{{ old('description', $editProduct->description) }}</textarea>
            </div>

                
            <div class="d-flex justify-content-start mt-3">
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <a href="/products" class="btn btn-danger">Cancel</a>
            </div>


        </div>

</form>
    
@endsection