@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin dashboard</h1>
    <div class="row">
        <div class="col-12">

            @if(session('status'))
                <div class="alert alert-succes">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('add-garage')}}" class="btn btn-primary float-end">Garage toevoegen</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>user_id</th>
                            <th>Naam</th>
                            <th>Garage plaats</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach($garages as $garage)

                            <tr>
                                <td>{{ $garage->user_id}}</td>
                                <td>{{ $garage->garage_naam}}</td>
                                <td>{{ $garage->plaats}}</td>
                                <td><input data-id="{{$garage->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $garage->status ? 'checked' : '' }}></td>
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
                                      url: '/changeStatus',
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
