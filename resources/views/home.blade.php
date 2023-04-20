<h1>Home page</h1>
{{-- <a href="{{URL::to('/')}}">Welcome</a> <br><br>
{{URL::to('/welcome')}} <br><br>
{{URL::current()}} <br><br>
{{URL::previous()}} --}}

{{-- {{ $names }}
{{ $pas }} --}}

{{-- {{$p}} --}}

@foreach ($p as $item)
   {{ $item['email'] }} 
   {{ $item['password'] }} <br><br>
    
@endforeach