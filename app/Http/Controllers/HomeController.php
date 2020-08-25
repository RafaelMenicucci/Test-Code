<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Usuario;
use App\Usuariosdisciplinas;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexAluno()
    {
        $disciplinas = DB::table('usuariosdisciplinas')
                        ->join('disciplinas','usuariosdisciplinas.idDisciplina','=','disciplinas.id')
                        ->join('usuarios','usuariosdisciplinas.idUsuario','=','usuarios.id')
                        ->select('disciplinas.*')
                        ->where('usuariosdisciplinas.idUsuario','=',auth()->user()->id)
                        ->get();

        return view('aluno.home', compact('disciplinas'));
    }

    public function indexProfessor()
    {

        $disciplinas = DB::table('usuariosdisciplinas')
                        ->join('disciplinas','usuariosdisciplinas.idDisciplina','=','disciplinas.id')
                        ->join('usuarios','usuariosdisciplinas.idUsuario','=','usuarios.id')
                        ->select('disciplinas.*')
                        ->where('usuariosdisciplinas.idUsuario','=',auth()->user()->id)
                        ->get();

        return view('professor.home', compact('disciplinas'));
    }

    public function indexADM(){

        $professorMes=array_fill(1,12,0);
        $alunoMes=array_fill(1,12,0);
        $provaMes=array_fill(1,12,0);

        $professores = DB::table('usuarios')
                        ->select('usuarios.*')
                        ->where('usuarios.papel','=','Professor')
                        ->get();

        foreach($professores as $professor){
            $index=(int)date('m',strtotime($professor->created_at));
            $professorMes[$index]++;
        }

        $alunos = DB::table('usuarios')
                        ->select('usuarios.*')
                        ->where('usuarios.papel','=','Aluno')
                        ->get();

        foreach($alunos as $aluno){
            $index=(int)date('m',strtotime($aluno->created_at));
            $alunoMes[$index]++;
        }

        $provas = DB::table('provas')
                        ->select('provas.*')
                        ->get();

        foreach($provas as $prova){
            $index=(int)date('m',strtotime($prova->created_at));
            $provaMes[$index]++;
        }

        return view('adm.home',compact('professorMes','alunoMes','provaMes'));
    }
}
