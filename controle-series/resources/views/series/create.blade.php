<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonQty" class="form-label">Nº Temporadas:</label>
                <input type="text" class="form-control" id="seasonQty" name="seasonQty" value="{{ old('seasonQty') }}">
            </div>
            <div class="col-2">
                <label for="episodeQty" class="form-label">Nº Episódios:</label>
                <input type="text" class="form-control" id="episodeQty" name="episodeQty" value="{{ old('episodeQty') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>