@extends('main')

@section('title','| Izvjestaj')
@section('active4','active')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading panel-default">
                        <h3 class="headings panel-title">Studenti</h3>
                    </div>

                    <div class="panel-group" id="accordion" style="margin-top: 20px;" role="tablist" aria-multiselectable="true">

                        @foreach($students as $student)
                            @if($student->role =="student")

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$student->id}}">
                                        <h4 class="panel-title buttons">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$student->id}}" aria-expanded="true" aria-controls="collapse{{$student->id}}">
                                              @if($student->ukupanUpisanihECTS < 30 )
                                               <span style="color: red;">{{$student->name}}</span>
                                                  @else
                                                    <span style="color: blue;">{{$student->name}}</span>
                                                  @endif
                                            </a>
                                            -- {{ $student->ukupanUpisanihECTS }}
                                        </h4>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>


            </div>




@endsection