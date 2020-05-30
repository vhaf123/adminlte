<div class="card">
    <div class="card-body">
        <h1 class="h2 pl-2">Requisitos</h1>

        <ul class="mb-0 text-secondary">
            @forelse ($curso->requisitos as $requisito)
                <li>{{$requisito->name}}</li>
            @empty
                <li>No tiene ningún requisito registrado</li>
            @endforelse
        </ul>
    </div>
</div>