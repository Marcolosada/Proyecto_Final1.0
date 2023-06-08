<x-app-layout>
    <div class=" py-4 max-w-12xl mx-auto py-2 px-4 sm:px-6 lg:px-8  bg-[#fef08a]">
        <h5 class="text-7xl text-[#f8fafc] titulocards">
            {{ __('CONSEJOS') }}
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
            <div class="alert bg-[#ef4444] border-t-4 border-[#facc15] rounded-b text-[#f8fafc] px-4 py-3 shadow-md" role="alert">
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
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-[#ee6e73] overflow-hidden shadow-lg sm:rounded-lg opacity-95 ">
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($consejos->count())
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
                                    <th>Estatus</th>
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
                                    @if ($row->activo == 1)
                                    <td class="text-[#a3e635]">Aceptado</td>
                                    <td>
                                        <a class=" text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href=" {{ route('mostrarsolounconsejo', $row['idconsejo']) }}" title="Ver consejo"><i class="material-icons">visibility</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#fde047] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('actulizarconsejo', $row['idconsejo']) }}" title="Editar consejo"><i class="material-icons">create</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#dc2626] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold" href="{{ route('eliminarconsejouser', $row['idconsejo']) }}" title="Eliminar consejo" onclick="eliminarcomsejo(event)"><i class="material-icons">do_not_disturb</i></a>
                                    </td>
                                    @elseif($row->activo == 2)
                                    <td class="text-[#9333ea]">Pendiente</td>
                                    <td>
                                        <a class=" text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href=" {{ route('mostrarsolounconsejo', $row['idconsejo']) }}" title="Ver consejo"><i class="material-icons">visibility</i></a>
                                    </td>
                                    <td>
                                        <a class="opacity-100  text-center block w-full max-w-xs mx-auto bg-[#f1f5f9] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="#" title="Editar consejo"><i class="material-icons">create</i></a>
                                    </td>
                                    <td>
                                        <a class="opacity-100  text-center block w-full max-w-xs mx-auto bg-[#f1f5f9] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold" href="#"><i class="material-icons">do_not_disturb</i></a>
                                    </td>
                                    @elseif($row->activo == 3)
                                    <td class="text-[#030712]">Eliminado</td>
                                    <td>
                                        <a class=" text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href=" {{ route('mostrarsolounconsejo', $row['idconsejo']) }}" title="Ver consejo"><i class="material-icons">visibility</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#fde047] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('actulizarconsejo', $row['idconsejo']) }}" title="Editar consejo"><i class="material-icons">create</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#a4d75a] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('activarconsejouser', $row['idconsejo']) }}" title="Activar consejo" onclick="activarsolicitud(event)"><i class="material-icons">check</i></a>
                                    </td>
                                    @else
                                    <td class="text-[#fde047]">Cancelada</td>
                                    <td>
                                        <a class=" text-center block w-full max-w-xs mx-auto bg-[#ff4d00] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href=" {{ route('mostrarsolounconsejo', $row['idconsejo']) }}" title="Ver consejo"><i class="material-icons">visibility</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center block w-full max-w-xs mx-auto bg-[#fde047] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold " href="{{ route('actulizarconsejo', $row['idconsejo']) }}" title="Editar consejo"><i class="material-icons">create</i></a>
                                    </td>
                                    <td>
                                        <a class="text-center opacity-100  block w-full max-w-xs mx-auto bg-[#f1f5f9] hover:bg-[#d4d4d4] focus:bg-[#d4d4d4] text-white rounded-lg px-2 font-semibold" href="#"><i class="material-icons">do_not_disturb</i></a>
                                    </td>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="col s12">
                            <br>
                            <div class="text-center">
                                <h1 class="text-[#f8fafc] textindfo text-2xl">
                                    No se encontraron registros.
                                </h1>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                {{ $consejos->links() }}
                <br>
            </div>
        </div>
    </div>

    <script>
        function activarsolicitud(ev) {
            ev.preventDefault();
            var aceptar = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: '¿Estás seguro de activar su consejo?',
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

        function eliminarcomsejo(ev) {
            ev.preventDefault();
            var aceptar = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: '¿Estás seguro de eliminar su consejo?',
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