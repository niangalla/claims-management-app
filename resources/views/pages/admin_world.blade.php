@extends('layouts/master', ['title' => 'Admin_World'])

@section('content')

{{-- Main Div --}}
<div  class="section container" style="margin-top: 55px;">

    {{-- Single Row For Both Profile and Icons Div --}}
    <div class="row">

        {{-- Main Info Profile Div --}}
        <div class="col-md-5 offset-1 col-sm-10 col-10 box jumbotron">

            {{-- Main Panel Div --}}
            <div class="panel panel-default">

                {{-- Div For Profile Title --}}
                <div class="panel-heading p-0 bg-primary col-md-12">
                    <h3 class="panel-title  text-white text-center" id="pseudo">
                        Profil de  @if (session()->has('admin_name'))
                                        {{session()->get('admin_name')}}
                                   @endif
                    </h3>
                </div>

                 {{-- Main Div For Panel Body --}}
                <div class="panel-body">

                    {{-- Single Row For Both Image and Icons Div --}}
                    <div class="row">

                        <div class="col-md-5">
                            <img src="{{asset('/assets/img/ens/proof1new.jpg')}}" id="img" alt="" class="img-circle">
                        </div>

                        <div class="col-md-6">

                            <strong><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    @if (session()->has('admin_name'))
                                        {{session()->get('admin_name')}}
                                    @endif
                            </strong><br><br><br>
                            <strong><span class="icon is-small"><i class="fa fa-location-arrow"></i></span>
                                @if (session()->has('admin_adress'))
                                    {{session()->get('admin_adress')}}
                                @endif
                            </strong><br><br><br>
                            <strong> <span class="icon is-small"><i class="fa fa-envelope"></i></span>
                                @if (session()->has('admin_mail'))
                                   <a href="mailto:{{session()->get('admin_mail')}}">
                                        {{session()->get('admin_mail')}}
                                    </a>
                                @endif
                           </strong><br>

                        </div>

                    </div>

                    {{-- Div For User Status --}}
                    <div class="box container" style="margin-top:20%">
                       <div class="col-md-11 bg-light">
                            <h5>Responsabilités : </h5><br>
                            <p>
                                @if (session()->has('admin_poste'))
                                    {{session()->get('admin_poste')}}
                                @endif
                            </p>
                       </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Main Actions Profile Div --}}
        <div class="col-md-5 ml-md-3 box jumbotron offset-1 col-10">

                <div class="bg-primary rounded">
                    <h3 class="panel-title text-white text-center">
                        Que voulez-vous faire ?
                    </h3>
                </div>
                <div class="form-group">
                    <a href="{{'/register_list_notes'}}">
                        <button class="form-control button is-normal is-link btn col-md-6 offset-3 col-7 offset-md-3" style="margin-bottom:-70%;">
                            Liste des Inscrits
                        </button><br><br>
                    </a>

                    <a href="{{'/claims_student'}}">

                        <button class="form-control button is-normal is-link btn col-md-6 offset-3 col-7 offset-md-3" style="margin-bottom:-95%;">
                            Géstion des Réclamations
                            <div class="col-md-1 button is-rounded is-danger offset-md-0 offset-1 col-1 " style="margin-top:-18px">
                                {{$all}}
                            </div>
                        </button>
                        <br><br><hr>
                    </a>

                </div>
                <form action="" method="POST" class="col-md-12">
                    {{ csrf_field() }}
                    <div class="form-group" style="margin-top: 60%;">
                        <hr><button type="submit" name="logoutstudent" class="form-control button is-normal offset-3 col-7 is-danger btn col-md-6 offset-md-3">
                            Déconnexion
                        </button>
                   </div>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection
