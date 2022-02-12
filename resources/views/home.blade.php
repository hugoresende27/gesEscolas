@extends('layouts.app')
@extends('layouts.footer')
@section('content')


<style>

    ul li{
        list-style: none;
    }

</style>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                {{-- {{ dd(auth()) }} --}}
                <div class="card-header">{{ __('Bem vindo') }} Sr.(a) {{ auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li >
                            <a href="/professores">Professores</a>
                        </li>
                        <li>
                            <a href="">Alunos</a>
                        </li>
                        <li>
                            <a href="">Cursos</a>
                        </li>
                        <li>
                            <a href="/disciplinas">Disciplinas</a>
                        </li>
                        <li>
                            <a href="/turmas">Turmas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
