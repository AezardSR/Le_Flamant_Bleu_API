<?php

namespace App\Http\Controllers;

use App\Models\Roles;
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
        $role->id = $id;
        $role->name = $name;
        $role->save();
        return response()->json($role);
    }
}