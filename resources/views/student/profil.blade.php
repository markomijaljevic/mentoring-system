@extends('main')

@section('title','| Profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="row profile">
                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQzoL7LYphmQJUakxuGQMoTicLEMGTdb9fhBXoabCzfW44aNaZEA">
                            </a>
                        </div>

                        <h1>{{ Auth::user()->name }}</h1>
                        <h3>{{ Auth::user()->email }}</h3>

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading panel-default">
                            @if(Auth::user()->role =='student')
                                <h3 class="headings panel-title">{{ Auth::user()->status }}</h3>
                            @else
                                <h3 class="headings panel-title">{{ Auth::user()->role }}</h3>
                            @endif
                        </div>

                        <div class="panel-group" id="accordion" style="margin-top: 20px;" role="tablist" aria-multiselectable="true">

                             @foreach($upisan as $pred)
                                @if($pred->student_id == Auth::user()->id )
                                    <ul>
                                        <li class="text-uppercase list-group-item">{{$predmet->find($pred->predmet_id)->name}} <a href="/passed/{{ $pred->predmet_id }}" style="float: right;" class="btn">Passed</a> <a href="/remove/{{ $pred->predmet_id }}" style="float: right;" class="btn">Remove</a></li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    </div>

            </div>
        </div>
    </div>

    </div>
@endsection