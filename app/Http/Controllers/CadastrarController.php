<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;

class CadastrarController extends Controller
{
    public function index(){
        $usuariosBuscados=collect(['false']);
        return view('adm.cadastrar',compact('usuariosBuscados'));
    }

    public function registrar(Request $data){
        $usuarios = DB::table('usuarios')
        ->select('usuarios.*')
        ->where([['usuarios.email','=',$data['email']],
            ['usuarios.papel','=',$data['papel']],
        ])
        ->first();

        if($usuarios){
            Session::flash('status', 'Este administrador já existe.');
            return view('adm.cadastrar');
        }

        Usuario::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'matricula' =>  NULL,
            'papel' => $data['papel'],
            'password' => Hash::make($data['password']),
        ]);

        Session::flash('status', 'Administrador '.$data['nome'].' registrado com Sucesso.');
        return view('adm.cadastrar');
    }

    public function buscarUsuario(Request $request){
        $usuariosBuscados = DB::table('usuarios')
                            ->select('usuarios.*')
                            ->where([['usuarios.nome', 'like', '%' . $request->usuario . '%'],
                                    ['usuarios.papel','=','Professor'],
                                    ])
                            ->get();

        return view('/adm/cadastrar', compact('usuariosBuscados'));

    }

    public function darPermissao($id){
        $usuario = DB::table('usuarios')
                        ->where('usuarios.id','=',$id)
                        ->update(['is_Admin'=> 1]);

        Session::flash('status', 'Usuário se tornou Administrador.');
        $usuariosBuscados=collect(['false']);
        return view('/adm/cadastrar', compact('usuariosBuscados'));
    }

    public function tirarPermissao($id){
        $usuario = DB::table('usuarios')
                        ->where('usuarios.id','=',$id)
                        ->update(['is_Admin'=> 0]);

        Session::flash('status', 'Usuário não é mas um Administrador.');
        $usuariosBuscados=collect(['false']);
        return view('/adm/cadastrar', compact('usuariosBuscados'));
    }
}
