@extends('layouts/master', ['title' => 'About'])

@section('content')

{{-- Main Div --}}
	<div id="start">
		<center>

			<h1 id="begin" class="button is-link is-rounded">A propos de Géstion-Réclamations-UT</h1>
			<fieldset class="jumbotron col-md-12 col-12 col-sm-10" id="fieldset" style="color:blue padding:20px;width:920px;height:780px;font-family:verdana; border:solid 2px  gray;">
             <p class="mb-1 col-md-12 col-12">
                Géstion-Réclamations-UT est une plateforme en ligne conçue pour faciliter le procéssus de géstions des réclamations ✍ des étudiants
                de l'Université de Thies. <br>

                Dans une époque ou le numérique 💻 occupe une place prépondérente dans notre quotidien, il serait plus judiciable de dématérialiser un procéssus jugé périlleux
                et dont certains méme ignorent son fonctionnement. <br>
                C'est dans ce contéxte que ce projet à été mis en place. <br>

                La plateforme offre plusieurs possibilités aussi bien que pour les étudiants que pour l'Administration. <br>
                <span class="button is-normal is-link">Les étudiants auront les possibilités :</span>
                <div class="col-md-9">
                    <ul><li>d'accéder à un éspace qui leur sont dédié avec des informations sur leur profil</li>
                        <li>de rédiger autant de réclamations qu'ils le souhaitent gràce à un formulaire bien pensé
                            ou ils auront l'occasion de renseigner toutes les informations relatives à une réclamation,
                        </li>
                        <li>
                            de connaitre éxactement le nombre de réclamations postés.
                        </li>
                    </ul>
                </div>
                <span class="button is-normal is-link">L'Administration aura les possibilités  :</span>
                <div class="col-md-9">
                    <ul>
                        <li>
                            d'accéder à un éspace qui leur est dédié avec des infos sur leur statut
                        </li>
                        <li>
                            de connaitre éxactement le nombre d'etudiants inscrits sur la plateforme
                        </li>
                        <li>
                            de gérer les réclamations postés par les étudiants avec à la clé une barre de recherche
                            selon leur INE pour faciliter l'accés aux réclamations.
                        </li>
                    </ul>
                </div>
            </p>
            </fieldset>
        </center>
    </div>

@endsection

