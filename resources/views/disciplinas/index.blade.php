@extends('layouts.app')

@section('content')

<div class="container text-center btn-voltar">
    <a href="/home" >Voltar</a>
</div>

  {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
  @if (session()->has('message'))
  <div class="msg-info">
      <p class="">
          {{ session()->get('message') }}
      </p>
  </div>
@endif

 <ul>
     <li>
         <a href="/disciplinas/create">Registar Disciplina</a>
     </li>
     <li>
         <a href="/disciplinas/show">Ver todas as Disciplinas</a>
     </li>
 </ul>

    

    
    
@endsection