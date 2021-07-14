<!-- Clinombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliNombre', 'Clinombre:') !!}
    {!! Form::text('cliNombre', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Clicc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliCc', 'Clicc:') !!}
    {!! Form::number('cliCc', null, ['class' => 'form-control']) !!}
</div>

<!-- Clidireccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliDireccion', 'Clidireccion:') !!}
    {!! Form::text('cliDireccion', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>

<!-- Clitelefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliTelefono', 'Clitelefono:') !!}
    {!! Form::number('cliTelefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Climail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliMail', 'Climail:') !!}
    {!! Form::text('cliMail', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>

<!-- Idperfilr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPerfilR', 'Idperfilr:') !!}
    {!! Form::number('idPerfilR', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbarre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBarRe', 'Idbarre:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('idBarRe', 0) !!}
        {!! Form::checkbox('idBarRe', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
</div>
