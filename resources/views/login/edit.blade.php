<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('b_cdn')
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Login Form</title>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                      <form id="form" method="post" action="{{ route('dashboard.update',$row->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Edit Post</span>
                        </div>
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example17"><b>Name</b></label>
                          <input type="text" name="login_name" id="form2Example17" class="form-control form-control-lg" value="{{ old('login_name',$row->Name) }}"  required minlength="4" maxlength="25"/>
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example27"><b>Email</b></label>
                          <input type="email" name="login_email" id="form2Example27" class="form-control form-control-lg" value="{{ old('login_email',$row->Email) }}" required minlength="4" maxlength="25"/>
                        </div>
      
                        <div class="pt-1 mb-4">
                          {{-- <button class="btn btn-dark btn-lg btn-block" type="button">Login</button> --}}
                          <input type="submit" value="Confirm" class="btn btn-dark btn-lg btn-block">

                        </div>
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