<h1>if condition in laravel</h1>



@if(1==2)
if statment is true
@elseif(1!==2)
elseif statment is true
@else
all conditions are false
@endif

@php
$x=5;
$y=null;

@endphp
<br><br>

@if(@isset($x))
x is {{$x}}
@else
x is empty
@endif
<br><br>

@empty($y)
    y is empty
@endempty

<br><br>

@for ($i = 0; $i < 5; $i++)
    The current value is {{ $i }} <br/><br/>
@endfor




@while ($x<=10)
    <p>I'm looping forever.</p>
    @php
    $x++;
    @endphp
@endwhile


@php
$users = [
    [ 'id' => 1, 'name' => 'awais'],
    [ 'id' => 2, 'name' => 'atiq'],
    [ 'id' => 3, 'name' => 'qureshi'],
]
;
@endphp


@foreach ($users as $user)
    {{ $user['id']}}-{{$user['name'] }} <br><br>

@endforeach


<input type="text" name="first" placeholder="Enter text">