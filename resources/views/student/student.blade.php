@extends('main')

@section('title','| Studenti')
@section('active2','active')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading panel-default">
                        <h3 class="headings panel-title">REDOVNI</h3>
                    </div>

                    <div class="panel-group" id="accordion" style="margin-top: 20px;" role="tablist" aria-multiselectable="true">

                        @foreach($students as $student)
                            @if($student->status == 'redovan' && $student->role == 'student')

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$student->id}}">
                                        <h4 class="panel-title buttons">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$student->id}}" aria-expanded="true" aria-controls="collapse{{$student->id}}">
                                                {{$student->name}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$student->id}}" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading{{$student->id}}">
                                        <div class=" listitems panel-body">


                                            @foreach($upisan as $pred)
                                                @if($pred->student_id == $student->id )
                                                    <ul>
                                                        @if(Auth::user()->role == 'mentor')
                                                            <li>{{$predmet->find($pred->predmet_id)->name}} --- <a href="/ispisi/{{$pred->predmet_id}}/{{$pred->student_id}}">Ispiši</a></li>
                                                         @else
                                                            <li>{{$predmet->find($pred->predmet_id)->name}}</li>
                                                        @endif

                                                    </ul>
                                                @endif
                                            @endforeach




                                            @if(Auth::user()->role == 'mentor')
                                            <div class="row">
                                                <div class="col-md-4 ">
                                                    <a href="/studenti/{{ $student->id}}" class="btn ">Delete</a>
                                                </div>
                                            </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>


            </div>

            <div class="col-md-5">

                <div class="panel panel-default">
                    <div class="panel-heading panel-default">
                        <h3 class="headings panel-title">IZVANREDNI</h3>
                    </div>


                    <div class="panel-group" id="accordion1" style="margin-top: 20px;" role="tablist" aria-multiselectable="true">

                            @foreach($students as $student)
                                @if($student->status == 'izvanredan' && $student->role == 'student')

                                   <div class="panel panel-default">
                                       <div class="panel-heading" role="tab" id="heading{{$student->id}}">
                                           <h4 class="panel-title buttons">
                                               <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$student->id}}" aria-expanded="true" aria-controls="collapse{{$student->id}}">
                                                   {{$student->name}}
                                               </a>
                                           </h4>
                                       </div>
                                       <div id="collapse{{$student->id}}" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading{{$student->id}}">
                                           <div class="listitems panel-body">

                                               @foreach($upisan as $pred)
                                                   @if($pred->student_id == $student->id )
                                                       <ul>
                                                           @if(Auth::user()->role == 'mentor')
                                                               <li>{{$predmet->find($pred->predmet_id)->name}} --- <a href="/ispisi/{{$pred->predmet_id}}/{{$pred->student_id}}">Ispiši</a></li>
                                                           @else
                                                               <li>{{$predmet->find($pred->predmet_id)->name}}</li>
                                                           @endif

                                                       </ul>
                                                   @endif
                                               @endforeach

                                               @if(Auth::user()->role == 'mentor')
                                               <div class="row">
                                                   <div class="col-md-4 ">
                                                       <a href="/studenti/{{ $student->id}}" class="btn ">Delete</a>
                                                   </div>
                                               </div>
                                               @endif

                                           </div>
                                       </div>
                                   </div>
                                @endif
                            @endforeach

                    </div>
                </div>

            </div>
@if(Auth::user()->role == 'mentor')
            <div class="col-md-2">
                <div class="well">
                    <a href="/register" class="btn btn-default buttons btn-block">Novi</a>
                </div>
            </div>
            @endif
        </div> <!-- end of row -->
</div>

@endsection