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

                <label for="nome">Curso da Turma:</label>     <br>    
                
                @foreach ($turmas['turmas'] as $t)
               
                   <label for="{{ $t->curso }}"> <input type="radio" id="{{ $t->curso }}" name="turmas" value={{ $t->curso }}> {{ $t->curso }} <br> </label>

                @endforeach  

               
            
            </div>

            <div class="form-group text-white p-3 " style="font-size:22pt">
               
                <label for="nome">Ano da Turma:</label>  <br>

                @foreach ($turmas['turmas'] as $c)
               
                    <label for="{{ $c->ano }}"> <input type="radio"  id="{{ $c->ano }}" name="anos" value="{{ $c->ano }}"> {{ $c->ano }} </label><br>

                @endforeach   
                              
                
            
            </div>

            <div class="form-group text-white p-3 " style="font-size:22pt">

                    <label for="nome">Professores da Turma: </label> <br>

                @foreach ($turmas['profs'] as $p)
               
                   <label for="{{ $p->nome }}"> <input type="checkbox"  id="{{ $p->nome }}" name="profs" value={{ $p->professor_id }}> {{ $p->nome }} </label><br>

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