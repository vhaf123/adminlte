<div class="card shadow">
                    <div class="card-body">

                        <ul class="list-unstyled indice">

                            @php
                                $i = 1;
                            @endphp

                            @foreach ($manual->capitulos as $capitulo)
                                <li>
                                    <h1 class="h6 font-weight-bold">{{$capitulo->name}}</h1>

                                    <ul class="subindice">
                                        

                                        @foreach ($capitulo->temas as $tema)

                                            <li class="@if ($i == 1) activo @endif" id="{{$tema->id}}">
                                                <h2 class = "h6">
                                                    <a href="" class="text-secondary text-decoration-none" v-on:click.prevent = "cambiarTema({{$tema->id}})">
                                                        {{$tema->name}}
                                                    </a>
                                                </h2>
                                            </li>

                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </ul>

                                </li>

                                
                            @endforeach
                        </ul>

                    </div>
                </div>