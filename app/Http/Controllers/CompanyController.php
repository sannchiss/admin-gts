<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Log as Logger;


class CompanyController extends Controller
{
    //

    public function index()
    {
        Log::info("CompanyController::index");
        return view('company.index');
    }

    public function load(Request $request)
    {
        Log::info("CompanyController::load");
        $companies = Company::all();
        return response()->json($companies);

    }

    public function registerCompany(Request $request)
    {




        $company = new Company();

        foreach ($request->all() as $key => $value) {
           // $company->$key = $value;
            $company->applicante_name =         $value[0][0];
            $company->customer_type =           $value[1][0];
            $company->customer_tracking_gts =   $value[2][0];
            $company->name_company =            $value[3][0];
            $company->nif =                     $value[4][0];
            $company->account_txa =             $value[5][0];
            $company->customer_address =        $value[6][0];
            $company->customer_city =           $value[7][0];
            $company->user_name =               $value[8][0];
            $company->user_rut =                $value[9][0];
            $company->user_phone =              $value[10][0];
            $company->user_email =              $value[11][0];
            $company->proposed_date =           $value[12][0];
            $company->type_service =            $value[13][0];
            $company->type_of_impression =      $value[14][0];
            $company->documentary_return =      $value[15][0];
            $company->type_of_integration =     $value[16][0];
            $company->printer_property =        $value[17][0];
            $company->computer_property =       $value[18][0];
            $company->migrated_to_txa =         $value[19][0];
            $company->inhouse =                 $value[20][0];
            $company->save();
        }


    }

    public function getInfoCompany(Request $request, $id)
    {
        $company = Company::find($id);
        return $company;
    }

    public function updateCompany(Request $request)
    {
        $company = Company::find($request->id);
        $company->applicante_name =         $request->infoCompany['applicante_name'];
        $company->customer_type =           $request->infoCompany['customer_type'];
        $company->customer_tracking_gts =   $request->infoCompany['customer_tracking_gts'];
        $company->name_company =            $request->infoCompany['name_company'];
        $company->nif =                     $request->infoCompany['nif'];
        $company->account_txa =             $request->infoCompany['account_txa'];
        $company->customer_address =        $request->infoCompany['customer_address'];
        $company->customer_city =           $request->infoCompany['customer_city'];
        $company->user_name =               $request->infoCompany['user_name'];
        $company->user_rut =                $request->infoCompany['user_rut'];
        $company->user_phone =              $request->infoCompany['user_phone'];
        $company->user_email =              $request->infoCompany['user_email'];
        $company->proposed_date =           $request->infoCompany['proposed_date'];
        $company->type_service =            $request->infoCompany['type_service'];
        $company->type_of_impression =      $request->infoCompany['type_of_impression'];
        $company->documentary_return =      $request->infoCompany['documentary_return'];
        $company->type_of_integration =     $request->infoCompany['type_of_integration'];
        $company->printer_property =        $request->infoCompany['printer_property'];
        $company->computer_property =       $request->infoCompany['computer_property'];
        $company->migrated_to_txa =         $request->infoCompany['migrated_to_txa'];
        $company->inhouse =                 $request->infoCompany['inhouse'];
        $company->save(); // update the record in the database
    }

}
