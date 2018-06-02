@extends('main')

@if(\Illuminate\Support\Facades\Auth::user())
    @section('title','| Novi Korisnik')
@else
    @section('title','| Register')
@endif


@section('active2','active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="headings panel-heading">Novi Korisnik</div>
                @else
                    <div class="panel-heading" style="font-weight:400;font-size: 20px">Registracija</div>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ime i Prezime</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus></input>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Uloga</label>
                            <div class="col-md-6">
                                <input id="role" type="radio" name="role" value="mentor" required> Mentor <br>
                                <input id="role" type="radio" name="role" value="student" required> Student
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <input id="status" type="radio" name="status" value="redovan" required> Redovan <br>
                                <input id="status" type="radio" name="status" value="izvanredan" required> Izvanredan <br>
                                <input id="status" type="radio" name="status" value="none" required> Ništa od navedenog
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Lozinka</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Potvrdi lozinku</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <button type="submit" class="btn btn-primary">
                                        Dodaj
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary">
                                        Registracija
                                    </button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
