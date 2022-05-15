@extends('layouts.app');

@section('content')

@auth
    @if(\Auth::user()->role == 3)
    <div>
        for admins
    </div>
    @endif
@endauth

@auth

<p>for logged in users</p>
@endauth

@guest
    

@endguest

@endsection