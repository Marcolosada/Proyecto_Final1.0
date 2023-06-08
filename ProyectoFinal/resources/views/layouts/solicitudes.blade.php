<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#c2410c]">
        <h5 class="text-7xl text-[#f8fafc] titulocards">
            {{ __('SOLICITUDES') }}
        </h5>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            @if(Session::has('message2'))
            <div class="alert bg-[#facc15] border-t-4 border-[#dc2626] rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p>{!! Session::get('message2') !!}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-[#ee6e73] overflow-hidden shadow-lg sm:rounded-lg opacity-95 ">
                <div class="card-body">
                    @if ($consejos->count())
                    <div class="table-responsive">
                        <table class="table  table-lg text-white highlight centered">
                            <thead class=" text-black font-semibold">
                                <tr>
                                    <th>N0.</th>
                                    <th>Titulo</th>
                                    <th>Semestre</th>
                                    <th>Maestro</th>
                                    <th>Materia</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consejos as $row)
                                <tr>
                                    <td>{{$row->idconsejo}}</td>
                                    <td>{{$row->titulo}}</td>
                                    <td>{{$row->nombre}}</td>
                                    <td>{{$row->nombree}}</td>
                                    <td>{{$row->namee}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('mostrarsolounconsejo', $row['idconsejo']) }}" title="Ver consejo"><i class="material-icons">visibility</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#a4d75a] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('validasolicitud', $row['idconsejo']) }}" title="Aceptar solicitud" onclick="aceptarsolicitud(event)"><i class="material-icons">check</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#dc2626] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold" href="{{ route('cancelasolici', $row['idconsejo']) }}" title="Cancelar solicitud" onclick="canselarsolicitud(event)"><i class="material-icons">do_not_disturb</i></a>
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $consejos->links() }}
                <br>
                @else
                <div class="col s12">
                    <br>
                    <div class="text-center">
                        <h1 class="text-[#f8fafc] textindfo text-2xl">
                            Ninguna solicitud encontrada.
                        </h1>
                    </div>
                    <br>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function aceptarsolicitud(ev) {
            ev.preventDefault();
            var aceptar = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: '¿Estás seguro de aceptar la solicitud?',
                icon: 'question',
                text: "¡No podrás revertir esto!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = aceptar;
                }
            })
        }

        function canselarsolicitud(ev) {
            ev.preventDefault();
            var aceptar = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: '¿Estás seguro de cancelar la solicitud?',
                icon: 'warning',
                text: "¡No podrás revertir esto!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = aceptar;
                }
            })
        }
    </script>
</x-app-layout>