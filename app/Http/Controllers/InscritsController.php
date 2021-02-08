<?php

namespace App\Http\Controllers;

use App\Models\Inscrit;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class InscritsController extends Controller
{
   public function indexStudentWorld() {
        $all = Reclamation::where('inscrit_id', session()->get('id'))->count();
        return view('pages/student_world')->withAll($all);
    }

    public function indexLoginStudent() {

        //     Inscrit::create([
        // 'identifiant_student' => 'fatou99',
        // 'prenom' => 'Fatou',
        // 'nom' => 'Sow',
        // 'niveau' => 'L2',
        // 'filiere' => 'LEA',
        // 'password' => bcrypt('fatou123', ['cost' => 12]),
        // 'mail' => 'fatou123@gmail.com',
        // 'adresse' => 'Dakar',
        // 'sex' => 'F',
        // 'ine' => 'N0018F450100',
        // 'dateNaissance' => '12/03/1999'
        // ]);
        $inscrits = Inscrit::all();
        return view('pages/login_student')->withInscrits($inscrits);
    }

    public function login(Request $request) {
        $inputs = $request->all();

        $this->validate($request, ['identifiant_student' => 'required', 'password_student' => 'required']);

        $result = Inscrit::where(studentCredentials() , $inputs['identifiant_student'])->get();

        $one = $result->first();

        if($one && password_verify($inputs['password_student'], $one->password)) {

            $request->session()->put('identifiant_student', $one->identifiant_student);
            $request->session()->put('sex', $one->sex);
            $request->session()->put('id', $one->id);
            $request->session()->put('mail', $one->mail);
            $request->session()->put('nom', $one->nom);
            $request->session()->put('prenom', $one->prenom);
            $request->session()->put('adresse', $one->adresse);
            $request->session()->put('niveau', $one->niveau);
            $request->session()->put('filiere', $one->filiere);
            $request->session()->put('ine', $one->ine);

            Flashy::success('Bienvenue '.session()->get('prenom').' '.session()->get('nom'));
            return redirect('student_world');
        }else{

            Flashy::error('identifiant et/ou mot de passe incorrecte!');
            session()->flash('old', $inputs['identifiant_student']);
            return redirect('login_student');
        }


    }
    public function exitRegisterNotes() {
            return redirect('student_world');
    }

    public function searchByIne(Request $request) {

        $inputs = $request->all();
        $this->validate($request, ['searchINE' => 'required']);
        if(session()->has('identifiant_admin')) {

            $inscrits = Inscrit::where('ine', $inputs['searchINE'])->get();
            if($inscrits) {
                $token = 1;
                return view('pages.register_list_notes')->withInscrits($inscrits)->withToken($token);
            }else{
                Flashy::error('Aucune entrée correspondante!');
                $token = 0;
                return back()->withToken($token);
            }
        }


    }

    public function show() {
        $token = 0;
        if(session()->has('identifiant_admin') && strstr(session()->get('admin_poste'), 'Informatique')){
            $inscrits = Inscrit::where('filiere', 'Informatique')->simplePaginate(5);
        }else{
            $inscrits = Inscrit::where('filiere', 'LEA')->simplePaginate(5);
        }
        return view('pages/register_list_notes')->withInscrits($inscrits)->withToken($token);
    }

    public function exitStudentWorld(Request $request) {

            $request->session()->flush();
            Flashy::primary('A Bientot !');

            return redirect('/login_student');

    }
}
