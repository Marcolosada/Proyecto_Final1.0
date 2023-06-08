<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fc2947]">
        <h5 class="text-7xl text-[#ffffff] titulocards">
            {{ __('LA PROFEDEX') }}
        </h5>
    </div>
    @livewireStyles
    <div class="py-12">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
                    <form action="{{ route('searchmaestros') }}" method="get">
                        <div class="col s8">
                            <input type="" name="texto" id="texto" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2  bg-[#dbdcdd] border-[#525252] outline-none focus:border-[#bef264] text-[#09090b]" placeholder="Encuentra a tu profe">
                        </div>
                        <div class="col s1">
                            <input type="submit" class="bg-[#4d7c0f]  text-white rounded-lg px-2 py-2 font-semibold" value="Buscar">
                        </div>
                        <div class="col s3">
                            <a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a>
                        </div>
                    </form>
                    @if ($ens->count())
                    <div class="col s12">
                        <br>
                        <div class="row">
                            @foreach ( $ens as $row)
                            <div class="col s4">
                                <div class="card bg-[#e6e7ca] border-2 border-[#8d8e59]">
                                    <div class="card-image">
                                        <a href="{{ route('profedexsolo', $row['iddescrip']) }}">
                                            <img src="{{$row['img']}}">
                                        </a>
                                    </div>
                                </div>
                                <p class="text-[#b91c1c] text-2xl textindfo text-center">
                                    {{$row['nombree']}}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="col s12">
                        <br><br>
                        <div class="text-center bg-[#e6e7ca]">
                            <h1 class="text-[#020617] textindfo text-2xl">
                                No se encontraron registros.
                            </h1>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>