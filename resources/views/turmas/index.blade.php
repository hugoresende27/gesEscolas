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
         <a href="/turmas/create">Registar Turma</a>
     </li>
     <li>
         <a href="/turmas/show">Ver todos as Turmas</a>
     </li>
 </ul>

    

    
    
@endsection