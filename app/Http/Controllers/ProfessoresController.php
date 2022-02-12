<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('professores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('professores.registar');
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
            'nome'=>'required',
            'email'=>'required|unique:professors,email',
            'password'=>'required',
            'idade'=>'required|integer'
        ],
        [
            
            'nome.required' => 'Precisamos de um nome',
            'email.required' => 'Tem de colocar o seu email',
            'email.unique' => 'Email já registado',
            'password.required' => 'Tem de colocar o seu password',
            'idade.required' => 'Tem de colocar a sua idade',
            'idade.integer' => 'Tem de colocar a sua idade em números'
        ]);

    
        $prof = new Professor;
        $prof->nome = $request->input('nome');
        $prof->idade = $request->input('idade');
        $prof->email = $request->input('email');
        $prof->password = $request->input('password');
        $prof->save();
        $prof->turmas();
        
    

        return redirect('/professores')->with('message','Professor adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view ('professores.todos')
            ->with('profs', Professor::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('professores.editar')->with('prof', Professor::where('professor_id', $id)->first());
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
        // dd($id);
        $this->validate($request,[
            'nome'=>'required',
            'email'=>"required|unique:professors,email,$id,professor_id",
            'password'=>'required',
            'idade'=>'required|integer'
        ],
        [
            
            'nome.required' => 'Precisamos de um nome',
            'email.required' => 'Tem de colocar o seu email',
            'password.required' => 'Tem de colocar o seu password',
            'idade.required' => 'Tem de colocar a sua idade',
            'idade.integer' => 'Tem de colocar a sua idade em números'
        ]);

    
       Professor::where('professor_id',$id)
        ->update([
            'nome'=>$request->input('nome'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'idade'=>$request->input('idade')
        ]);
        

        return redirect('/professores/{id}')->with('message','Professor Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prof = Professor::where('professor_id', $id);
        $prof->delete();

        return redirect('/professores/todos')->with ('message', 'Professor apagado!');
    }
}
