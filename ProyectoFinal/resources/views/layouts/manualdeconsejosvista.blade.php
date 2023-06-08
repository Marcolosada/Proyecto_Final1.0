<style>
    .ribbon {
        position: absolute;
        right: -5px;
        top: -5px;
        z-index: 1;
        overflow: hidden;
        width: 75px;
        height: 75px;
        text-align: right;
    }

    .ribbon span {
        font-size: 10px;
        font-weight: bold;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        line-height: 20px;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        width: 100px;
        display: block;
        background: #65a30d;
        background: linear-gradient(#65a30d 0%, #65a30d 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 19px;
        right: -21px;
    }

    .ribbon span::before {
        content: "";
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #65a30d;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #65a30d;
    }

    .ribbon span::after {
        content: "";
        position: absolute;
        right: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid transparent;
        border-right: 3px solid #65a30d;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #65a30d;
    }
</style>
<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fc2947]">
        <h5 class="text-7xl text-[#f8fafc] titulocards">
            {{ __('EL MANUAL') }}
        </h5>
    </div>
    @livewireStyles
    <div class="py-12">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
                    <div class="col s2 ">
                        <select id="metobusca" name="metobusca" class="textindfo block  rounded-lg" onChange="paquete(this.value);">
                            <option value="consejo">Consejo</option>
                            <option value="etiqueta">Etiqueta</option>
                        </select>
                    </div>
                    <div id="consejo">
                        <form action="{{ route('searchconsejosvista') }}" method="get">
                            <div class="col s7 px-4">
                                <input type="" name="texto" id="texto" class="w-full textindfo pr-3 py-2 rounded-lg border-2  bg-[#dbdcdd] border-[#4d7c0f] outline-none focus:border-[#bef264] text-[#09090b]" placeholder="  Encuentra los hascks especificos">
                            </div>
                            <div class="col s1">
                                <input type="submit" class="bg-[#4d7c0f]  text-white rounded-lg px-2 py-2 font-semibold" value="Buscar">
                            </div>
                            <div class="col s2">
                                <a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a>
                            </div>
                        </form>
                    </div>
                    <div id="etiqueta" style="display: none;">
                        <form action="{{ route('searchconsejosvista2') }}" method="get">
                            <div class="col s7 px-4">
                                <input type="" name="texto" id="texto" class="w-full textindfo pr-3 py-2 rounded-lg border-2  bg-[#dbdcdd] border-[#1e40af] outline-none focus:border-[#bef264] text-[#09090b]" placeholder="  Escribe el nombre de la etiqueta">
                            </div>
                            <div class="col s1">
                                <input type="submit" class="bg-[#1e40af]  text-white rounded-lg px-2 py-2 font-semibold" value="Buscar">
                            </div>
                            <div class="col s2">
                                <a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a>
                            </div>
                        </form>
                    </div>

                    @if ($consejos->count())
                    <div class="col s12 animate__animated animate__zoomIn">

                        <table class="">
                            <tr>
                                <td></td>
                            </tr>
                            @foreach ( $consejos as $sem)
                            <tr>
                                <td>
                                    <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#e6e7ca] opacity-95 border-2 border-[#8d8e59] imagen2 ">

                                        <div class="ribbon"><span>#{{$sem['idconsejo']}}</span></div>
                                        <div class="px-6 py-4">
                                            <a href="{{ route('mostrarsolounconsejo', $sem['idconsejo']) }}">
                                                <div class="text-3xl mb-2 text-[#b91c1c] letra">{{$sem['titulo']}}</div>
                                                <p class="text-[#b91c1c] text-sm textindfo">
                                                    {{$sem['nombre']}} | {{$sem['namee']}} | {{$sem['nombree']}}
                                                </p>
                                                <p class="text-[#18181b] text-sm textindfo" maxlength="4">
                                                    {{$sem['descripcion']}}
                                                </p>

                                            </a>
                                        </div>
                                        <div class=" flex">
                                            @foreach ( $etiquetas as $row)
                                            @if ($sem->idconsejo == $row->id_consejo )
                                            <label class="py-2 px-4 ">
                                                <button class="bg-[#f9a940]  rounded-lg px-2 py-2 textindfo text-[#f8fafc]">{{$row['genero']}}</button>
                                            </label>
                                            @else
                                            <p></p>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$consejos->links()}}
                    @else
                    <div class="col s12 animate__animated animate__zoomIn">
                        <br>
                        <div class="bg-[#4b5563] text-center shadow-lg py-2 px-2">
                            <h1 class="text-[#f8fafc] textindfo text-2xl">
                                No se encontro resultado, verifica de nuevo.
                            </h1>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <script>
        function paquete(id) {
            if (id == "consejo") {
                $("#consejo").show();
                $("#etiqueta").hide();
            } else {
                $("#etiqueta").show();
                $("#consejo").hide();
            }
        }
    </script>
</x-app-layout>