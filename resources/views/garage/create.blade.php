@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Voeg garage toe
                        <a href="{{ url('admin-dash') }}" class="btn btn-danger float-end">TERUG</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('store-garage') }}" method="POST">

                        @csrf

                        <div class="form-group mb-3">
                            <label for="">User ID</label>
                            <select class="form control" name="user_id">
                                @foreach ($users as $user)
                                    @if($user->role_id == 2)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach 
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Gebied ID</label>
                            <select class="form control" name="area_id">
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->plaats}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Garage naam</label>
                            <input type="text" name="garage_naam" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Verzenden</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection