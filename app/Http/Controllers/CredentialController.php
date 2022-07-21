<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Credential;
use Illuminate\Support\Facades\Log;

class CredentialController extends Controller
{
    //

    public function index()
    {
        return view('credential.index');
    }

    public function list()
    {
        $credentials = Credential::all();
        return $credentials;

    }

    public function register(Request $request)
    {

        $credential = new Credential();
        $credential->name = $request->name;
        $credential->username = $request->username;
        $credential->password = $request->password;
        $credential->email = $request->email;
        $credential->role = $request->role;
        $credential->account_txa = $request->account_txa;
        $credential->account_gts = $request->account_gts;
        $credential->project_id = $request->project_id;
        $credential->save();
        return $credential;
    }

    public function delete($id)
    {

        $credential = Credential::find($id);
        $credential->delete();
        return $credential;
    }

}
