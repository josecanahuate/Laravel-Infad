@extends('adminlte::page')

@section('title', 'Idiomas')

@section('content_header')
    <h1>Idiomas</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.idiomas.inidiomasdex')}}">Volver</a> --}}
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{ route('users.idiomas.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="institucion">Institución</label>
                    <input type="text" name="institucion" class="form-control" id="institucion"
                        value="{{ old('institucion') }}" placeholder="Inserte la Institución">
                    @error('institucion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="idioma">Idioma</label>
                    <select class="form-control" id="idioma" name="idioma" value="{{ old('idioma') }}">
                        <option value="Español">Español</option>
                        <option value="Inglés">Inglés</option>
                        <option value="Chino">Chino</option>
                        <option value="Francés">Francés</option>
                        <option value="Alemán">Alemán</option>
                        <option value="Italiano">Italiano</option>
                        <option value="Portugués">Portugués</option>
                        <option value="Japonés">Japonés</option>
                        <option value="Coreano">Coreano</option>
                        <option value="Ruso">Ruso</option>
                        <option value="Árabe">Árabe</option>
                    </select>
                    @error('idioma')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="lee_nivel">Nivel de Lectura</label>
                    <select class="form-control select2 select2-hidden-accessible" id="lee_nivel" name="lee_nivel"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                        value="{{ old('lee_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('lee_nivel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="escribe_nivel">Nivel de Escritura</label>
                    <select class="form-control select2 select2-hidden-accessible" id="escribe_nivel" name="escribe_nivel"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                        value="{{ old('escribe_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('escribe_nivel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="habla_nivel">Nivel Hablado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="habla_nivel" name="habla_nivel"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                        value="{{ old('habla_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('habla_nivel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="comprende_nivel">Nivel de Comprension</label>
                    <select class="form-control select2 select2-hidden-accessible" id="comprende_nivel"
                        name="comprende_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                        value="{{ old('comprende_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('comprende_nivel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- 1 - colocar tamaño fijo | mostrar multiples imagenes | 2- si es pdf se coloca el icono de pdf 
            | 3- habilitar boton para eliminar img --}}
            {{--         <div class="row">
                <div class="col-md-4 mb-3">
                    @foreach ($archivos as $archivo)
                    <div class="card" style="width: 100%;">
                        @isset($archivo->ruta)
                        <img class="card-img-top img-fluid rounded" id="picture" src="{{ Storage::url($archivo->ruta) }}" alt="Archivo subido" style="object-fit: fill;">
                        @else
                        <img class="card-img-top img-fluid rounded" id="picture" src="https://cdn.pixabay.com/photo/2023/11/23/20/40/ocean-8408693_1280.jpg" style="object-fit: fill;">    
                        @endisset
                    </div>
                        <div class="card-body text-center">
                            <a href="#" id="deleteButton" class="btn btn-danger">Eliminar</a>
                        </div>
                </div>
                @endforeach
            </div> --}}


            <div class="row">
                @foreach ($archivos as $archivo)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%;">
                            @isset($archivo->ruta)
                                <img class="card-img-top img-fluid rounded" id="picture"
                                    src="{{ Storage::url($archivo->ruta) }}" alt="Archivo subido" style="object-fit: fill;">
                            @else
                                {{-- Imagen por defecto, si el usuario no inserta una imagen --}}
                                <img class="card-img-top img-fluid rounded" id="picture"
                                    src="https://cdn.pixabay.com/photo/2023/11/23/20/40/ocean-8408693_1280.jpg"
                                    style="object-fit: fill;">
                            @endisset
                        </div>
                        <div class="card-body text-center">
                            {{-- <a href="{{ route('idiomas.archivos.destroy', $archivo->id) }}" id="deleteButton" class="btn btn-sm btn-danger">Eliminar</a> --}}
                            <a href="#" id="deleteButton" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row justify-content-center text-center mt-5">
                <div class="col-12">
                    <input type="submit" value="Guardar" class="btn btn-success">
                </div>
            </div>

            {{-- SUBIDA DE FILES TEMPORAL --}}
            <div class="row">
                <div class="upload-box">
                    <div class="upload-btn-box">
                        <label class="upload-btn">
                            <p>Subir imágenes</p>
                            <input type="file" name="archivos[]" id="file" multiple data-max_length="20"
                                class="upload-inputfile">
                        </label>
                    </div>
                    <div class="upload-img-wrap"></div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5>Colocar para que las imagenes se coloquen en 2 columnasm colocar tamaño fijo <br>
                                combinar con la subida de imagenes anterior para que funcione igual</h5>
                            <h3 class="card-title">Subir imágenes<small><em> jQuery File Upload</em> like look</small></h3>
                        </div>
                        <div class="card-body">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <span class="btn btn-success col fileinput-button dz-clickable">
                                            <i class="fas fa-plus"></i>
                                            <span>Elegir Archivos</span>
                                        </span>
                                        <button type="submit" class="btn btn-primary col start">
                                            <i class="fas fa-upload"></i>
                                            <span>Subir</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                        <div id="total-progress" class="progress progress-striped active"
                                            role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                                            style="opacity: 0;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">

                            </div>
                        </div>
                        <div class="card-footer">
                            Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and
                            information about the plugin.
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
@stop

@section('css')

    <style>
        html * {
            box-sizing: border-box;
        }

        p {
            margin: 0;
        }

        .upload-box {
            padding: 40px;
        }

        .upload-inputfile {
            width: .1px;
            height: .1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload-btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all .3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload-btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all .3s ease;
        }

        .upload-btn-box {
            margin-bottom: 10px;
        }

        .upload-img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload-img-box {
            width: 200px;
            height: 200px;
            padding: 0 10px;
        }

        .upload-img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload-img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
            border-radius: 10%;
        }
    </style>
@stop

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> {{-- requerida --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Espera 3 segundos y luego oculta el mensaje de éxito
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3000); // 3 segundos

        //ANIMACION - CAMBIO DE IMAGEN  
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload-inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload-box').find('.upload-img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length >= maxLength) {
                            return false;
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len >= maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload-img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" +
                                        $(".upload-img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload-img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload-img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>


    <script>
        // Configuración de Dropzone
        Dropzone.autoDiscover = false;

        var previewTemplate = `
<div class="row dz-preview dz-file-preview">
    <div class="col-md-2 mt-3 mb-2">
        <div class="dz-image">
            <img data-dz-thumbnail width="100px" height="100px"/>
        </div>
    </div>
    <div class="col-md-4">
        <p class="dz-filename mt-3"><span data-dz-name></span></p>
        <p class="dz-size" data-dz-size></p>
    </div>
    <div class="col-md-6 mt-3">
        <button data-dz-remove class="btn btn-danger delete">
            <i class="fas fa-trash"></i>
            <span>Delete</span>
        </button>
    </div>
</div>
`;

        var myDropzone = new Dropzone("#previews", {
            url: "#", // Esta URL será la de tu backend cuando lo configures
            autoProcessQueue: false, // Evita que las imágenes se suban automáticamente
            previewsContainer: "#previews", // ID del contenedor de previsualización
            clickable: ".fileinput-button", // Elemento que activa el selector de archivos
            previewTemplate: previewTemplate, // Usamos la plantilla personalizada
            maxFilesize: 5, // Tamaño máximo del archivo en MB
            acceptedFiles: "image/png,image/jpeg,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" // Archivos aceptados
        });

        // Evento que se dispara cuando se añade un archivo
        myDropzone.on("addedfile", function(file) {
            // Si el archivo es un PDF
            if (file.type === "application/pdf") {
                file.previewElement.querySelector("img").src = "/img/pdf_logo.png"; // Ruta del logo de PDF
            }
            // Si el archivo es un documento de Word (DOCX o DOC)
            else if (file.type === "application/msword" || file.type ===
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                file.previewElement.querySelector("img").src = "/img/word_logo.png"; // Ruta del logo de Word
            }
        });
    </script>

@stop
