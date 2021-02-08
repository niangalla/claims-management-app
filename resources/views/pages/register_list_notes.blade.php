@extends('layouts/master', ['title'=>'Register-List-Notes'])
@section('content')

{{-- Main Div --}}
<div class="section" style="padding-bottom: 228px">

    {{-- Div For Main Session Heading --}}
    <div class="row table-container mb-0">

        <div class="bg-info p-0 offset-md-1 col-md-10 col-sm-11 offset-sm-1 rounded text-white" style="text-align:center;font-size:20px;">
            <h3>Bienvenue <strong>
                        @if (session()->has('admin_name'))
                            {{ session()->get('admin_name') }}
                        @endif
                </strong>
            </h3><br> Liste des Inscrits {{$inscrits->count()}}
        </div>
    </div>

    {{-- Div For Table --}}
    <div class="row table-container">

        <table class="table jumbotron offset-md-1 col-md-10 col-sm-11 offset-sm-1 col-10">
            <caption></caption>
            <thead>
                <tr>
                    <th scope="id">Id</th>
                    <th scope="identifiant">Identifiant</th>
                    <th scope="nom">Prenom</th>
                    <th scope="prenom">Nom</th>
                    <th scope="prenom">Niveau</th>
                    <th scope="prenom">Filiére</th>
                    <th scope="age">Mail</th>
                    <th scope="age">Adresse</th>
                    <th scope="age">Sexe</th>
                    <th scope="age">INE</th>
                    <th scope="naissance">Date de Naissance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscrits as $inscrit)
                <tr>
                    <td>{{$inscrit->id}}</td>
                    <td>{{$inscrit->identifiant_student}}</td>
                    <td>{{$inscrit->prenom}}</td>
                    <td>{{$inscrit->nom}}</td>
                    <td>{{$inscrit->niveau}}</td>
                    <td>{{$inscrit->filiere}}</td>
                    <td><a href="mailto:{{$inscrit->mail}}">{{$inscrit->mail}}</a></td>
                    <td>{{$inscrit->adresse}}</td>
                    <td>{{$inscrit->isMaleOrFemale()}}</td>
                    <td>{{$inscrit->ine}}</td>
                    <td>{{$inscrit->dateNaissance->format('m/d/y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{-- Pagination --}}
    <div class="offset-md-5 offset-3">
        @if ($token == 0)
            {{$inscrits->links()}}
        @endif
    </div>
    <br><br><br>
        @csrf
        <a href="@if(session()->has('identifiant_admin'))
                    {{'/admin_world'}}
                @endif">
            <button class="offset-md-1 button is-rounded is-focused is-info" id="login_out">Retour</button>
        </a>
    <br><br><br><br>

</div>

@endsection

