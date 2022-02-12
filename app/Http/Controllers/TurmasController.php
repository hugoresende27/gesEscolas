<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Turma;
use App\Models\Professor;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('turmas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profs = Professor::all();
        $turmas = Turma::all();

        return view ('turmas.registar')
            ->with('turmas', ['turmas'=> $turmas,
                                'profs'=>$profs]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'turmas'=>'required|max:1',
            'anos'=>'required|max:2',
            'profs'=>'required|min:1'
         
        ],
        [
            
            'turmas.required' => 'Precisamos de uma letra',
            'anos.required' => 'Precisamos de um ano',
            'profs.required' => 'Precisamos de um professor no mínimo',
          
        ]);

        // $professores =(int)($request->profs);
        //$professores = Professor::where('professor_id',$request->input('profs'))->value('professor_id');
       
         //dd($request);
        $prof = new Professor;
        $prof_id = $prof->where('professor_id',$request->input('profs'))->value('professor_id');
    
        $turma = new Turma;
        $turma->letra = $request->input('turmas');
        $turma->ano = $request->input('anos');
        // $turma->prof_id = $professores ;
        // dd($turma);
        $turma->save();
        $turma->professores()->attach($prof_id );
        // $prof->turmas()->attach($turma-> );
    

        return redirect('/turmas/show')->with('message','Turma adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $turmas = Turma::orderBy('ano', 'DESC')->get();
        $profs = Professor::all();
       
        return view ('turmas.todos')
                ->with('turmas', ['turmas'=> $turmas,
                                 'profs'=>$profs]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::where('turma_id', $id)->first();
        $profs = Professor::all();
        return view('turmas.editar')->with('turma', ['turma'=> $turma,
                                                    'profs'=>$profs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'turmas'=>'required|max:1',
            'anos'=>'required|max:2',
            'profs'=>'required'
         
        ],
        [
            
            'turmas.required' => 'Precisamos de uma letra',
            'anos.required' => 'Precisamos de um ano',
            'profs.required' => 'Precisamos de um professor no mínimo',
          
        ]);

    
        $prof = new Professor;
        $professores = Professor::where('professor_id',$request->input('profs'))->value('professor_id');
        // dd($request->profs);
        $turma = Turma::where('turma_id',$id)
            ->update([
            'letra'=>$request->input('turmas'),
            'ano'=>$request->input('anos'),
            //'professor_id'=>$request->profs
            
        ]);
        
        $turma->professores()->attach($professores);
        $prof->turmas()->attach($professores);

        return redirect('/turmas/show')->with('message','Turma Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::where('turma_id', $id);
        $turma->delete();

        return redirect('/turmas/todos')->with ('message', 'Turma apagada!');
    }
}
