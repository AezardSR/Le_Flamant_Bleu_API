<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Types;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function getRolesList()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }

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
