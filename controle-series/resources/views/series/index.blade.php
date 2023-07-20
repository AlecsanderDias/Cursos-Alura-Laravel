<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($teste as $test)
        <li class="list-group-item d-flex justify-content-between align-items-center ">
            <a href="{{ route('seasons.index', $test->id) }}">
                <p class="my-auto">{{ $test->nome }}</p>
            </a>

            <span class="d-flex">
                <a href="{{ route('series.edit', $test->id) }}" class="btn btn-primary btn-sm me-2">E</a>
                <form action="{{route('series.destroy', $test->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>