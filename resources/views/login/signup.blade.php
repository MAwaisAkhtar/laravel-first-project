@if (Session::has('succ'))
   <p class="alert alert-success"> {{ Session::get('succ') }} </p>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('b_cdn')
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Signup</title>
</head>
<body>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" /> --}}
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form id="form" action="{{ route('signup.store') }}" method="post" >
                        @csrf
                        {{-- <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Logo</span>
                        </div> --}}
      
                        <h5 class="fw-normal mb-1 pb-1" style="letter-spacing: 1px;">Create your account</h5>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17"><b>Enter Your Name</b></label>
                            <input type="text" name="name" id="" class="form-control form-control-lg" value="{{ old('name') }}" required minlength="2" maxlength="25"/>
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example17"><b>Email address</b></label>
                          <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" value="{{ old('email') }}" required minlength="6" />
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example27"><b>Password</b></label>
                          <input type="password" name="pass" id="form2Example27" class="form-control form-control-lg" value="{{ old('pass') }}" required minlength="4" maxlength="25" data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z\d ]+$" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27"><b>Repeat Password</b></label>
                            <input type="password" name="r_pass" id="form2Example27" class="form-control form-control-lg" value="{{ old('r_pass') }}" required minlength="4" maxlength="25" data-parsley-equalto="#form2Example27" />
                          </div>
      
                        <div class="pt-1 mb-4">
                            <input type="submit" value="Signup" class="btn btn-dark btn-lg btn-block">
                            
                          {{-- <button class="btn btn-dark btn-lg btn-block" type="button">Signup</button> --}}
                        </div>
      
                        {{-- <a class="small text-muted" href="#!">Forgot password?</a> --}}
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have a account? <a href="login"
                            style="color: #393f81;">Login here</a></p>
                        {{-- <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a> --}}
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script>
    $('#form').parsley();
</script>