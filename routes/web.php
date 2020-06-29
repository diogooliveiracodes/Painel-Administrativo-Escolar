<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

// ROTAS ALUNO
Route::get('/alunos', 'AlunoController@index')->name('alunos.index');
Route::get('/alunos/cadastrar', 'AlunoController@create')->name('alunos.create');
Route::post('/alunos/cadastrar', 'AlunoController@store')->name('alunos.store');
Route::get('/alunos/{aluno}', 'AlunoController@show')->name('alunos.show');
Route::get('/alunos/editar/{aluno}', 'AlunoController@edit')->name('alunos.edit');
Route::put('/alunos/editar/{aluno}', 'AlunoController@update')->name('alunos.update');
Route::delete('/alunos/{aluno}', 'AlunoController@destroy')->name('alunos.destroy');
Route::post('/home/aluno', 'AlunoController@find')->name('alunos.find');


// ROTAS CURSOS
Route::get('/cursos', 'CursoController@index')->name('cursos.index');
Route::get('/cursos/criar', 'CursoController@create')->name('cursos.create');
Route::post('/cursos/criar', 'CursoController@store')->name('cursos.store');
Route::get('/cursos/exibir/{curso}', 'CursoController@show')->name('cursos.show');
Route::get('/cursos/{curso}', 'CursoController@edit')->name('cursos.edit');
Route::put('/cursos/{curso}', 'CursoController@update')->name('cursos.update');
Route::delete('/cursos/destroy/{curso}', 'CursoController@destroy')->name('cursos.destroy');


// ROTAS TURMAS
Route::get('/turmas', 'TurmaController@index')->name('turmas.index');
Route::get('/turmas/criar', 'TurmaController@create')->name('turmas.create');
Route::post('/turmas/criar', 'TurmaController@store')->name('turmas.store');
Route::get('/turmas/exibir/{turma}', 'TurmaController@show')->name('turmas.show');
Route::get('/turmas/editar/{turma}', 'TurmaController@edit')->name('turmas.edit');
Route::put('/turmas/editar/{turma}', 'TurmaController@update')->name('turmas.update');
Route::delete('/turmas/{turma}', 'TurmaController@destroy')->name('turmas.destroy');
Route::get('/turmas/exibir/addaluno/{turma}', 'TurmaController@addAluno')->name('turmas.addAluno');
Route::post('/home/turma', 'TurmaController@find')->name('turmas.find');
