<!-- Perusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perUsuario', 'Perusuario:') !!}
    {!! Form::text('perUsuario', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Perclave Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perClave', 'Perclave:') !!}
    {!! Form::text('perClave', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Perimg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perImg', 'Perimg:') !!}
    {!! Form::text('perImg', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('perfilClis.index') }}" class="btn btn-default">Cancel</a>
</div>
