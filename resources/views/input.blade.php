<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('b_cdn')
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
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

    <form action="{{ route('inputs.store') }}" method="post" id="form" >
        @csrf
    <input type="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required><br><br>  {{-- old will display the previous value --}}
    <input type="password" placeholder="Enter password" name="pass" value="{{ old('pass') }}" required minlength="4" maxlength="6" pattern="\d+" ><br><br>   {{--   data-parsley-type=number,,,data-parsley-equalto="#a" (match the value of two input fields) --}}
    {{-- <textarea name="des" id="" cols="30" rows="10">{{ old('des') }}</textarea> --}}
    {{-- <select name="sel" >
        <option @selected( old('sel') == 1 ) value="1">Yes</option>
        <option @selected( old('sel') == 0 ) value="0">No</option>
    </select> --}}
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script>
    $('#form').parsley();
</script>


@isset($p)

@foreach ($p as $key=>$item)
{{ $item['id'] }} 
{{ $item['email'] }}
{{ $item['password'] }} <br><br>

@endforeach
@endisset