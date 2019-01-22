
<div class="form-group {{ $errors->has('no_control')? 'has-error':'' }}">
    {!! Form::label('no_control','Numero de control') !!}
    {!!
        Form::text('no_control',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('no_control'))
        <span class="help-block">
            <strong>{{ $errors->first('no_control') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('nombre')? 'has-error':'' }}">
    {!! Form::label('nombre','Nombre') !!}
    {!!
        Form::text('nombre',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('carrera_id') ? 'has-error': '' }}">
    {!! Form::label('carrera_id','Carerra') !!}

    {!!
        Form::select('carrera_id',
            $carerras,
            null,
            [
                'required',
                'class' => 'form-control',

            ]
        )
     !!}

    @if($errors->has('carrera_id'))
        <span class="help-block">
            <strong>{{ $errors->first('carrera_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('estado_id') ? 'has-error': '' }}">
    {!! Form::label('estado_id','Estado') !!}

    {!!
        Form::select('estado_id',
            $state,
            null,
            [
                'placeholder' => 'Selecciona un estado',
                'required',
                'class' => 'form-control',
                'id' => 'stateEgresados'
            ]
        )
     !!}

    @if($errors->has('estado_id'))
        <span class="help-block">
            <strong>{{ $errors->first('estado_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('ciudad_id') ? 'has-error': '' }}">
    {!! Form::label('ciudad_id','Ciudad') !!}

    {!!
        Form::select('ciudad_id',
            ['placeholder' => 'Selecciona un estado'],
            null,
            [

                'required',
                'class' => 'form-control',
                'id' => 'townEgresados'
            ]
        )
     !!}

    @if($errors->has('ciudad_id'))
        <span class="help-block">
            <strong>{{ $errors->first('ciudad_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('sexo') ? 'has-error': '' }}">
    {!! Form::label('sexo','Sexo') !!}

    {!!
        Form::select('sexo',
            ['Hombre' => 'Hombre', 'Mujer' => 'Mujer', 'No Binario' => 'No Binario'],
            null,
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('sexo'))
        <span class="help-block">
            <strong>{{ $errors->first('sexo') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('estado_civil') ? 'has-error': '' }}">
    {!! Form::label('estado_civil','Estado Civil') !!}

    {!!
        Form::select('estado_civil',
            ['NoEspecificado' => 'No Especificado', 'Casado(a)' => 'Casado(a)', 'Soltero(a)' => 'Soltero(a)'],
            null,
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('estado_civil'))
        <span class="help-block">
            <strong>{{ $errors->first('estado_civil') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('nacimiento') ? 'has-error': '' }}">
    {!! Form::label('nacimiento','Fecha de nacimineto') !!}
    {!!
        Form::date('nacimiento',
            ($egresado->fecha? $egresado->fecha : date('Y-m-d')),
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('nacimiento'))
        <span class="help-block">
            <strong>{{ $errors->first('nacimiento') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('curp')? 'has-error':'' }}">
    {!! Form::label('curp','CURP') !!}
    {!!
        Form::text('curp',
        null,
        [
            'class' => 'form-control',
            'pattern'=> '([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)',
        ])
     !!}

    @if($errors->has('curp'))
        <span class="help-block">
            <strong>{{ $errors->first('curp') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('telefono')? 'has-error':'' }}">
    {!! Form::label('telefono','Telefono') !!}
    {!!
        Form::text('telefono',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('telefono'))
        <span class="help-block">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('celular')? 'has-error':'' }}">
    {!! Form::label('celular','Celular') !!}
    {!!
        Form::text('celular',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('celular'))
        <span class="help-block">
            <strong>{{ $errors->first('celular') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
    {!! Form::label('email','Email') !!}
    {!!
        Form::text('email',
        null,
        [
            'class' => 'form-control',
            'type' => 'email'
        ])
     !!}

    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('fecha_egreso') ? 'has-error': '' }}">
    {!! Form::label('fecha_egreso','Fecha de egreso') !!}
    {!!
        Form::date('fecha_egreso',
            ($egresado->fecha? $egresado->fecha : date('Y-m-d')),
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('fecha_egreso'))
        <span class="help-block">
            <strong>{{ $errors->first('fecha_egreso') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('promedio')? 'has-error':'' }}">
    {!! Form::label('promedio','Promedio') !!}
    {!!
        Form::text('promedio',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('promedio'))
        <span class="help-block">
            <strong>{{ $errors->first('promedio') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('imagen') ? 'has-error': '' }}">
    {!! Form::label('imagen','Imagen') !!}

    {!!
        Form::file('imagen',
            [
                'class' => 'form-control',
            ]
        )
     !!}

    @if($errors->has('image'))
        <span class="help-block">
            <strong>{{ $errors->first('imagen') }}</strong>
        </span>
    @endif

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</div>
