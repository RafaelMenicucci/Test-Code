<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Usuario;
use App\Prova;
use App\Usuariosdisciplinas;
use App\Mail\AdicionarAlunoDisciplina;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;

class CriarProvaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($disciplina)
    {
        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.*')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->first();

        $projetos = DB::table('projetos')
                    ->select('projetos.*')
                    ->where('projetos.idDisciplina','=',$idDisciplina->id)
                    ->get();

        return view('/professor/projetos', compact('projetos','disciplina'));
    }

    public function indexProjeto($disciplina,$nomeProjeto)
    {

        return view('/professor/criarProva', compact('disciplina','nomeProjeto'));
    }

    public function criarProva(Request $request, $disciplina,$nomeProjeto){
        $this->validate($request, [
            'featured' => 'required|mimes:zip'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featuredsemzip = pathinfo($featured_new_name, PATHINFO_FILENAME);
        $featured->move('uploads/'.$disciplina.'/provas/'.$featuredsemzip.'/',$featured_new_name);
        
        $idProjeto = DB::table('projetos')
                        ->select('projetos.*')
                        ->where('projetos.nomeProjeto','=',$nomeProjeto)
                        ->first();

        $prova = Prova::create([
            'featured' => 'uploads/'.$disciplina.'/provas/'. $featuredsemzip .'/'. $featured_new_name,
            'idProjeto' => $idProjeto->id,
            'nomeProva' => $request->nome,
            'dataLimite' => $request->dataLimite,
        ]);
        
        Session::flash('status', 'Prova '.$request->nome.' do projeto '. $nomeProjeto.' criada com Sucesso.');

        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.*')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->first();

        $usuarios = DB::table('usuarios')
                        ->join('usuariosdisciplinas','usuarios.id','=','usuariosdisciplinas.idUsuario')
                        ->select('usuarios.*')
                        ->where([['usuarios.papel','=','Aluno'],
                                ['usuariosdisciplinas.idDisciplina','=',$idDisciplina->id],
                                ])
                        ->get();
        $user = Usuario::where('id', $aluno_id)->first();     
        Mail::to($user->email)->send(new AdicionarAlunoDisciplina($user, $disciplina));

        return view('/professor/criarProva', compact('disciplina','nomeProjeto'));
    }
}
