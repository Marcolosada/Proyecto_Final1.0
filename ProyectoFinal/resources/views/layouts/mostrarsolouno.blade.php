<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fc2947]">
        <h5 class="text-7xl text-[#f8fafc] letra">
            {{ __('EL MANUAL') }}
        </h5>
    </div>
    <div class="py-12">
        <div class="py-6">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-[#bffff0] overflow-hidden shadow-sm sm:rounded-lg px-6 py-6">
                    <p class="text-sm mb-2 text-[#b91c1c] letra">Consejo#{{$consejos->id}}</p>
                    <div class="text-3xl mb-2 text-[#b91c1c] letra">{{$consejos->titulo}}</a></div>
                    <p class="text-sm mb-2 text-[#b91c1c] letra">{{$consejos->nombre}} | {{$consejos->name}}</p>
                    <p class="text-sm mb-2 text-[#b91c1c] letra">{{$consejos->nombree}}</p>
                    <div class="max-w-5xl mx-auto sm:px-6 lg:px-6">
                        <div class="bg-[#e1fff8] overflow-hidden shadow-sm sm:rounded-lg p-4">
                            <p class="text-sm mb-2 text-[#121212] letra">{{$consejos->descripcion}}</p>
                        </div>
                    </div>

                    <div class="p-6 text-gray-900 ">
                        <div class="flex -mx-3 ">
                            <div class="w-full px-3 mb-5">
                                <p class="flex">
                                    <a href="#"><img src="https://lh3.googleusercontent.com/pw/AJFCJaXDNnTw0Bv4Bnk4qaymSRLJ1uoAysJdyfRRu50P8APlQNdkJdYl6__GqAfSX0qiLH-B0wdEl-CO4yqBiRjXcJeVO3S_ZSs6RIvBBM7X6vA0UOHw0w07fjudIR7Up6dnoDa2DkqZb_k312Anyw7toptJ=w64-h64-s-no?authuser=0" alt="">5</a>
                                    <a href="#"><img src="https://lh3.googleusercontent.com/pw/AJFCJaUMofbRT31My-mkSvQGVo8ctqF653KiiJTFKf6xbsHjOFrarDanvrt09j94oUnLGr3CzjCWkMpOEJUfBPT0s_D7M3DeGfLY37YcrVIjXZX99Mpv42cmA6rjhhYisdb7CiqvTavBmq5zyjuR_7Y0FBz5=w64-h64-s-no?authuser=0" alt="">10</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <a href="/dashboard" class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00]  text-white rounded-lg px-2 py-2 font-semibold">Volver al menu</a>
                            </div>
                            <div class="w-full px-3 mb-5 ">
                                <a href="/manualdeconsejos" class="text-center block w-full max-w-xs mx-auto bg-[#39244e] text-white rounded-lg px-2 py-2 font-semibold">Volver al manual</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>