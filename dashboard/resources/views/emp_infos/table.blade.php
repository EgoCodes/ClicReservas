<div class="table-responsive">
    <table class="table" id="empInfos-table">
        <thead>
            <tr>
                <th>Empusuario</th>
        <th>Empclave</th>
        <th>Correo</th>
        <th>Empimg</th>
        <th>Empdescripbreve</th>
        <th>Empdescriplarga</th>
        <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empInfos as $empInfo)
            <tr>
                <td>{{ $empInfo->empUsuario }}</td>
            <td>{{ $empInfo->empClave }}</td>
            <td>{{ $empInfo->correo }}</td>
            <td>{{ $empInfo->empImg }}</td>
            <td>{{ $empInfo->empDescripBreve }}</td>
            <td>{{ $empInfo->empDescripLarga }}</td>
            <td>{{ $empInfo->estado }}</td>
                <td>
                     {!! Form::open(['route' => ['empInfos.destroy', $empInfo->idEmpInfo], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empInfos.show', [$empInfo->idEmpInfo]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('empInfos.edit', [$empInfo->idEmpInfo]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div> 
                     {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
