@extends('layouts/master', ['title'=>'Login-Student'])

@section('content')

{{-- Main Div --}}
<div class="section" style="margin-top: -100px">

    <form action="" method="POST"
          class="form-signin offset-md-4 col-md-4 offset-sm-1 col-sm-10 col-xs-3  jumbotron shadow-lg"
          id="login_etu">

        @csrf
        <h1 class="h3 mb-5 font-weight-normal text-center">Connexion Etudiant</h1>

            {{-- Div Form Group --}}
            <div class="form-group">

                <div class="input-icone">

                    <input  type="text" name="identifiant_student" id="identifiant" autofocus placeholder="Identifiant ou Email (*)"
                    class="form-control @error('identifiant_student') is-invalid @enderror" aria-describedby="helpId"
                    value="@if(session()->has('old')){{session()->get('old')}}@else{{old('identifiant_student')}}@endif">
                    <i class="fa fa-user" aria-hidden="true"></i>

                    @error('identifiant_student')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-9 offset-md-1 is-rounded is-small is-danger">
                             {{ $message }}
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                    @enderror

                </div><br>
                {{-- <input  type="text" name="identifiant_student" id="identifiant" autofocus placeholder="Identifiant ou Email (*)"
                class="form-control @error('identifiant_student') is-invalid @enderror" aria-describedby="helpId"
                value="@if(session()->has('old')){{session()->get('old')}}@else{{old('identifiant_student')}}@endif"> --}}

                {{-- @error('identifiant_student')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-9 offset-md-1 is-rounded is-small is-danger">
                             {{ $message }}
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                @enderror <br> --}}

                <div class="input-icone">

                    <input type="password" name="password_student" id="password" placeholder="Mot de passe (*)"
                    class="form-control @error('password_student') is-invalid @enderror" aria-describedby="helpId">
                    <i class="fa fa-lock" aria-hidden="true"></i>

                    @error('password_student')
                    <span class="invalid-feedback" role="alert">
                        <strong class=" alert button is-small is-rounded col-md-9 offset-md-1 is-danger">
                            {{ $message }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                    @enderror<br>

                </div>
                {{-- <input type="password" name="password_student" id="password" placeholder="Mot de passe (*)"
                class="form-control @error('password_student') is-invalid @enderror" aria-describedby="helpId"> --}}

                {{-- @error('password_student')
                <span class="invalid-feedback" role="alert">
                    <strong class=" alert button is-small is-rounded col-md-9 offset-md-1 is-danger">
                        {{ $message }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </strong>
                </span>
                @enderror<br> --}}

                <button type="submit" name="login_student" id="login_button"
                        class="btn btn-primary offset-4 form-control col-4">
                        Connexion
                </button>

            </div>

    </form>

</div>

@endsection

