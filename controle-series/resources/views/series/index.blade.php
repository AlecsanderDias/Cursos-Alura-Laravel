<x-layout title="Séries">
    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach ($teste as $test)
        <li class="list-group-item">{{ $test }}</li>
        @endforeach
    </ul>
</x-layout>