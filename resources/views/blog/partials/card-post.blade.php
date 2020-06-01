<a href="{{route('blog.show', $post)}}" class="btn-block h-100 text-decoration-none">
    <div class="card shadow h-100">

        <div class="card-img">
            <img src="{{asset($post->picture)}}" alt="">
            <div class="card-text d-flex flex-column justify-content-between px-4 pt-3 pb-1">
                
                <div class="tags">
                    @foreach ($post->tags as $tag)
                        @switch($tag->id)
                            @case(1)
                                
                                <p class="lead d-inline mr-2">
                                    <span class="badge badge-primary">
                                        {{$tag->name}}
                                    </span>
                                </p>

                                @break
                            @case(2)

                                <p class="lead d-inline mr-2">
                                    <span class="badge badge-success">
                                        {{$tag->name}}
                                    </span>
                                </p>

                                @break
                            @case(3)

                                <p class="lead d-inline mr-2">
                                    <span class="badge badge-danger">
                                        {{$tag->name}}
                                    </span>
                                </p>

                                @break

                            @case(4)

                                <p class="lead d-inline mr-2">
                                    <span class="badge badge-warning">
                                        {{$tag->name}}
                                    </span>
                                </p>

                                @break

                            @case(5)

                                <p class="lead d-inline mr-2">
                                    <span class="badge badge-info">
                                        {{$tag->name}}
                                    </span>
                                </p>

                                @break
                            @default
                                
                        @endswitch
                    @endforeach
                </div>

                <div class="publicacion-conteo text-white d-flex justify-content-between">
                    
                    <p class="mb-0">
                        <i class="far fa-calendar-alt mr-2"></i>{{$post->created_at->toFormattedDateString()}}
                    </p>

                    <p class="mb-0">
                        <i class="fas fa-eye mr-2"></i>{{$post->contador}} Visitas
                    </p>

                </div>
                
            </div>
        </div>

        <div class="card-body">
            <h1 class="h4 text-dark">
                {{$post->name}}
            </h1>
            <p class="text-secondary">{{$post->extracto}}</p>
            
        </div>
    </div>
</a>