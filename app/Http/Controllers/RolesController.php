<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Types;
use Illuminate\Http\Request;

class RolesController extends Controller
{
     /**
     * @OA\Get(
     *      path="/roles",
     *      operationId="getRolesList",
     *      tags={"Roles"},

     *      summary="Tous les roles",
     *      description="Returns all countries and associated provinces. The country_slug variable is used for country specific data",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function getRolesList()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }
 /**
     * @OA\Post(
     *      path="/roles",
     *      operationId="addRole",
     *      tags={"Roles"},

     *      summary="Tous les roles",
     *      description="Returns all countries and associated provinces. The country_slug variable is used for country specific data",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function addRole(Request $request)
    {
        $role = new Roles();
        $role->name = $request->input('name');
        $role->save();
        return response()->json($role);
    }

    public function getTypesList(){
        $types = Types::all();
        return response()->json($types);
    }

    public function addTypes(Request $request)
    {
        $type = new Types();
        $type->name = $request->input('name');
        $type->save();
        return response()->json($type);
    }

}
