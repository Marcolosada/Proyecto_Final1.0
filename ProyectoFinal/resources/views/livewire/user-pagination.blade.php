<div class="row px-6">
    @if(Session::has('message'))
    <div class="alert bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg></div>
            <div>
                <p>{!! Session::get('message') !!}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="py-2">
        <div class="col s8 ">
            <div class="border-4 border-black py-2 px-2 rounded-[30px] shadow-lg">
                <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#eaebec] opacity-90 border-4 border-black">
                    <div class="px-6 py-4">
                        <div class="text-6xl mb-2 text-[#FC2947] letra"><a href="/manualdeconsejos">EL<br> MANUAL</a></div>
                        <p class="text-[#FC2947] text-lg textindfo">
                            Lee los megores consegos e supervivencia y hazte con el conocimiento imilitado!
                            conocimiento ilimitado!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s4 ">
            <div class="border-4 border-black py-2 px-2 rounded-[30px] shadow-lg">
                <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#ededd9] opacity-90 border-4 border-black">
                    <div class="px-6 py-4">
                        <div class="text-6xl mb-2 text-[#FC2947] letra"><a href="/escribeunconsejo">Escribir consejo</a></div>
                        <p class="text-[#FC2947] text-lg textindfo">
                            Enriquece nuestro humilde manual
                            con tu sabiduria.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="py-12">
        <div class="col s7">
            <div class="border-4 border-black py-2 px-2 rounded-[30px] shadow-lg">
                <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#eadfed] opacity-90 border-4 border-black">
                    <div class="px-6 py-4">
                        <div class="letra text-6xl mb-2 text-[#FC2947]"><a href="/laprofedex">LA <br>PROFEDEX</a></div>
                        <p class="text-[#FC2947] text-lg textindfo">
                            Conoce las especies de profes a traves de as opiniones de la comunidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s5">
            <div class="border-4 border-black py-2 px-2 rounded-[30px] shadow-lg">
                <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#bad2d3] opacity-90 border-4 border-black">
                    <div class="px-6 py-4">
                        <div class="letra text-6xl mb-2 text-[#FC2947]"><a href="/misconsejos">MIS <br>CONSEJOS</a></div>
                        <p class="text-[#FC2947] text-lg textindfo">
                            Te olvidaste de algo? Revisa o modifica
                            tus propios consejos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>