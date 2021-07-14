<!-- Idempresar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idEmpresaR', 'Idempresar:') !!}
    {!! Form::number('idEmpresaR', null, ['class' => 'form-control']) !!}
</div>

<!-- Idventr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idVentR', 'Idventr:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('idVentR', 0) !!}
        {!! Form::checkbox('idVentR', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cantVents.index') }}" class="btn btn-default">Cancel</a>
</div>
