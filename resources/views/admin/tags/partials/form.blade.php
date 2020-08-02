<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid' : '')]) !!}
    
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('background', 'Background') !!}
    {!! Form::text('background', null, ['class' => 'form-control'.($errors->has('background')?' is-invalid' : '')]) !!}
    
    @error('background')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>