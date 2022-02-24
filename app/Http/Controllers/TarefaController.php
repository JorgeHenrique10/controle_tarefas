<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tarefas = Tarefa::where('user_id', $user->id)->paginate(2);
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'tarefa' => 'required',
            'data_limite_conclusao' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $user = Auth::user();

        $dados = $request->all();
        $dados['user_id'] = $user->id;

        $tarefa = Tarefa::create($dados);

        Mail::to($user->email)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        return view('tarefa.create', ['tarefa' => $tarefa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $regras = [
            'tarefa' => 'required',
            'data_limite_conclusao' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $user = Auth::user();

        if ($tarefa->user_id == $user->id) {

            $tarefa->update($request->all());
        }

        return redirect()->route('tarefa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        dd($tarefa);
    }
}
