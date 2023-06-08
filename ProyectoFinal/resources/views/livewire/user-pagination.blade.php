<div class="py-12">
    <ul class="coleccion">
        @foreach ( $consejos as $sem)
        <li class="py-2">
            <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-[#cbd5e1] opacity-70 border-4 border-black">
                <div class="px-6 py-4">
                    <div class="text-6xl mb-2 text-[#b91c1c] letra"><a href="/manualdeconsejos">{{$sem['titulo']}}</a></div>
                    <p class="text-[#b91c1c] text-lg textindfo">
                        Lee los mejores consegos e supervivencia y hazte con el conocimiento imilitado!
                        conocimiento ilimitado!
                    </p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@livewire('user-pagination')