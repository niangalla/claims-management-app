<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class AdminsController extends Controller
{

    public function index() {
        if(strstr(session()->get('admin_poste'), 'Informatique')) {
            $all =  Reclamation::where('filiere', 'Informatique')->count();
        }else{
            $all =  Reclamation::where('filiere', 'LEA')->count();
        }
        return view('pages/admin_world')->withAll($all);
    }

    public function indexLoginAdmin() {
    //      Admin::create([
    //     'identifiant_admin' => 'drDiatta87',
    //     'password_admin' => bcrypt('diatta123', ['cost' => 12]),
    //     'admin_name' => 'Dr Henry Diatta',
    //     'admin_poste' => 'Chéf du Département LEA',
    //     'admin_adress' => 'Thies',
    //     'admin_mail' => 'drdiatta@gmail.com'
    // ]);
        $admins = Admin::all();

        return view('pages/login_admin')->withAdmins($admins);
    }

    public function login(Request $request) {
        $inputs = $request->all();

        $this->validate($request, ['identifiant_admin' => 'required', 'password_admin' => 'required']);

        $result = Admin::where(adminCredentials(), $inputs['identifiant_admin'])->get();
        $one = $result->first();

        if($one && password_verify($inputs['password_admin'], $one->password_admin)) {

            $request->session()->put('identifiant_admin', $one->identifiant_admin);
            $request->session()->put('sex', $one->sex);
            $request->session()->put('admin_poste', $one->admin_poste);
            $request->session()->put('admin_name', $one->admin_name);
            $request->session()->put('admin_adress', $one->admin_adress);
            $request->session()->put('admin_mail', $one->admin_mail);

            Flashy::success('Bienvenue '.session()->get('admin_name'));
            return redirect('admin_world');
        } else{
            Flashy::error('identifiant et/ou mot de passe incorrecte!');
            session()->flash('old', $inputs['identifiant_admin']);
            return redirect('login_admin');
        }
    }
    public function exitRegisterNotes() {
        return redirect('admin_world');
    }
    public function exitAdminWorld(Request $request) {
        $request->session()->flush();
        Flashy::primary('A Bientot !');
        return redirect('/login_admin');

    }
}
