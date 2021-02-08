<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimsRequest;
use App\Models\Inscrit;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;


class ReclamationsController extends Controller
{

    public function create() {
        return view('pages/make_claims');
    }

    public function store(ClaimsRequest $request) {

        $findStudent = Inscrit::where('identifiant_student',session()->get('identifiant_student'))->get()->first();
        $idStudent = $findStudent->find($findStudent->id);

        Reclamation::create(['inscrit_id' => $idStudent->id,
                            'object' => $request->object,
                            'filiere' => $request->filiere,
                            'matiere' => $request->matiere,
                            'prof' => $request->prof,
                            'comments' => $request->comments,
        ]);
        Flashy::success('Réclamation créee avec succés!');
        return redirect('/student_world');
    }

    public function index() {

        if(session()->has('identifiant_student')) {
            $claims = Reclamation::where('inscrit_id', session()->get('id'))->orderBy('created_at')->simplePaginate(5);
        }elseif(session()->has('identifiant_admin') && strstr(session()->get('admin_poste'), 'Informatique')) {
            $claims = Reclamation::where('filiere', 'Informatique')->simplePaginate(5);
        }else{
            $claims = Reclamation::where('filiere', 'LEA')->simplePaginate(5);
        }
        $token = 0;
        return view('pages.claims_student')->withClaims($claims)->withToken($token);
    }
    public function showByIne(Request $request) {
        $inputs = $request->all();
        $this->validate($request, ['searchINE' => 'required']);
        if(session()->has('identifiant_admin')) {
            $resultINE =  Inscrit::where('ine', $inputs['searchINE'])->get()->first();
            if($resultINE) {
                $resultID = $resultINE->id;
                $claims = Inscrit::find($resultID)->reclamations;
                $token = 1;
            return view('pages.claims_student')->withClaims($claims)->withToken($token);
           }else{
                Flashy::error('Aucune entrée correspondante!');
                $token = 0;
                return back()->withToken($token);
           }
        }
    }

    public function show($id) {
        Reclamation::destroy($id);
        Flashy::success('Réclamation supprimée avec succés!');
        return back();
    }
}
