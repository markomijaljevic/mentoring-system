@extends('main')

@section('title','| Predmeti')

@section('active3','active')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

@foreach($predmet as $pred)

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{$pred->id}}">
                            <h4 class="buttons panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$pred->id}}" aria-expanded="true" aria-controls="collapse{{$pred->id}}">
                                    {{$pred->name}}
                                </a>
                                -- {{ $pred->code }}
                            </h4>


                        </div>
                        <div id="collapse{{$pred->id}}" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading{{$pred->id}}">
                            <div class="panel-body">

                               {{$pred->program}}

                                <div class="row">
                                    <div class="col-md-4">
                                        @if(Auth::user()->role == "mentor")
                                            <a href="/predmeti/edit/{{ $pred->id }}" class="btn ">Edit</a>
                                            <a href="/predmeti/delete/{{$pred->id}}" class="btn ">Delete</a>
                                        @else
                                            <a style="" href="/predmeti/upisi/{{ $pred->id }}" class="btn ">Upiši Kolegij</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach


                </div>
            </div>

            @if(Auth::user()->role == "mentor")
                <div class="col-md-offset-1">
                    <div class="col-md-3">
                        <div class="well">

                            <a href="predmeti/novi" class="btn buttons btn-default btn-block"> novi predmet </a>

                        </div>
                    </div>
                </div>
            @endif

        </div><!-- end of row -->
    </div> <!-- end of container -->
@endsection

