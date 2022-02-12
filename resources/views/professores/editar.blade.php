@extends('layouts.app')

@section('content')

  {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
  @if (session()->has('message'))
  <div class="msg-info">
      <p class="">
          {{ session()->get('message') }}
      </p>
  </div>
@endif

    
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
        <a href="/professores/show">Voltar</a>
    </div>

    <div class="container">

        <p class="display-4 text-white">Editar Professor</p>
    
        <form action="/professores/{{ $prof->professor_id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group ">

                <label for="nome">Nome</label>
                <input type="text" class="form-control w-50" id="nome" name="nome" value="{{ $prof->nome }}">
            
            </div>
            <div class="form-group ">

                <label for="idade">Idade</label>
                <input type="text" class="form-control w-50" id="idade"  name="idade" value="{{ $prof->idade }}">
            
            </div>
            <div class="form-group ">

                <label for="email">Email</label>
                <input type="email" class="form-control w-50" id="email" name="email" value="{{ $prof->email }}">
            
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control w-50" id="password" name="password" value="{{ $prof->password }}">
            </div>

        

       
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <div class=" m-3">
            <button type="submit"
                    class="btn btn-primary">
                Guardar

            </button>
        </div>
        </form>
    </div>

    

    
    
@endsection