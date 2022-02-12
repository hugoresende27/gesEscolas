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
        <a href="/professores">Voltar</a>
    </div>

    <div class="container">

        <p class="display-4 text-white">Registar Professor</p>

        <form action="/professores" method="POST">
            @csrf

            <div class="form-group ">

                <label for="nome">Nome</label>
                <input type="text" class="form-control w-50" id="nome" name="nome" placeholder="Primeiro e ultimo nome"
                value="{{ old('nome') }}">
            
            </div>
            <div class="form-group ">

                <label for="idade">Idade</label>
                <input type="text" class="form-control w-50" id="idade"  name="idade" placeholder="Idade"
                value="{{ old('idade') }}">
            
            </div>
            <div class="form-group ">

                <label for="email">Email</label>
                <input type="email" class="form-control w-50" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control w-50" id="password" name="password" placeholder="Password">
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