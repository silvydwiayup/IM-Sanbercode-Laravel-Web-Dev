<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset("templating/src/assets/images/logos/seodashlogo.png") }}" />
  <link rel="stylesheet" href="{{ asset("templating/src/assets/css/styles.min.css") }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 ">
            <div class="card mb-0 row justify-content-center w-90">
              <div class="card-body">
                {{-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset("templating/src/assets/images/logos/logo-light.svg") }}" alt="">
                </a> --}}
                <p class="text-center fs-6  fw-bold text-black-50" >Register</p>
                <form action="/register" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i> Terjadi Kesalahan!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    <small id="passwordMatch" class="text-danger" style="display:none;">Password dan konfirmasi password tidak sesuai</small>
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Sign Up">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="/login">Sign In</a>
                  </div>
                </form>

                <script>
                    const form = document.getElementById('registerForm');
                    const password = document.getElementById('password');
                    const confirmPassword = document.getElementById('password_confirmation');
                    const passwordMatchMsg = document.getElementById('passwordMatch');

                    function checkPasswordMatch() {
                        if (password.value !== confirmPassword.value) {
                            passwordMatchMsg.style.display = 'inline';
                            return false;
                        } else {
                            passwordMatchMsg.style.display = 'none';
                            return true;
                        }
                    }

                    password.addEventListener('keyup', checkPasswordMatch);
                    confirmPassword.addEventListener('keyup', checkPasswordMatch);

                    form.addEventListener('submit', function(e) {
                        if (!checkPasswordMatch()) {
                            e.preventDefault(); 
                        }
                    });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset("templating/src/assets/libs/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset("templating/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js") }}"></script>
  
</body>

</html>