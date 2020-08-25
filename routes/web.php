<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'professor', 'middleware' => ['auth', 'verificaProfessor']], function() {
    Route::get('/home', 'HomeController@indexProfessor')->name('homeProfessor');

    Route::get('/criarDisciplina', 'CriarDisciplinaController@index')->name('criarDisciplina');
    Route::get('/{disciplina}/adicionarAluno', 'CriarDisciplinaController@indexAdicionarAluno');
    Route::post('/home', 'CriarDisciplinaController@criarDisciplina')->name('disciplina');
    Route::get('/{disciplina}/adicionarAluno/{aluno_id}', 'CriarDisciplinaController@adicionarAluno')->name('adicionarAluno');
    Route::post('/{disciplina}/adicionarAluno', 'CriarDisciplinaController@buscarAluno')->name('buscarAluno');
    Route::get('/{disciplina}/removerAluno/{aluno_id}', 'CriarDisciplinaController@removerAluno')->name('removerAluno');

    Route::get('/{disciplina}/projetos', 'CriarProvaController@index');
    Route::get('/{disciplina}/projetos/{nomeProjeto}', 'CriarProvaController@indexProjeto')->name('paginaCriarProva');
    Route::post('/{disciplina}/projetos/{nomeProjeto}', 'CriarProvaController@criarProva')->name('criarProva');

    Route::get('/{disciplina}', 'DisciplinaController@index');
    Route::get('/{disciplina}/upload', 'DisciplinaController@indexupload');
    Route::post('/{disciplina}', 'DisciplinaController@guardaProjeto')->name('fazerUploadProjeto');
    Route::get('/{disciplina}/notas','DisciplinaAlunoController@indexNotasProfessor');

});

Route::group(['prefix' => 'aluno', 'middleware' => ['auth', 'verificaAluno']], function() {
    Route::get('/home', 'HomeController@indexAluno')->name('homeAluno');

    Route::get('/notas','DisciplinaAlunoController@indexNota')->name('notas');

    Route::get('/{disciplina}', 'DisciplinaAlunoController@index');
    Route::get('/{disciplina}/{prova_nome}', 'DisciplinaAlunoController@baixarProva')->name('baixarProva');
    Route::get('/{disciplina}/{prova_nome}/enviarResposta','DisciplinaAlunoController@indexEnviarResposta')->name('indexEnviarResposta');
    Route::post('/notas', 'DisciplinaAlunoController@mandarResposta')->name('enviarResposta');

});

Route::get('/adm/home','HomeController@indexADM')->name('homeADM');
Route::get('/adm/cadastrar','CadastrarController@index');
Route::post('/adm/cadastrar', 'CadastrarController@buscarUsuario')->name('buscarusuario');
Route::get('/adm/cadastrar/darPermissao/{id}', 'CadastrarController@darPermissao')->name('darPermissao');
Route::get('/adm/cadastrar/tirarPermissao/{id}', 'CadastrarController@tirarPermissao')->name('tirarPermissao');

//Route::group(['prefix' => 'ADM', 'middleware' => ['auth', 'verificaADM']], function(){

//}