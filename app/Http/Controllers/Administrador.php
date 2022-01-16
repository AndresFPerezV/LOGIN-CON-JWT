<?php

namespace App\Http\Controllers;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class Administrador extends Controller
{

    public function admin(){
        
        $users=User::get();
        //return view('admin/admin');

        return view('admin/admin', compact('users'));
           
    }

    public function eliminar(Request $request){
        //dd($request);
        $id=$request->idee;
        $user=User::where('id',$id)->delete();
        $users=User::get();
        return view('admin/admin', compact('users'));
    }

    public function editar(Request $request){
        
        $id=$request->id;

        if($request->iden4=="Administrador"){
            $role=1;
        }else{
            if($request->iden4=="Consultor"){
                $role=2;
            }else{
                $role=NULL;
            }
        }
        $user=User::where('id',$id)->update(['name'=>$request->iden],['email'=>$request->iden2],['role_id'=>$role]);
        $users=User::get();
        return view('admin/admin', compact('users'));
    }
}
