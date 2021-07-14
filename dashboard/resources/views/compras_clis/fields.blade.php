<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estado', 0) !!}
        {!! Form::checkbox('estado', '1', null) !!}
    </label>
</div>


<!-- Idclienter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idClienteR', 'Idclienter:') !!}
    {!! Form::number('idClienteR', null, ['class' => 'form-control']) !!}
</div>

<!-- Idemphorarior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idEmpHorarioR', 'Idemphorarior:') !!}
    {!! Form::number('idEmpHorarioR', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechacompra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaCompra', 'Fechacompra:') !!}
    {!! Form::text('fechaCompra', null, ['class' => 'form-control','id'=>'fechaCompra']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fechaCompra').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('comprasClis.index') }}" class="btn btn-default">Cancel</a>
</div>
