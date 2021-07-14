<!-- Empusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empUsuario', 'Empusuario:') !!}
    {!! Form::text('empUsuario', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Empclave Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empClave', 'Empclave:') !!}
    {!! Form::text('empClave', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Empimg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empImg', 'Empimg:') !!}
    {!! Form::text('empImg', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Empdescripbreve Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('empDescripBreve', 'Empdescripbreve:') !!}
    {!! Form::textarea('empDescripBreve', null, ['class' => 'form-control']) !!}
</div>

<!-- Empdescriplarga Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('empDescripLarga', 'Empdescriplarga:') !!}
    {!! Form::textarea('empDescripLarga', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estado', 0) !!}
        {!! Form::checkbox('estado', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('empInfos.index') }}" class="btn btn-default">Cancel</a>
</div>
