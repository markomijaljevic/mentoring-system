@extends('main')

@section('title','| Dodaj Novi Predmet')

@section('active3','active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                @if(isset($subject))
                    <h4>Edit</h4>
                @else
                    <h4>Dodaj Novi Predmet</h4>
                @endif
                <hr>

                    @if(isset($subject))
                    {!! Form::model(['route' => ['predmet.edit']]) !!}


                        {{ Form::label('name','Ime') }}
                        {{ Form::text('name',$subject->name,array('class' => 'form-control')) }}

                        {{ Form::label('code','Kod') }}
                        {{ Form::text('code',$subject->code,array('class' => 'form-control')) }}

                        {{ Form::label('ects','Ects') }}
                        {{ Form::text('ects',$subject->ects,array('class' => 'form-control')) }}

                        {{ Form::label('electivecourse','Izborni predmet') }}<br>
                        {{ Form::radio('electivecourse','Da')}} Da <br>
                        {{ Form::radio('electivecourse','Ne')}} Ne <br>

                        {{ Form::label('sem_redovni','Semestar redovni') }}
                        {{ Form::text('sem_redovni',$subject->sem_redovni,array('class' => 'form-control')) }}

                        {{ Form::label('sem_izvanredni','Semestar izvanredni') }}
                        {{ Form::text('sem_izvanredni',$subject->sem_izvanredni,array('class' => 'form-control')) }}

                        {{ Form::label('program','Program') }}
                        {{ Form::textarea('program',$subject->program,array('class' => 'form-control' ,'rows' => '4', 'cols' => '50')) }}

                        {{ Form::submit('Edit',array('class' => 'btn btn-lg btn-success btn-block ', 'style' => 'margin-top:20px')) }}

                        {!! Form::close() !!}

                @else


                    {!! Form::model(['route' => ['predmet.create']]) !!}

                    {{ Form::label('name','Ime') }}
                    {{ Form::text('name',null,array('class' => 'form-control')) }}

                    {{ Form::label('code','Kod') }}
                    {{ Form::text('code',null,array('class' => 'form-control')) }}

                    {{ Form::label('ects','Ects') }}
                    {{ Form::text('ects',null,array('class' => 'form-control')) }}

                    {{ Form::label('electivecourse','Izborni predmet') }}<br>
                    {{ Form::radio('electivecourse','Da')}} Da <br>
                    {{ Form::radio('electivecourse','Ne')}} Ne <br>

                    {{ Form::label('sem_redovni','Semestar redovni') }}
                    {{ Form::text('sem_redovni',null,array('class' => 'form-control')) }}

                    {{ Form::label('sem_izvanredni','Semestar izvanredni') }}
                    {{ Form::text('sem_izvanredni',null,array('class' => 'form-control')) }}

                    {{ Form::label('program','Program') }}
                    {{ Form::textarea('program',null,array('class' => 'form-control' ,'rows' => '4', 'cols' => '50')) }}

                    {{ Form::submit('Dodaj',array('class' => 'btn btn-lg btn-success btn-block ', 'style' => 'margin-top:20px')) }}

                    {!! Form::close() !!}

                @endif


            </div>
        </div>
    </div>
</div>

@endsection