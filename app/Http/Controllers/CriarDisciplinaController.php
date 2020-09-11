<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Usuario;
use App\Usuariosdisciplinas;
use App\Mail\AdicionarAlunoDisciplina;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;

class CriarDisciplinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/professor/criarDisciplina');
    }

    public function indexAdicionarAluno($disciplina)
    {
        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.*')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->first();

        $usuariosDisciplina = DB::table('usuarios')
        ->join('usuariosdisciplinas','usuarios.id','=','usuariosdisciplinas.idUsuario')
        ->select('usuarios.*')
        ->where([['usuarios.papel','=','Aluno'],
        ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
        ])
        ->get();

        $alunosBuscados=collect(['false']);
        return view('/professor/adicionarAluno', compact('disciplina','usuariosDisciplina','alunosBuscados'));
    }

    public function criarDisciplina(Request $infoDisciplina){
        $validatedData = $infoDisciplina->validate([
            'nome' => 'required|unique:disciplinas|string|max:255',
            'anoPeriodo' => 'required|string|max:255',
        ]);

        Disciplina::create([
            'nome' => $infoDisciplina->nome,
            'anoPeriodo' => $infoDisciplina->anoPeriodo,
        ]);

        $idDisciplina = Disciplina::where('nome',$infoDisciplina->nome)->first();

        Usuariosdisciplinas::create([
            'idUsuario' => auth()->user()->id,
            'idDisciplina' => $idDisciplina->id,
        ]);

        $disciplinas = DB::table('usuariosdisciplinas')
                        ->join('disciplinas','usuariosdisciplinas.idDisciplina','=','disciplinas.id')
                        ->join('usuarios','usuariosdisciplinas.idUsuario','=','usuarios.id')
                        ->select('disciplinas.*')
                        ->where('usuariosdisciplinas.idUsuario','=',auth()->user()->id)
                        ->get();
        $usuarios = DB::table('usuarios')
                        ->select('usuarios.*')
                        ->where('usuarios.papel','=','Aluno')
                        ->get();
        Session::flash('status', 'Disciplina '.$infoDisciplina->nome.' criada com Sucesso.');
        return view('/professor/home', compact('disciplinas'));
    }

    public function adicionarAluno($disciplina,$aluno_id){
        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.*')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->first();

        $existe = DB::table('usuariosdisciplinas')
                    ->select('usuariosdisciplinas.*')
                    ->where([['usuariosdisciplinas.idUsuario','=',$aluno_id],
                            ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                    ])
                    ->get();
        if(!$existe->isEmpty()){
            Session::flash('erro', 'Aluno já foi adicionado a esta disciplina.');
            return redirect()->back();
        }

        Usuariosdisciplinas::create([
            'idUsuario' => $aluno_id,
            'idDisciplina' => $idDisciplina->id,
        ]);

        Session::flash('status', 'Aluno adicionado com Sucesso.');

        $usuariosDisciplina = DB::table('usuarios')
                                ->join('usuariosdisciplinas','usuarios.id','=','usuariosdisciplinas.idUsuario')
                                ->select('usuarios.*')
                                ->where([['usuarios.papel','=','Aluno'],
                                ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                                ])
                                ->get();


        $user = Usuario::where('id', $aluno_id)->first();     
        //Mail::to($user->email)->send(new AdicionarAlunoDisciplina($user, $disciplina));

        $alunosBuscados=collect(['false']);
        return redirect()->back();
    }

    public function buscarAluno(Request $nomeAluno, $disciplina){

        $alunosBuscados = DB::table('usuarios')
                            ->select('usuarios.*')
                            ->where([['usuarios.papel','=','Aluno'],
                            ['usuarios.nome', 'like', '%' . $nomeAluno->aluno . '%'],
                            ])
                            ->get();

        $idDisciplina = DB::table('disciplinas')
                            ->select('disciplinas.*')
                            ->where('disciplinas.nome','=',$disciplina)
                            ->first();

        $usuariosDisciplina = DB::table('usuarios')
                            ->join('usuariosdisciplinas','usuarios.id','=','usuariosdisciplinas.idUsuario')
                            ->select('usuarios.*')
                            ->where([['usuarios.papel','=','Aluno'],
                            ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                            ])
                            ->get();

        return view('/professor/adicionarAluno', compact('disciplina','usuariosDisciplina','alunosBuscados'));

    }

    public function removerAluno($disciplina,$aluno_id){
        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.*')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->first();

        $existe = DB::table('usuariosdisciplinas')
                    ->where([['usuariosdisciplinas.idUsuario','=',$aluno_id],
                            ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                    ])
                    ->delete();

        Session::flash('status', 'Aluno removido com Sucesso.');

        $usuariosDisciplina = DB::table('usuarios')
                                ->join('usuariosdisciplinas','usuarios.id','=','usuariosdisciplinas.idUsuario')
                                ->select('usuarios.*')
                                ->where([['usuarios.papel','=','Aluno'],
                                ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                                ])
                                ->get();

        $alunosBuscados=false;
        return redirect()->back();
    }
}
