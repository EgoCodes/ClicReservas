<div class="table-responsive">
    <table class="table" id="empres-table">
        <thead>
            <tr>
                <th>Empnombre</th>
        <th>Empnit</th>
        <th>Empdireccion</th>
        <th>Emptelefono</th>
        <th>Idbarrior</th>
        <th>Idinfor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empres as $empres)
            <tr>
                <td>{{ $empres->empNombre }}</td>
            <td>{{ $empres->empNit }}</td>
            <td>{{ $empres->empDireccion }}</td>
            <td>{{ $empres->empTelefono }}</td>
            <td>{{ $empres->idBarrioR }}</td>
            <td>{{ $empres->idInfoR }}</td>
                <td>
                    {!! Form::open(['route' => ['empres.destroy', $empres->idEmpresa], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empres.show', [$empres->idEmpresa]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('empres.edit', [$empres->idEmpresa]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
