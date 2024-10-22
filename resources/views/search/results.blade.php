@foreach($sectores as $sector)
    <div class="sector-item" data-search="{{ $sector->nombre }}">
        {{ $sector->nombre }}
    </div>
@endforeach