<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fc2947]">
        <h5 class="text-7xl text-[#f8fafc] letra">
            {{ __('EL MANUAL') }}
        </h5>
    </div>

    <div class="py-12">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
                    <form action="{{ route('searchconsejosvista') }}" method="get">
                        <div class="col s8">
                            <input type="" name="texto" id="texto" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2  bg-[#dbdcdd] border-[#525252] outline-none focus:border-[#bef264] text-[#09090b]" placeholder="Encuentra los hacks especificos">
                        </div>
                        <div class="col s1">
                            <input type="submit" class="bg-[#4d7c0f]  text-white rounded-lg px-2 py-2 font-semibold" value="Buscar">
                        </div>
                        <div class="col s3">
                            <a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a>
                        </div>
                    </form>
                    <div class="col s12">
                        <table class="">
                            <tr>
                                <td></td>
                            </tr>
                            @foreach ( $consejos as $sem)
                            <tr>
                                <td>
                                    <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#e6e7ca] opacity-95 border-2 border-[#8d8e59]">
                                        <div class="px-6 py-4">
                                            <div class="text-3xl mb-2 text-[#b91c1c] letra"><a href="{{ route('mostrarsolounconsejo', $sem['idconsejo']) }}">{{$sem['titulo']}}</a></div>
                                            <p class="text-[#b91c1c] text-sm textindfo">
                                                {{$sem['nombre']}} | {{$sem['name']}} | {{$sem['nombree']}}
                                            </p>
                                            <p class="text-[#18181b] text-sm textindfo" maxlength="4">
                                                {{$sem['descripcion']}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$consejos->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>