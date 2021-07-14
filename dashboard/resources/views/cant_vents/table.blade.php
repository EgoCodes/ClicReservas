<div class="table-responsive">
    <table class="table" id="cantVents-table">
        <thead>
            <tr>
                <th>Idempresar</th>
        <th>Idventr</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cantVents as $cantVent)
            <tr>
                <td>{{ $cantVent->idEmpresaR }}</td>
            <td>{{ $cantVent->idVentR }}</td>
                <td>
                    {!! Form::open(['route' => ['cantVents.destroy', $cantVent->idCantVent], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cantVents.show', [$cantVent->idCantVent]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('cantVents.edit', [$cantVent->idCantVent]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
