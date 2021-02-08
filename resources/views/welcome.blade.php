@extends('layouts/master', ['title'=>'Home'])

@section('content')

<div class="container" style="margin-top:40px;">

    <div class="bg-info p-2 text-center text-white mb-1 rounded" style="width:103%; margin-left:-15px;">

        <h1 id="home_title">Bienvenue sur la plateforme de Géstion des Réclamations</h1>

    </div>

    {{-- Single Row For Both Student and Admin Jumbotron Block --}}
    <div class="row">

        {{-- Student Jumbotron Div --}}
        <div class="offset-md-0 col-md-5 col-sm-12 offset-sm-0 col-10 offset-1 jumbotron shadow-lg bg-light" id="student">

            <div class=" bg-primary p-1 rounded text-white" style="text-align:center;font-size:18px">
                <h4>Espace Etudiant</h4>
            </div>

            <div>
                <img src="{{ asset('assets/img/etu/student1.jpg') }}" alt="etudiant1">
            </div>

            <a href="{{'/login_student'}}">
                <button class="btn btn-primary offset-4 col-4 mt-3 text-white" id="enter1">
                    <span style="font-size: 20px;">
                        Entrer
                    </span>
                </button>
            </a>

        </div>

        {{-- Admin Jumbotron Div --}}
        <div class="offset-md-2 col-md-5 offset-sm-0 col-sm-12 col-10 offset-1  jumbotron shadow-lg bg-light" id="proof_block">

            <div class=" bg-primary p-1 rounded text-white" style="text-align:center;font-size:18px;">
                <h4>Espace Chef de Département</h4>
            </div>

            <div>
                <img src="{{ asset('assets/img/ens/proof1new.jpg') }}" alt="chef">
            </div>

            <a href="{{'/login_admin'}}">
                <button class="btn btn-primary offset-4 col-4 mt-3 text-white" id="enter2">
                    <span style="font-size: 20px;">
                        Entrer
                    </span>
                </button>
            </a>

        </div>

    </div>

</div>

@endsection

