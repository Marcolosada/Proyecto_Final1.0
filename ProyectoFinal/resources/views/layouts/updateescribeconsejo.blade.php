<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#4dbdb0]">
        <h5 class="text-7xl text-[#f8fafc] titulocards">
            {{ __('ACTULIZAR CONSEJO') }}
        </h5>
    </div>
    @livewireStyles
    <div class="py-8">
        <div class="py-2">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 animate__animated animate__fadeIn">
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="red center text-white card">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                <form action="{{ route('update')}}" method="POST" class="nuevoconsejo py-2">
                    @csrf
                    <div class="bg-[#fffcbf] overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 ">
                        <input type="hidden" name="idconsejo" id="idconsejo" value="{{$consejos->idconsejo}}">
                        <div class="p-6 text-gray-900">
                            <!-- Contact Me -->
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-base text-[#b91c1c] textindfo px-1 ">Escribe un buen titulo para tu consejo:</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                        <input type="" name="titulo" id="titulo" class="w-full -ml-10 pl-10 pr-3 py-2 textindfo rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" value="{{$consejos->titulo}}" placeholder="Acordeon para examen de danice v:">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-base text-[#b91c1c] textindfo px-1">Semestre:</label>
                                    <select id="semestres" name="semestres" class="rounded-lg  block w-full rounded-lg textindfo border-2 border-gray-200 outline-none focus:border-indigo-500">
                                        <option selected>Seleccionar un semestre:</option>
                                        @foreach ( $semestre as $sem)
                                        <option value="{{$sem['id']}}" @if( $sem['id']==$consejos->id_semestre ) selected @endif >{{$sem['nombre']}}</option>
                                        @endforeach
                                    </select>

                                    <div class="xd">
                                        <label for="" class="text-base text-[#b91c1c] textindfo px-1">Materia:</label>
                                        <select id="materias" name="materias" class="rounded-lg  block w-full rounded-lg textindfo border-2 border-gray-200 outline-none focus:border-indigo-500">
                                            <option selected>Seleccionar materia:</option>
                                            @foreach ( $meta as $meta)
                                            <option value="{{$meta['id']}}" @if( $meta['id']==$consejos->id_materia ) selected @endif >{{$meta['namee']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="" class="text-base text-[#b91c1c] textindfo px-1">Profesor:</label>
                                        <select id="profesor" name="profesor" class="rounded-lg  block w-full rounded-lg border-2 textindfo border-gray-200 outline-none focus:border-indigo-500">
                                            <option selected>Seleccionar un profesor:</option>
                                            @foreach ( $profes as $prof)
                                            <option value="{{$prof['id']}}" @if( $prof['id']==$consejos->id_profesor ) selected @endif >{{$prof['nombree']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-base text-[#b91c1c] textindfo px-1">Escribe tu consejo:</label>
                                    <div class="flex py-2">
                                        <textarea name="descripcion" id="descripcion" class=" min-h-[170px] block w-full rounded-lg textindfo border-2 border-gray-200 outline-none focus:border-indigo-500">{{$consejos->descripcion}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="w-6/2 px-3 mb-5">
                                <label for="" class="text-base text-[#b91c1c] textindfo px-1">Etiqueta:</label>
                                <p class="flex">
                                    @foreach ( $etiquet as $etic)
                                    <label class="py-2 px-2">
                                        <input name="etiqueta[]" id="etiqueta[]" type="checkbox" class="filled-in" value="{{$etic['idetiqueta']}}" @if(isset($etikguar[$etic['idetiqueta']])) checked @endif />
                                        <span class="text-base text-[#78716c] px-1 textindfo">{{$etic['genero']}}</span>
                                    </label>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <a href="/misconsejos" class="text-center block textindfo  w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-3 py-3 font-semibold">Volver</a>
                                </div>
                                <div class="w-full px-3 mb-5 ">
                                    <button type="submit" class="block w-full max-w-xs textindfo mx-auto bg-[#d4d4d4] hover:bg-[#4d7c0f] focus:bg-[#4d7c0f] text-white rounded-lg px-3 py-3 font-semibold">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });

        $('.nuevoconsejo').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de actulizar su consejo?',
                imageUrl: 'https://lh3.googleusercontent.com/pw/AJFCJaUMBrcC_E9q-4cfn5vbNjeYm3X2utGKN4VMuZ-QVdkOpgUebFAY6BJguYSuS23pyCr6xwKzq66l6dk3mNLqIER5MF7r0WZYTr57D8n_EmG1W1WgZfhih_Dtb3dPgTB8u1f6HgKwAcAMqiFMr6jU1xst=w480-h360-s-no?authuser=0',
                text: "¡No podrás revertir esto!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si enviar',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });

        $(document).ready(function() {
            //$("#materias").hide();
            //$(".xd").hide();
            $("#semestres").change(function() {
                var valida = document.getElementById('semestres').value;
                cargamaterias(valida);
            });
        });

        function cargamaterias(valor) {
            $.ajax({
                url: "/utils/" + valor,
                method: 'GET',
                success: function(data) {
                    var obj = JSON.parse(data);
                    $("#materias").empty();
                    $.each(obj, function(i, value) {
                        $("#materias").append('<option value="' + value.id + '">' + value.namee + '</option>');
                    });
                    $("#materias").show();
                    $(".xd").show();
                }
            });
        }
    </script>
</x-app-layout>