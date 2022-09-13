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

    public function addRole($id, $name)
    {
        $role = new Roles();
        $role->name = $name;
        $role->save();
        return response()->json($role);
    }

    public function getTypesList(){
        $types = Types::all();
        return response()->json($types);
    }

    public function addTypes($name)
    {
        $type = new Types();
        $type->name = $name;
        $type->save();
        return response()->json($type);
    }

}
