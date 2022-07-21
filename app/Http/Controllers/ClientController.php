<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use Illuminate\Support\Facades\Log;


class ClientController extends Controller
{
    //

    public function index()
    {
        Log::info("ClientController::index");
        return view('client.index');
    }

    public function load(Request $request)
    {

            $clients = Client::all();
            return response()->json($clients);

    }

    public function save(Request $request)
    {

        Client::truncate();

        $increment = 0;
        // loop request array

        //obtain length of array
        $length = count($request->all());
        foreach ($request->all() as $key => $value) {
            $account = new Client();
            $account->account_txa = $value['account_txa'];
            $account->nif = $value['nif'];
            $account->name_company = $value['name_company'];
            $account->account_gts = $value['account_gts'];
            $account->save();
            $increment++;

            /* if ($increment == $length) {
                return response()->json(['success' => true]);
            }
            else {
                return response()->json(['success' => false]);
            } */
        }







    }


}
