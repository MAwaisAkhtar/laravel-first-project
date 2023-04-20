{{-- @php
$record=$_POST['logout']
    
@endphp --}}
{{-- @isset($record) --}}
{{-- {{ session()->flush() }}
{{ session()->forget('id'); }} --}}
@php
use Illuminate\Support\Facades\Session;
    Session::flush();
    header('location:login');exit();
@endphp
{{-- @endisset --}}