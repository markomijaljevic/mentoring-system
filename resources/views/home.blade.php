@extends('main')

@section('title','| Home')
@section('active1','active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron lead">
                Dobrodošao/la {{ substr(Auth::user()->name,0,strpos(Auth::user()->name," ",0))}},
                naši izvori nam govore da ste {{Auth::user()->role}}.
            </div>

            <div class="list-group" style="margin-top: 50px">
                <a href="/studenti" class="list-group-item">
                    <h4 class="list-group-item-heading">Studenti</h4>
                    <p class="list-group-item-text">Pregled svih studenata( redovni i izvanredni ). Upisni list.</p>
                </a>
                <a href="/predmeti" class="list-group-item">
                    <h4 class="list-group-item-heading">Predmeti</h4>
                    <p class="list-group-item-text">Pregled svih predmeta, njihovo uređivanje i dodavanje novog.</p>
                </a>
            </div>


        </div>
        </div>
    </div>
</div>
@endsection
