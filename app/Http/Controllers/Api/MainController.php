<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;




class MainController extends controller
{

    public function governorates ()
    {
     $governorates = Governorate::all();

       return responsejson (1 , 'Data retrieved successfully' , $governorates);

    }

public function cities(Request $request)
{

    $cities = City::where('governorate_id',$request->governorate_id)->get();
return responsejson(1 , 'success', $cities);




}




}
