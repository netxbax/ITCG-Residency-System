<span class="mr-3 text-danger ">Campos requeridos *</span>
<div class="row">
    <div class="form-group  col-md-6 col-12 {{ $errors->has('nombre')? 'has-error':'' }}">
        {!! Form::label('nombre','Nombre *') !!}
        {!!
            Form::text('nombre',
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Nombre',
            ])
         !!}

        @if($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-md-6 col-12 {{ $errors->has('instructor')? 'has-error':'' }}">
        {!! Form::label('instructor','Instructor *') !!}
        {!!
            Form::text('instructor',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Instructor',
            ])
         !!}

        @if($errors->has('instructor'))
            <span class="help-block">
                <strong>{{ $errors->first('instructor') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion')? 'has-error':'' }}">
    {!! Form::label('descripcion','Descripcion *') !!}
    {!!
        Form::textarea('descripcion',
        null,
        [
            'class' => 'form-control',
            'placeholder' => 'Descripcion',
            'maxlength' => 5000,
            'autocomplete' => 'off'
        ])
     !!}

    @if($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
    @endif
</div>
<div class="row">
    <div class="form-group col-md-6 col-12 col-xl-4 {{ $errors->has('lugar')? 'has-error':'' }}">
        {!! Form::label('lugar','Lugar *') !!}
        {!!
            Form::text('lugar',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Lugar',
            ])
         !!}

        @if($errors->has('lugar'))
            <span class="help-block">
            <strong>{{ $errors->first('lugar') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-6 col-12 col-xl-4 {{ $errors->has('precio')? 'has-error':'' }}">
        {!! Form::label('precio','Precio *') !!}
        {!!
            Form::text('precio',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Precio',
            ])
         !!}

        @if($errors->has('precio'))
            <span class="help-block">
            <strong>{{ $errors->first('precio') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-6 col-12 col-xl-4 {{$errors->has('fecha_inicio') ? 'has-error': '' }}">
        {!! Form::label('fecha_inicio','Fecha de Inicio *') !!}
        {!!
            Form::date('fecha_inicio',
                ($curso->fecha_inicio? $curso->fecha_inicio : date('Y-m-d')),
                [
                    'class' => 'form-control',

                ]
            )
         !!}

        @if($errors->has('fecha_inicio'))
            <span class="help-block">
            <strong>{{ $errors->first('fecha_inicio') }}</strong>
        </span>
        @endif

    </div>
    <div class="form-group col-md-6 col-12  col-xl-4 {{$errors->has('fecha_final') ? 'has-error': '' }}">
        {!! Form::label('fecha_final','Fecha de Terminacion *') !!}
        {!!
            Form::date('fecha_final',
                ($curso->fecha_final? $curso->fecha_final : date('Y-m-d')),
                [
                    'class' => 'form-control'
                ]
            )
         !!}

        @if($errors->has('fecha_final'))
            <span class="help-block">
            <strong>{{ $errors->first('fecha_final') }}</strong>
        </span>
        @endif

    </div>

    <div class="form-group col-md-6 col-12 col-xl-4 {{$errors->has('estado') ? 'has-error': '' }}">
        {!! Form::label('estado','Estado del curso *') !!}

        {!!
            Form::select('estado',
                ['Activo' => 'Activo', 'Terminado' => 'Terminado',],
                null,
                [
                    'class' => 'form-control'
                ]
            )
         !!}

        @if($errors->has('estado'))
            <span class="help-block">
            <strong>{{ $errors->first('estado') }}</strong>
        </span>
        @endif

    </div>
    <div class="form-group col-md-6 col-12 col-xl-4 {{$errors->has('imagen') ? 'has-error': '' }}">
        {!! Form::label('imagen','Imagen') !!}

        {!!
            Form::file('imagen',
                [
                    'class' => 'form-control-file',
                    'id' => 'image',
                    'onchange' => 'return fileValidation()'
                ]
            )
         !!}

        @if($errors->has('image'))
            <span class="help-block">
            <strong>{{ $errors->first('imagen') }}</strong>
        </span>
        @endif

    </div>

</div>


<div class="form-group">
    <button type="submit" id="btnEnviar" class="btn btn-danger">
        Guardar
    </button>
</div>

<script type="application/javascript">
    function fileValidation(){
        var fileInput = document.getElementById('image');
        var filePath = fileInput.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Por favor, Solo subir imagenes con extension .jpeg/.jpg/.png/.gif');
            fileInput.value = '';
            return false;
        }else{
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
</script>
