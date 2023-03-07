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
     *      description="",
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
     *      summary="Ajouter un role",
     *      description="Ajouter un role en lui indiquant un nom, l'id s'ajoutera automatiquement",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"ajouter un role"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function addRole(Request $request)
    {
        $role = new Roles();
        $role->name = $request->input('name');
        $role->save();
        return response()->json($role);
    }

    /**
     * @OA\Get(
     *      path="/types",
     *      operationId="getTypesList",
     *      tags={"Roles"},

     *      summary="Tous les types de roles",
     *      description="Liste de tous les types de roles",
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
    public function getTypesList(){
        $types = Types::all();
        return response()->json($types);
    }

    /**
     * @OA\Post(
     *      path="/types",
     *      operationId="addTypes",
     *      tags={"Roles"},
     *      summary="Ajouter un type de role",
     *      description="Ajouter un type de role en lui indiquant un nom, l'id s'ajoutera automatiquement",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"ajouter un type"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function addTypes(Request $request)
    {
        $type = new Types();
        $type->name = $request->input('name');
        $type->save();
        return response()->json($type);
    }

}
