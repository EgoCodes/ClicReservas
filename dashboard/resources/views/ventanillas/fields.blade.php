<!-- Vennumero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('VenNumero', 'Vennumero:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('VenNumero', 0) !!}
        {!! Form::checkbox('VenNumero', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ventanillas.index') }}" class="btn btn-default">Cancel</a>
</div>
