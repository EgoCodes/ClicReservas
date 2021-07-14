<div class="table-responsive">
    <table class="table" id="perfilClis-table">
        <thead>
            <tr>
                <th>Perusuario</th>
        <th>Perclave</th>
        <th>Perimg</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perfilClis as $perfilCli)
            <tr>
                <td>{{ $perfilCli->perUsuario }}</td>
            <td>{{ $perfilCli->perClave }}</td>
            <td>{{ $perfilCli->perImg }}</td>
                <td>
                    {!! Form::open(['route' => ['perfilClis.destroy', $perfilCli->idPerfilCli], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('perfilClis.show', [$perfilCli->idPerfilCli]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('perfilClis.edit', [$perfilCli->idPerfilCli]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
