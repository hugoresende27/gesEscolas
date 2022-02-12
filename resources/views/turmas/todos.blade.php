@extends('layouts.app')

@section('content')

<div class="container text-center btn-voltar">
    <a href="/turmas">&larr; Voltar  </a>
</div>

 {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
 @if (session()->has('message'))
 <div class="">
     <p class="delete">
         {{ session()->get('message') }}
     </p>
 </div>
@endif

<div class="container p-3">
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Ano</th>
        <th scope="col">Curso</th>
        {{-- <th scope="col">Professores</th> --}}
        
        <th scope="col">EDITAR</th>
        <th scope="col">APAGAR</th>
      </tr>
    </thead>
    <tbody>
        {{-- {{ dd($turmas['turmas']) }} --}}
    @foreach ($turmas['turmas'] as $t)
        
      <tr>
        <td>{{ $t->ano }}</td>
        <td>{{ $t->curso }}</td>
        {{-- <td>
            @foreach ($turmas['profs'] as $p)
        
                {{ $p->nome }},
            @endforeach
        </td> --}}
        
        


        <td><a href="/turmas/{{ $t->turma_id }}/edit">Editar </a></td>


        <td>
            
            <form action="/turmas/{{ $t->turma_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit"
                        class="border-b-2  border-dotted italic text-red-200"
                        > Apagar </button>

            </form>

        </td>
        
      </tr>

    @endforeach
    </tbody>
  </table>
</div>    

    
    
@endsection