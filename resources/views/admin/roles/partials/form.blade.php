<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control' ,'placeholder'=>'escriba un nombre']) !!}
@error('name')
    <span class="invalid-feedback">
        <strong>
            {{$message}}
        </strong>
    </span>
@enderror
</div>
<strong>Permisos</strong>

@foreach ($permissions as $permission)
<div>
    <label >
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
        {{$permission->name}}
    </label>
</div> 
@endforeach

