@extends('layouts.app')

@section('content')

<div class="container text-center btn-voltar">
    <a href="/disciplinas" >Voltar</a>
</div>

  {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
  @if (session()->has('message'))
  <div class="msg-info">
      <p class="">
          {{ session()->get('message') }}
      </p>
  </div>


@endif

<div class="container">

        <p class="display-4 text-white">Registar Disciplina</p>

        <form action="/disciplinas" method="POST">
            @csrf

            <div class="form-group ">

                <label for="nome">Nome</label>
                <input type="text" class="form-control w-50" id="nome" name="nome" placeholder="Nome da disciplina"
                value="{{ old('nome') }}">
            
            </div>
        

            {{-- BOTÃO SUBMIT-------------------- --}}
            <div class=" m-3">
            <button type="submit"
                    class="btn btn-primary">
                Registar

            </button>
        </div>
        </form>
    </div>
    

    
    
@endsection