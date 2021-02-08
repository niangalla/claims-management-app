@extends('layouts/master', ['title'=>'Login-Admin'])

@section('content')

{{-- Main Div --}}
<div class="section" style="margin-top: -100px">

    {{-- Main Form --}}
    <form action="" method="post"
        class="form-signin offset-md-4 col-md-4 offset-sm-1 col-sm-10 col-xs-4 jumbotron shadow-lg"
        id="login_ens">

        @csrf
        <h1 class="h3 mb-5 font-weight-normal text-center">Connexion Administration</h1>

        {{-- Div Form Group --}}
        <div class="form-group">

            <div class="input-icone">
                <input type="text" name="identifiant_admin" id="identifiant_admin" autofocus placeholder="Identifiant ou Email (*)"
                class="form-control @error('identifiant_admin') is-invalid @enderror"aria-describedby="helpId"
                value="@if(session()->has('old')){{session()->get('old')}}@else{{old('identifiant_admin')}}@endif">
               <i class="fa fa-user" aria-hidden="true"></i>
               
               @error('identifiant_admin')
               <span class="invalid-feedback" role="alert">
                   <strong class="alert button col-md-9 col-9 offset-1 offset-md-1 is-rounded is-small is-danger">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   </strong>
               </span>
               @enderror

            </div><br>

            <div class="input-icone">

                <input type="password" name="password_admin" id="password_admin" placeholder="Mot de passe (*)"
                class="form-control @error('password_admin') is-invalid @enderror" aria-describedby="helpId">
                <i class="fa fa-lock" aria-hidden="true"></i>

                @error('password_admin')
                <span class="invalid-feedback" role="alert">
                    <strong class="alert button col-md-9 col-9 offset-1 offset-md-1 is-rounded is-small is-danger">
                         {{ $message }}
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </strong>
                </span>
               @enderror<br>

            </div>

            <button type="submit" name="login_admin" id="login_button"
                    class="btn btn-primary offset-4 form-control col-4">
                    Connexion
            </button>

        </div>

    </form>

</div>

@endsection

