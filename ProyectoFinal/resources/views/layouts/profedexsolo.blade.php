<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fc2947]">
        <h5 class="text-7xl text-[#ffffff] letra">
            {{ __('LA PROFEDEX') }}
        </h5>
    </div>
    <div class="py-12">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
                <div class="row">
                    <div class="col s8 text-center">
                        <img src="" alt="">
                        <h1 class=" text-3xl mb-2 text-[#b91c1c] letra">{{$ens->nombree}}</h1>
                    </div>
                    <div class="col s2 text-center"><a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00]  text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a></div>
                    <div class="col s2 text-center"><a href="/laprofedex" class="text-center block w-full max-w-xs mx-auto bg-[#39244e]  text-white rounded-lg px-2 py-2 font-semibold">Volver a la dex</a></div>
                    <div>
                        <br><br> <br> <br>
                        <div class="col s9">
                            <div class="bg-[#dadbdc] px-6 py-6">
                                <p class="text-lg mb-2 text-[#121212] letra">{{$ens->detalle}}</p>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card bg-[#e6e7ca] border-2 border-[#8d8e59]">
                                <div class="card-image">
                                    <img src="{{$ens->img}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>