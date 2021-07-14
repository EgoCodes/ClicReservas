<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>Clinombre</th>
        <th>Clicc</th>
        <th>Clidireccion</th>
        <th>Clitelefono</th>
        <th>Climail</th>
        <th>Idperfilr</th>
        <th>Idbarre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->cliNombre }}</td>
            <td>{{ $client->cliCc }}</td>
            <td>{{ $client->cliDireccion }}</td>
            <td>{{ $client->cliTelefono }}</td>
            <td>{{ $client->cliMail }}</td>
            <td>{{ $client->idPerfilR }}</td>
            <td>{{ $client->idBarRe }}</td>
                <td>
                    {!! Form::open(['route' => ['clients.destroy', $client->idCliente], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$client->idCliente]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clients.edit', [$client->idCliente]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
