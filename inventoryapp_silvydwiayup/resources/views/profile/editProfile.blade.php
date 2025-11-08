@extends('home')
@section('header', "Edit Profile")
@section('bodyContent')

<div class="container my-5">
    <div class="card shadow-lg border-0 mx-auto p-4" 
        style="max-width: 700px; border-radius: 25px; background: linear-gradient(135deg, #ffffff, #f8f9fa);">

        <h3 class="text-center fw-bold mb-4">Edit Profile</h3>

        <form action="/profil/edit" method="POST">
        @csrf

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        
        <div class="row g-3">

                <div class="col-12">
                    <label class="form-label text-primary fw-bold small mb-1">Age</label>
                    <input name="inputAge" type="number" class="form-control" value="{{ old('age', $userData->profile?->age) }}" required> 
                </div>

                <div class="col-12">
                    <label class="form-label text-primary fw-bold small mb-1">Bio</label>
                    <textarea name="inputBio" class="form-control" rows="4" style="resize:none;">{{ old('bio', $userData->profile?->bio) }}</textarea>
                </div>
            </div>

        
            <div class="d-flex justify-content-end gap-3 mt-3 flex-wrap">
                <a href="/profile" class="btn btn-danger w-20 fw-semibold shadow-sm" style="border-radius:10px;">Batal</a>
                <button type="submit" class="btn btn-primary w-20 fw-semibold shadow-sm" style="border-radius:10px;">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
    const photoInput = document.getElementById('photoInput');
    const profilePreview = document.getElementById('profilePreview');

    photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file) {
        profilePreview.src = URL.createObjectURL(file);
        }
    });
</script>

@endsection
