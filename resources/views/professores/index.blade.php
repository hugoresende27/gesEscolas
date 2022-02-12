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
         <a href="/professores/create">Registar Professor</a>
     </li>
     <li>
         <a href="/professores/show">Ver todos os Professores</a>
     </li>
 </ul>

    

    
    
@endsection