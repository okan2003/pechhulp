@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin dashboard</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('garages') }}" class="btn btn-primary float-end">Garages</a>
                        <a href="{{ url('review-check') }}" class="btn btn-primary float-end">Reviews</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Garage naam</th>
                                <th>Aantal pechmeldingen afgehandeld</th>
                            </thead>
                            <tbody>
                                @foreach ($garages as $garage)
                                    <tr>
                                        <td>{{ $garage->garage_naam }}</td>
                                @endforeach
                                <td>{{ $aantal }}</td>
                                </tr>
                                <div class="statistieken">
                                    <h1>Statistieken</h1>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                {{ $percent }}% onderweg of onbehandeld
                                            </div>
                                            <div class="col-3">
                                            </div>
                                            <div class="col-3">
                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
