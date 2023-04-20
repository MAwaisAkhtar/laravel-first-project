@if (!session('id'))
   {{-- {{ session()->get('name'); }} --}}
   {{ Session::flash('login','Please login first') }}
   @php
        header('location:login');exit();
    @endphp 
@endif
@if (Session::has('updated'))
   <p class="alert alert-success"> {{ session()->get('updated') }} </p>
@endif
@if (Session::has('dlt'))
   <p class="alert alert-success"> {{ session()->get('dlt') }} </p>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('b_cdn')
    <title>Dashboard</title>
    <style>
        #outer
        {
            text-align: center;
        }
        .inner
        {
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <form action="logout">
    <input type="submit" class="btn btn-danger align-right" name="logout" value="Logout">
</form>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
    <h1>Welcome {{ session()->get('name'); }} to dashboard</h1>
    <h2>Posts table</h2>
    <table class="table">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Verification Status</th>
        <th>Action</th>
        <tbody>
            @php
                $sr=$ms->firstItem();  //it will helps in pagination sr no
            @endphp
            @foreach ($ms as $m)
            <tr>
            <td>{{ $sr }}</td>
            <td>{{ $m->Name }}</td>
            <td>{{ Str::limit($m->Email,'20') }}</td>
            <td>{{ $m->verified==1 ? 'Yes' : 'No' }}</td>
            <td id="outer">
                <a href="{{ route('dashboard.show' , $m->id) }}" class="btn btn-dark inner"><i class="fa fa-eye"></i></a>
                <a href="{{ route('dashboard.edit' , $m->id) }}" class="btn btn-primary inner"><i class="fa fa-edit"></i></a>
                <form method="post" class="inner" action="{{ route('dashboard.destroy' , $m->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger inner"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            </tr>
            @php
                $sr++
            @endphp 
            @endforeach
        </tbody>
    </table>
    {{ $ms->appends(['mss' => $mss->CurrentPage()])->links() }}

    


    {{-- <h2>Posts table</h2>
    <table class="table">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Verification Status</th>
        <th>Action</th>
        <tbody>
            @php
                $sr=$mss->firstItem();  //it will helps in pagination
            @endphp
            @foreach ($mss as $mu)
            <tr>
            <td>{{ $sr }}</td>
            <td>{{ $mu->id }}</td>
            <td id="outer">
                <a href="{{ route('dashboard.show' , $mu->id) }}" class="btn btn-dark inner"><i class="fa fa-eye"></i></a>
                <a href="{{ route('dashboard.edit' , $mu->id) }}" class="btn btn-primary inner"><i class="fa fa-edit"></i></a>
                <form method="post" class="inner" action="{{ route('dashboard.destroy' , $mu->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger inner"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            </tr>

            @php
                $sr++
            @endphp 
            @endforeach
        </tbody>

    </table>
    {{ $mss->appends(['ms'=>$ms->CurrentPage()])->links() }} --}}


</div>
</div>
</body>
</html>