@extends('layouts.app')

@section('content')

<div class="container text-center btn-voltar">
    <a href="/professores">&larr; Voltar  </a>
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
        <th scope="col">Nome</th>
        <th scope="col">Idade</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">EDITAR</th>
        <th scope="col">APAGAR</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($profs as $p)
        {{ $p }}
      <tr>
        <td>{{ $p->nome }}</td>
        <td>{{ $p->idade }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->password }}</td>
        <td><a href="/professores/{{ $p->professor_id }}/edit">Editar </a></td>


        <td>
            
            <form action="/professores/{{ $p->professor_id }}" method="POST">
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