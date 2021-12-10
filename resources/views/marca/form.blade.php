<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre marca') }}
            {{ Form::text('name', $marca->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripción') }}
            {{ Form::text('descripcion', $marca->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : '')]) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-warning">Guardar</button>
    </div>
</div>
