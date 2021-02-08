@extends('layouts/master', ['title' => 'Make-Claims'])

@section('content')

{{-- Main Div --}}
<div class="section">

    <form action="" method="POST" id="claims_form" class="offset-md-3 col-md-6 offset-sm-1 col-sm-10 col-xs-4 jumbotron shadow-lg" style="margin-top: -45px">
        @csrf
        <h1 class="h2 mb-5 font-weight-bold text-center">Formulaire de Réclamation</h1>

        {{-- Div Form Group --}}
        <div class="form-group">

            <input type="text" name="object" autofocus placeholder="Objet (*)" class="form-control @error('object') is-invalid  @enderror" aria-describedby="helpId" value="{{old('object')}}">

                @error('object')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-6 offset-md-3 is-rounded is-small is-danger">
                            {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                @enderror <br>

            <input type="text" name="filiere" autofocus placeholder="Filière (*)" class="form-control @error('filiere') is-invalid  @enderror" aria-describedby="helpId" value="{{old('filiere')}}">

                @error('filiere')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-6 offset-md-3 is-rounded is-small is-danger">
                            {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                @enderror <br>

            <input type="text" name="matiere" placeholder="Matiére (*)" class="form-control @error('matiere') is-invalid @enderror"value="{{old('matiere')}}">

                @error('matiere')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-6 offset-md-3 is-rounded is-small is-danger">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                @enderror <br>

            <input type="text" name="prof" placeholder="Profésseur (*)" class="form-control @error('prof') is-invalid @enderror" value="{{old('prof')}}">

                @error('prof')
                    <span class="invalid-feedback" role="alert">
                        <strong class="alert button col-md-6 offset-md-3 is-rounded is-small is-danger">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </strong>
                    </span>
                @enderror

            <br>
            <textarea class="form-control" name="comments" cols="80" rows="8" placeholder="En dire plus..." value="{{old('comments')}}"></textarea><br><br>
            <button type="submit" name="ok" id="ok" class="button is-small is-rounded is-success form-control btn btn-primary offset-4 col-4">Envoyer

        </div>

    </form>

</div>

@endsection
