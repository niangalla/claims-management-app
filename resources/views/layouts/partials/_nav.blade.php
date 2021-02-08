<header>
    
{{-- Nav --}}
<nav class="navbar navbar-expand-md p-0 fixed-top is-dark rounded">

    <div class="container-fluid col-xs-4">
        <img src="{{asset('/assets/img/etu/logo1.png')}}" class="mr-3 rounded" width="47px;" alt="">
        <a href="{{'/home'}}" class="navbar-brand mt-3 text-white">Géstion-Réclamations-UT</a>
        <button type="button" class="navbar-toggler navbar-light bg-white" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" id="home">
                <a href="{{'/home'}}" class="nav-item nav-link text-white">Accueil</a>
            </div>
            <div class="navbar-nav ml-auto" id="navright">
                @if (!session()->has('identifiant_admin') && !session()->has('identifiant_student'))
                    <a href="{{'/login_student'}}" class="nav-item nav-link text-white" id="student_block">Etudiants</a>
                    <a href="{{'/login_admin'}}" class="nav-item nav-link text-white" id="">Administration</a>
                    <a href="{{'/about'}}" class="nav-item nav-link text-white" id="">About</a>
                @endif
                @if(session()->has('identifiant_student') && $title == 'Make-Claims')
                    <a href="{{'/student_world'}}">
                        <button class="button is-normal is-rounded is-danger">Annuler</button>
                    </a>
                @endif
                @if (session()->has('identifiant_admin') && ($title == 'Claims-Student' | $title == 'Register-List-Notes'))
                    <form action="@if($title == 'Claims-Student')
                                    {{'claims_student.showByIne'}}
                                  @else
                                    {{'/register_list_notes'}}
                                  @endif" method="POST">
                         @csrf
                        <input class="button is-light is-rounded is-normal" type="search" name="searchINE" placeholder="recherche selon INE">
                        <button name="searchButton" class="button is-success is-rounded is-normal" type="submit">Recherche</button>
                    </form>
                @elseif((session()->has('identifiant_admin') && $title != 'Claims-Student' &&
                        $title != 'Register-List-Notes') | session()->has('identifiant_student'))
                        <a href="{{'/about'}}" class="nav-item nav-link text-white" id="">About</a>
                @endif
                @if (session()->has('identifiant_admin') | session()->has('identifiant_student') && $title == 'About')
                    <a href="@if (session()->has('identifiant_admin'))
                                 {{'/admin_world'}}
                            @else
                                 {{'/student_world'}}
                            @endif">
                        <button class="button is-normal is-rounded is-danger">Retour</button>
                    </a>
                @endif

            </div>
        </div>
    </div>
</nav>

</header>
