<!-- Connombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conNombre', 'Connombre:') !!}
    {!! Form::text('conNombre', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Conasunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conAsunto', 'Conasunto:') !!}
    {!! Form::text('conAsunto', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Conmail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conMail', 'Conmail:') !!}
    {!! Form::text('conMail', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.index') }}" class="btn btn-default">Cancel</a>
</div>
