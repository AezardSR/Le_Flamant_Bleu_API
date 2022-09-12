<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{

    public function viewPromo()
    {

    }
    public function viewListPromos()
    {
        $promo = Promo::all();
        return response()->json($promo);
    }

    public function addPromo($id, $name, $startDate, $endDate, $duration, $id_formationsTypes)
    {
        $promo = new Promo();
        $promo->id = $id;
        $promo->name = $name;
        $promo->startDate = $startDate;
        $promo->endDate = $endDate;
        $promo->duration = $duration;
        $promo->id_formationsTypes = $id_formationsTypes;
        $promo->save();
        return response()->json($promo)
    }

    public function addFormationPromo()
    {

    }

    public function deletePromo()
    {
        
    }
}
