<div>
    <input type="text" wire:model="searchTerm" placeholder="Buscar país">
    <select wire:model="perPage">
        <option value="10">10 por página</option>
        <option value="25">25 por página</option>
        <option value="50">50 por página</option>   

    </select>
    <div>
        @foreach ($paises as $pais)
            <option value="{{ $pais->id }}">{{ $pais->paisnombre }}</option>
        @endforeach
    </div>
    {{ $paises->links() }}
</div>