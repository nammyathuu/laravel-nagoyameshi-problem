<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');

        if ($keyword !== null) {
            $users=User::where('name','LIKE',"%{keyword}%")
                       ->orwhere('kana','LIKE',"%{keyword}%")
                       ->paginate(15);
            $total=$users->total();
        }else{
            $users=User::paginate(15);
            $total="";
            $keyword=null;
        }    

        return view('admin.user.index', compact('users','total','keyword'));
    }

    public function show(User $user){
        $users=User::find('name');

        return view('admin.users.show',compact('name'));      
    }
}