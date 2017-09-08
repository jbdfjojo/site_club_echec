<?php
/**
 * Created by PhpStorm.
 * User: nathan-fix
 * Date: 05/09/2017
 * Time: 11:27
 */

namespace App\Http\Controllers;



use Database\DAO\DAO_users;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class ctrl_compte
{

    public function page_compte(){

        tools::save_page_url();

        return view('compte');

    }

    public function connexion(Request $request){

        $req = $request->request->all();

        $is_ok = DAO_users::inscription_user($req);

        if($is_ok){

        $_SESSION['connexion'] = 'ok';

         return tools::return_page();

        }

    }


    public function deconnexion(){

        $_SESSION['connexion'] = 'not_ok';

        return Redirect::to('compte');
    }


}