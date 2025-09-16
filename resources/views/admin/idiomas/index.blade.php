@extends('adminlte::page')
{{-- EN LA PAGINA 2 NO QUIERE FUNCIONAR EL MODAL, REVISAR POR QUE ------------------------------------------------------- --}}
@section('title', 'Listado - Idiomas')

@section('content_header')
    <h1 class="mt-2">Historial de Idiomas</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="idiomas" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">USUARIO</th>
                        <th class="text-center">INSTITUCIÓN</th>
                        <th class="text-center">IDIOMA</th>
                        <th class="text-center">LECTURA</th>
                        <th class="text-center">ESCRITURA</th>
                        <th class="text-center">HABLAR</th>
                        <th class="text-center">COMPRENSIÓN</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idiomas as $idioma)
                        <tr>
                            <td class="text-center">{{ $idioma->user_id }}</td>
                            <td class="text-center">{{ $idioma->user->name }}</td>
                            <td class="text-center">{{ $idioma->institucion }}</td>
                            <td class="text-center">{{ $idioma->idioma }}</td>
                            <td class="text-center">{{ $idioma->lee_nivel }}</td>
                            <td class="text-center">{{ $idioma->escribe_nivel }}</td>
                            <td class="text-center">{{ $idioma->habla_nivel }}</td>
                            <td class="text-center">{{ $idioma->comprende_nivel }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $idioma->user_id }}"
                                    data-name="{{ $idioma->user->name }}" data-institucion="{{ $idioma->institucion }}"
                                    data-idioma="{{ $idioma->idioma }}" data-lee_nivel="{{ $idioma->lee_nivel }}"
                                    data-escribe_nivel="{{ $idioma->escribe_nivel }}"
                                    data-habla_nivel="{{ $idioma->habla_nivel }}"
                                    data-comprende_nivel="{{ $idioma->comprende_nivel }}">
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
                                <h4 class="modal-title fs-5" id="exampleModalLabel">Detalles del Usuario - Idiomas
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-id" class="col-form-label">ID Usuario:</label>
                                    <p class="form-control" id="recipient-id"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <p class="form-control" id="recipient-name"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-institucion" class="col-form-label">Institución:</label>
                                    <p class="form-control" id="recipient-institucion"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-idioma" class="col-form-label">Idioma:</label>
                                    <p class="form-control" id="recipient-idioma"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-lee_nivel" class="col-form-label">Nivel de Lectura:</label>
                                    <p class="form-control" id="recipient-lee_nivel"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-escribe_nivel" class="col-form-label">Nivel de Escritura:</label>
                                    <p class="form-control" id="recipient-escribe_nivel"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-habla_nivel" class="col-form-label">Nivel de Habla:</label>
                                    <p class="form-control" id="recipient-habla_nivel"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-comprende_nivel" class="col-form-label">Nivel de
                                        Comprensión:</label>
                                    <p class="form-control" id="recipient-comprende_nivel"></p>
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
            // Inicializa DataTable
            var table = $('#idiomas').DataTable({
                responsive: true,
                autoWidth: true,
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

            // Delegación de eventos para abrir el modal
            $('#idiomas tbody').on('click', 'button[data-bs-toggle="modal"]', function() {
                var target = $(this).data('bs-target');
                var userId = $(this).data('id');
                var userName = $(this).data('name');
                var institucion = $(this).data('institucion');
                var idioma = $(this).data('idioma');
                var lee_nivel = $(this).data('lee_nivel');
                var escribe_nivel = $(this).data('escribe_nivel');
                var habla_nivel = $(this).data('habla_nivel');
                var comprende_nivel = $(this).data('comprende_nivel');

                // Actualiza los campos en el modal con los datos del idioma
                $(target).find('#recipient-id').text(userId);
                $(target).find('#recipient-name').text(userName);
                $(target).find('#recipient-institucion').text(institucion);
                $(target).find('#recipient-idioma').text(idioma);
                $(target).find('#recipient-lee_nivel').text(lee_nivel);
                $(target).find('#recipient-escribe_nivel').text(escribe_nivel);
                $(target).find('#recipient-habla_nivel').text(habla_nivel);
                $(target).find('#recipient-comprende_nivel').text(comprende_nivel);

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
