@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reviews</h1>
    <div class="row">
        <div class="col-12">

            @if(session('status'))
                <div class="alert alert-succes">{{ session('status') }}</div>
            @endif

            <div class="card">
               
                <div class="card-body">
                    <table class="table">
                        <thead> 
                            <th>user_id</th>
                            <th>Score</th>
                            <th>omschrijving</th>
                        </thead>
                        <tbody> 
                            @foreach($reviews as $review)
                            @if ($review->status == 1)  
                            <tr>
                                <td>{{ $review->user_id}}</td>
                                <td>{{ $review->score}}</td>
                                <td>{{ $review->omschrijving}}</td> 
                            </tr>              
                            @endif
                            @endforeach
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection