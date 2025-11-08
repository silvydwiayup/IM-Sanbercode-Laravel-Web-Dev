@extends('home')
@section('header', "Profile")
@section('bodyContent')


<form action="/profile" method="POST">
    @csrf

    <div class="container my-5">
        <div class="card border-0 shadow-lg mx-auto text-center p-4" 
            style="max-width: 600px; border-radius: 25px; background: linear-gradient(135deg, #ffffff, #f8f9fa);">
            
            <div class="d-flex justify-content-center mb-4">
                <div class="position-relative">
                    <img src="{{ asset('templating/src/assets/images/profile/user-1.jpg') }}" 
                        alt="Foto Profil" 
                        class="rounded-circle shadow-sm"
                        style="width: 140px; height: 140px; object-fit: cover; border: 5px solid #fff;">
                    <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-white"
                        style="width: 20px; height: 20px;"></span>
                </div>
            </div>

            
            <h3 class="fw-bold text-dark mb-1" style="font-size: 26px;">{{ $userData->name }}</h3>
            <p class="text-muted mb-3" style="font-size: 14px;">{{ $userData->role }}</p>

            <hr class="my-3" style="border: none; height: 1px; background-color: #dee2e6;">

            <div class="text-start px-4">
                <div class="row">

                    <!-- Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-primary fw-bold text-uppercase small mb-1 d-block">Email</label>
                            <p class="mb-0 fw-semibold text-dark">{{ $userData->email }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="text-primary fw-bold text-uppercase small mb-1 d-block">Role</label>
                            <p class="mb-0 fw-semibold text-dark">{{ $userData->role }}</p>
                        </div>
                    </div>

                    <!-- Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-primary fw-bold text-uppercase small mb-1 d-block">Age</label>
                            <p class="mb-0 fw-semibold text-dark">{{ $userData->profile?->age ?? '-' }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-primary fw-bold text-uppercase small mb-1 d-block">Tanggal Bergabung</label>
                            <p class="mb-0 fw-semibold text-dark">{{ $userData->created_at }}</p>
                        </div>
                    </div>

                </div>

                
                <div class="mt-3">
                    <label class="text-primary fw-bold text-uppercase small mb-1 d-block">Bio</label>
                    <p class="mb-0 fw-semibold text-dark" style="text-align: justify;">
                    {{ $userData->profile?->bio ?? '-' }}
                    </p>
                </div>
            </div>

            <hr class="my-3" style="border: none; height: 1px; background-color: #dee2e6;">

            
            <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                <a href="/profile/edit" class="btn btn-warning flex-fill fw-semibold shadow-sm" 
                    style="border-radius: 10px; max-width: 200px;">Edit Profil
                </a>
            </div>

        </div>
    </div>
</form>


@endsection
