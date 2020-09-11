<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Usuario;
use App\Projeto;
use App\Usuariosdisciplinas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use DB;

class DisciplinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($disciplina)
    {
        return view('/professor/disciplina', compact('disciplina'));
    }

    public function indexupload($disciplina){
        return view('/professor/upload', compact('disciplina'));
    }

    public function guardaProjeto(Request $projetoCompactado, $disciplina){
        $this->validate($projetoCompactado, [
            'featured' => 'required|mimes:zip'
        ]);

        $featured = $projetoCompactado->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featuredsemzip = pathinfo($featured_new_name, PATHINFO_FILENAME);

        $idDisciplina = DB::table('disciplinas')
                        ->select('disciplinas.id')
                        ->where('disciplinas.nome','=',$disciplina)
                        ->get();
                        
        foreach($idDisciplina as $disciplinaid){
            $id=$disciplinaid->id;
        }

        $featured->move('uploads/'.$disciplina.'/projetos/'.$featuredsemzip.'/',$featured_new_name);

        exec("unzip uploads/$disciplina/projetos/$featuredsemzip/$featured_new_name -d uploads/$disciplina/projetos/$featuredsemzip/");
        exec("ls uploads/$disciplina/projetos/$featuredsemzip/",$out);
        $featuredoriginal=$out[1];

        exec("mvn test -f uploads/$disciplina/projetos/$featuredsemzip/$featuredoriginal",$out2);
        
        $result = 1;
        $search = 'Failed tests';
        $search2 = 'Tests run';
        foreach($out2 as $linha){
            if(strstr($linha, $search)){
                $result=0;
                Session::flash('erro', $linha);
                exec('rm -rf uploads/'.$disciplina.'/projetos/'.$featuredsemzip);
            }
            if(strstr($linha, $search2)){
                Session::flash('info', $linha);
            }
        }

        if($result){
            $prova = Projeto::create([
                'featured' => 'uploads/'.$disciplina.'/projetos/'. $featuredsemzip .'/'. $featuredoriginal,
                'idDisciplina' => $id,
                'nomeProjeto' => $featuredoriginal,
            ]);
        }

        return view('/professor/disciplina', compact('disciplina'));
    }
}
