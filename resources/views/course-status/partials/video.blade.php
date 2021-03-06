<div class="embed-responsive embed-responsive-16by9" v-html = "actual.iframe">
</div>

<h1 class="h3 font-weight-bold mt-3" id="titulo">@{{actual.name}}</h1>

<p class="" id="descripcion">@{{actual.descripcion}}</p>

<div class="mt-4 d-flex align-items-center">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="cursado" v-model = "checked" v-on:change = "cursado">
        <label class="custom-control-label" for="cursado">Marcar esta unidad como culminada</label>
    </div>

    <p v-if = "actual.file" class="d-flex align-items-center text-secondary ml-auto mb-0">
        <i class="fas fa-save mr-2" style="font-size: 24px;"></i>
        <a :href="'/recursos/' + actual.slug + '/download'" class="text-secondary">Archivos base del tema</a>
    </p>

</div>

<div class="card my-3 bg-whithe shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <a href="" class="text-secondary font-weight-bold text-decoration-none" v-if = "actual.anterior" v-on:click.prevent="cambiarActual(actual.anterior)">
                    <i class="fas fa-angle-left mr-2"></i>
                    Tema anterior
                </a>
            </div>
                
            <div>
                <a href="" class="text-secondary font-weight-bold text-decoration-none" v-if = "actual.next" v-on:click.prevent="cambiarActual(actual.next)">
                    Siguiente tema
                    <i class="fas fa-angle-right ml-2"></i>
                </a>
            </div>
            
        </div>
    </div>
</div>


