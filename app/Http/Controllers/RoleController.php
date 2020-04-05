<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index (Role $role){
        $data = Role::all();
//        dd($data);
        return view('auth/register', ['data'=>$data]);
    }

}
