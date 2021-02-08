@extends('layouts/master', ['title' => 'Student_World'])

@section('content')

{{-- Main Div --}}
<div id="main_student_world"  class="section container" style="margin-top: 55px;">

    {{-- Single Row For Both Profile and Icons Div --}}
    <div class="row">

        {{-- Main Info Profile Div --}}
        <div class=" col-md-5 offset-1 col-sm-10 col-10 box jumbotron" >

            {{-- Main Panel Div --}}
            <div class="panel panel-default">

                {{-- Div For Profile Title --}}
                <div class="panel-heading p-0 bg-primary col-md-12">
                    <h3 class="panel-title text-white text-center" id="pseudo">
                        Profil de @if (session()->has('prenom') && session()->has('nom'))
                                      {{session()->get('prenom')}} {{session()->get('nom')}}
                                  @endif
                    </h3>
                </div>

                {{-- Main Div For Panel Body --}}
                <div class="panel-body">

                    {{-- Single Row For Both Image and Icons Div --}}
                    <div class="row">

                        {{-- Div For Image Profile --}}
                        <div class="col-md-5">

                            @if (session()->get('sex') == 'H' | session()->get('sex') == 'h')
                                <img src="{{asset('/assets/img/etu/student1.jpg')}}" id="img" alt="" class="img-circle">
                            @else
                                <img src="{{asset('/assets/img/etu/studentfemale.jpg')}}" id="img" alt="" class="img-circle">
                            @endif

                        </div>

                        {{-- Div For Icons and Infos Likes Name, Email --}}
                        <div class="col-md-6">

                            <strong><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    @if (session()->has('prenom') && session()->has('nom'))
                                        {{session()->get('prenom')}} {{session()->get('nom')}}
                                    @endif
                            </strong><br><br>
                            <strong><span class="icon is-small"><i class="fa fa-location-arrow"></i></span>
                                @if (session()->has('adresse'))
                                    {{session()->get('adresse')}}
                                @endif
                            </strong><br><br>
                            <strong> <span class="icon is-small"><i class="fa fa-envelope"></i></span>
                                @if (session()->has('mail'))
                                   <a href="{{session()->get('mail')}}">
                                        {{session()->get('mail')}}
                                    </a>
                                @endif
                           </strong><br><br>
                           <strong> <span class="icon is-small"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                @if (session()->has('ine'))
                                     {{session()->get('ine')}}
                                @endif
                           </strong><br><br>

                        </div>

                    </div>

                    {{-- Div For User Status --}}
                    <div class="box container" style="margin-top:20%">

                       <div class="col-md-11 bg-light">

                            <h5>Résponsabilités : </h5><br>
                            <p>
                                @if (session()->has('niveau') && session()->has('filiere') && session()->get('sex') == 'H')
                                  Etudiant en {{session()->get('niveau')}} &nbsp; {{session()->get('filiere')}}
                                @else
                                  Etudiante en {{session()->get('niveau')}} &nbsp; {{session()->get('filiere')}}
                                @endif
                            </p>

                       </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Main Actions Profile Div --}}
        <div class="col-md-5 ml-md-3 box jumbotron offset-1 col-10" >

                <div class="bg-primary rounded">
                    <h3 class="panel-title text-white text-center">Que voulez-vous faire ?</h3>
                </div>
                <div class="form-group">
                    <a href="{{'/claims_student'}}">
                        <button class="form-control button is-normal offset-3 col-7 is-link btn col-md-6 offset-md-3" style="margin-bottom:-70%;">
                            Mes Réclamations
                            @if ($all != 0)
                                <div class="col-md-1 button is-rounded is-danger offset-md-3 offset-4 col-1 " style="margin-top:-18px">
                                        {{$all}}
                                </div>
                            @endif

                        </button><br><br>
                    </a>
                    <a href="{{'/make_claims'}}">
                        <button class="form-control button is-normal offset-3 col-7 is-link btn col-md-6 offset-md-3" style="margin-bottom:-95%;">
                            Faire une Reclamation
                        </button><br><br><hr>
                    </a>
                </div>
                <form action="{{'/student_world'}}" method="POST" class="col-md-12">
                    {{csrf_field()}}
                    <div class="form-group" style="margin-top: 60%;">
                        <hr><button type="submit" class="form-control offset-3 col-7 button is-normal is-danger btn col-md-6 offset-md-3">
                            Déconnexion
                        </button>
                   </div>

                </form>

        </div>

    </div>

</div>

@endsection
