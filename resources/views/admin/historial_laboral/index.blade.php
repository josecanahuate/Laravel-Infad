@extends('adminlte::page')

@section('title', 'Listado - Experiencia Laboral')

@section('content_header')
    <h1 class="mt-2">Historial Laboral</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="empleos" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">USUARIO</th>
                        <th class="text-center">EMPRESA</th>
                        <th class="text-center">CARGO</th>
                        <th class="text-center">SECTOR</th>
                        <th class="text-center">ESTADO</th>
                        <th class="text-center">ESTATUS</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiencias as $labor)
                        <tr>
                            <td class="text-center">{{ $labor->user_id }}</td>
                            <td class="text-center">{{ $labor->user->name }}</td>
                            <td class="text-center">{{ $labor->empresa }}</td>
                            <td class="text-center">{{ $labor->cargo }}</td>
                            <td class="text-center">{{ $labor->sector_empresa }}</td>
                            <td class="text-center">{{ $labor->estatus_empleo }}</td>
                            <td class="text-center"><span class="badge bg-warning">Pendiente</span></a></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $labor->user_id }}"
                                    data-name="{{ $labor->user->name }}" data-cargo="{{ $labor->cargo }}"
                                    data-empresa="{{ $labor->empresa }}" data-sector="{{ $labor->sector_empresa }}"
                                    data-estatus="{{ $labor->estatus_empleo }}" data-pais="{{ $labor->pais }}"
                                    data-fechainicio="{{ $labor->fecha_inicio }}" data-fechafin="{{ $labor->fecha_fin }}">
                                    Ver
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-5" id="exampleModalLabel">Detalles del Usuario - Historial Laboral
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-id" class="col-form-label">ID Usuario:</label>
                                            <p class="form-control" id="recipient-id"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                                            <p class="form-control" id="recipient-name"></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add additional fields for cargo, empresa, etc. -->
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-cargo" class="col-form-label">Cargo:</label>
                                            <p class="form-control" id="recipient-cargo"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-empresa" class="col-form-label">Empresa:</label>
                                            <p class="form-control" id="recipient-empresa"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-sector" class="col-form-label">Sector:</label>
                                            <p class="form-control" id="recipient-sector"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-estatus" class="col-form-label">Estado Empleo:</label>
                                            <p class="form-control" id="recipient-estatus"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-pais" class="col-form-label">País:</label>
                                            <p class="form-control" id="recipient-pais"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-fechainicio" class="col-form-label">Fecha
                                                Inicio:</label>
                                            <p class="form-control" id="recipient-fechainicio"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="recipient-fechafin" class="col-form-label">Fecha Fin:</label>
                                            <p class="form-control" id="recipient-fechafin"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">

    <style>
        .form-control {
            background-color: #e9ecef;
        }
    </style>
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    {{-- responsive --}}
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('#empleos').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm"> 
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="-1">Todos</option>
                        </select>` + " registros por página",
                    "zeroRecords": "Nada Encontrado - Disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Abrir modal y actualizar contenido con los datos del usuario
            $('button[data-bs-toggle="modal"]').click(function() {
                var target = $(this).data('bs-target');
                var userId = $(this).data('id');
                var userName = $(this).data('name');
                var userCargo = $(this).data('cargo');
                var userEmpresa = $(this).data('empresa');
                var userSector = $(this).data('sector');
                var userEstatus = $(this).data('estatus');
                var userPais = $(this).data('pais');
                var userFechaInicio = $(this).data('fechainicio');
                var userFechaFin = $(this).data('fechafin');

                // Actualiza los campos en el modal con los datos del usuario
                $(target).find('#recipient-id').text(userId);
                $(target).find('#recipient-name').text(userName);
                $(target).find('#recipient-cargo').text(userCargo);
                $(target).find('#recipient-empresa').text(userEmpresa);
                $(target).find('#recipient-sector').text(userSector);
                $(target).find('#recipient-estatus').text(userEstatus);
                $(target).find('#recipient-pais').text(userPais);
                $(target).find('#recipient-fechainicio').text(userFechaInicio);
                $(target).find('#recipient-fechafin').text(userFechaFin);

                $(target).modal('show');
            });

            // Cerrar modal al hacer clic en el botón de cerrar o en el botón secundario
            $('.modal .btn-close, .modal .btn-secondary').click(function() {
                $(this).closest('.modal').modal('hide');
            });

            // Cerrar modal al hacer clic fuera del modal
            $(window).click(function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(event.target).modal('hide');
                }
            });
        });
    </script>

@stop
