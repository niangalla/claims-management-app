@extends('layouts/master', ['title'=>'Claims-Student'])
@section('content')

{{-- Main Div --}}
<div class="section" style="padding-bottom: 228px">

    {{-- Main Div Profile --}}
   <div class="row table-container mb-0">

      <div class="bg-info p-0 offset-md-1 col-md-10 col-sm-11 offset-sm-1 rounded text-white" style="text-align:center;font-size:20px;">
        <h3>Bienvenue <strong>
                        @if (session()->has('prenom') && session()->has('nom'))
                            {{ session()->get('prenom') }} {{ session()->get('nom') }}
                        @elseif(session()->has('admin_name'))
                            {{session()->get('admin_name')}}
                        @endif
                    </strong>
        </h3><br> Nombre de Réclamations {{$claims->count()}}
      </div>
  </div>

    {{-- Main Div Tableau --}}
    <div class="row table-container">

      <table class="table jumbotron offset-md-1 col-md-10 col-sm-11 offset-sm-1 col-10">

        <thead>
                <tr>
                    <th scope="inscrit_id">Posté par</th>
                    <th scope="inscrit_id">INE</th>
                    @if(session()->has('identifiant_admin'))
                        <th scope="inscrit_id">Niveau</th>
                        <th scope="inscrit_id">Filiére</th>
                    @endif

                    <th scope="object">Objet</th>
                    <th scope="matiére">Matière</th>
                    <th scope="comments">Profésseur</th>
                    <th scope="date">Date de création</th>
                    <th scope="prof">Adrésse Mail</th>
                    <th scope="prof">Commentaires</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($claims as $claim)
            <tr>
                <td>@if(session()->has('identifiant_student'))
                          {{session()->get('identifiant_student')}}
                    @else
                          {{$claim::find($claim->id)->inscrit->prenom .' '. $claim::find($claim->id)->inscrit->nom}}
                    @endif
                </td>

                <td>@if (session()->has('ine'))
                        {{session()->get('ine')}}
                    @else
                        {{$claim::find($claim->id)->inscrit->ine}}
                    @endif
                </td>
                @if(session()->has('identifiant_admin'))
                    <td>{{$claim::find($claim->id)->inscrit->niveau}}</td>
                    <td>{{$claim::find($claim->id)->inscrit->filiere}}</td>
                @endif


                <td>{{$claim->object}}</td>
                <td>{{$claim->matiere}}</td>
                <td>{{$claim->prof}}</td>
                <td>{{$claim->created_at->format('d/m/y H:i')}}</td>
                <td><a href="mailto:{{$claim::find($claim->id)->inscrit->mail}}">
                        {{$claim::find($claim->id)->inscrit->mail}}
                    </a>
                </td>
                <td>@if($claim->comments)
                        {{$claim->comments}}
                    @else
                        No Comments
                    @endif
                </td>
                <td>
                    @csrf
                    @method('DELETE')
                    <a href="{{route('claims_student.show', $claim->id)}}">
                        <button type="submit" class="button is-danger">
                            Supprimer
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>

      </table>

    </div>

    {{-- Pagination --}}
    <div class="offset-md-5 offset-3">
        @if($token == 0)
            {{$claims->links()}}
        @endif
    </div>
        <br><br><br>
        @csrf
        <a href="@if(session()->has('identifiant_student'))
                    {{'/student_world'}}
                @else
                    {{'/admin_world'}}
                @endif">
            <button  name="logout" class="offset-md-1 button is-rounded is-focused is-info" id="login_out">
                Retour
            </button>
        </a>

</div>

@endsection
