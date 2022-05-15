@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Review check</h1>
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
                            <th>Status</th>
                        </thead>
                        <tbody> 
                            @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->user_id}}</td>
                                <td>{{ $review->score}}</td>
                                <td>{{ $review->omschrijving}}</td>
                                <td><input data-id="{{$review->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $review->status ? 'checked' : '' }}></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <script>
                            $(function() {
                              $('.toggle-class').change(function() {
                                  var status = $(this).prop('checked') == true ? 1 : 0; 
                                  var id = $(this).data('id'); 
                                   
                                  $.ajax({
                                      type: "GET",
                                      dataType: "json",
                                      url: '/changeReviewStatus',
                                      data: {'status': status, 'id': id},
                                      success: function(data){
                                        console.log(data.success)
                                      }
                                  });
                              })
                            })
                          </script>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
