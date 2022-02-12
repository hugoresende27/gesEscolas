@extends('layouts.app')

@section('content')

    
     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
     @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li class="text-white">
                        {{ $erro }}                   
                    </li>                 
                @endforeach
            </ul>
        </div>       
     @endif


    {{-- FORM CREATE-------------------- --}}

    <div class="container text-center btn-voltar">
        <a href="/turmas">Voltar</a>
    </div>

    <div class="container">

        <p class="display-4 text-white">Registar Turma</p>

        <form action="/turmas" method="POST">
            @csrf

            <div class="form-group text-white p-3" style="font-size:22pt">

                <label for="nome">Curso da Turma:</label>                
                <input type="radio"  name="turmas" value="A"> A 
                <input type="radio"  name="turmas" value="B"> B 
                <input type="radio"  name="turmas" value="C"> C 
                <input type="radio"  name="turmas" value="D"> D 
                <input type="radio"  name="turmas" value="E"> E 
                <input type="radio"  name="turmas" value="F"> F 
            
            </div>

            <div class="form-group text-white p-3 " style="font-size:22pt">

                <label for="nome">Ano da Turma:</label>                
                <input type="radio"  name="anos" value="7"> 7º
                <input type="radio"  name="anos" value="8"> 8º 
                <input type="radio"  name="anos" value="9"> 9º 
                <input type="radio"  name="anos" value="10"> 10º 
                <input type="radio"  name="anos" value="11"> 11º 
                <input type="radio"  name="anos" value="12"> 12º 
            
            </div>

            <div class="form-group text-white p-3 " style="font-size:22pt">

                    <label for="nome">Professores da Turma: </label> 

                @foreach ($turmas['profs'] as $p)
               
                    <input type="checkbox"  name="profs[]" value={{ $p->professor_id }}> {{ $p->nome }}

               @endforeach       
                
          
            
            </div>
      

        

       
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <div class=" m-3">
            <button type="submit"
                    class="btn btn-primary">
                Criar

            </button>
        </div>
        </form>
    </div>

    

    
    
@endsection