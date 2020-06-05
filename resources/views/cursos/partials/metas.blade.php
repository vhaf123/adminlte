<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h2 mb-3">Metas del curso</h1>

        <ul class="list-unstyled mb-0">
            @forelse ($curso->metas as $meta)
                <li>
                    <div class="media">
                        <i class="fas fa-check-circle mt-1 mr-2 text-danger"></i>
                        <div class="media-body">
                            <p class="text-secondary">{{$meta->name}}</p>
                        </div>
                    </div>
                </li>
            @empty
                <li>No tiene registrado ninguna meta</li>
            @endforelse
        </ul>
    </div>
</div>