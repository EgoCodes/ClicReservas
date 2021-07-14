<div class="table-responsive">
    <table class="table" id="empHorarios-table">
        <thead>
            <tr>
                <th>Erprecio</th>
        <th>Erestado</th>
        <th>Idhorar</th>
        <th>Idempvent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empHorarios as $empHorario)
            <tr>
                <td>{{ $empHorario->erPrecio }}</td>
            <td>{{ $empHorario->erEstado }}</td>
            <td>{{ $empHorario->idHoraR }}</td>
            <td>{{ $empHorario->idEmpVent }}</td>
                <td>
                    {!! Form::open(['route' => ['empHorarios.destroy', $empHorario->idEmpHorario], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empHorarios.show', [$empHorario->idEmpHorario]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('empHorarios.edit', [$empHorario->idEmpHorario]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
