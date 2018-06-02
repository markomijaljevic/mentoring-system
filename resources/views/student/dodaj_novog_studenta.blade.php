@extends('main')

@section('title','| Dodaj Novog Studenta')

@section('active2','active')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <h4>Dodaj Novog Studenta</h4>
                    <hr>
                    {!! Form::open(['url' => 'foo/bar']) !!}

                    {{ Form::label('name','Ime i prezime') }}
                    {{ Form::text('name',null,array('class' => 'form-control')) }}

                    {{ Form::label('email','E-mail') }}
                    {{ Form::text('email',null,array('class' => 'form-control')) }}

                    {{ Form::label('password','Lozinka') }}
                    {{ Form::password('password',array('class' => 'form-control')) }}

                    {{ Form::label('password','Potvrdi lozinku') }}
                    {{ Form::password('password',array('class' => 'form-control')) }}

                    {{ Form::label('status','Status') }}<br>
                    {{ Form::radio('redovan','0') }} Redovan <br>
                    {{ Form::radio('izvanredan','1') }} Izvanredan <br>
                    {{ Form::radio('none','2') }} Ništa od navedenog <br>

                    {{ Form::submit('Dodaj',array('class' => 'btn btn-lg btn-primary btn-block ', 'style' => 'margin-top:20px')) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection