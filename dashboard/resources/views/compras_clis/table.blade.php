<div class="table-responsive">
    <table class="table" id="comprasClis-table">
        <thead>
            <tr>
                <th>Estado</th>
        <th>Idclienter</th>
        <th>Idemphorarior</th>
        <th>Fechacompra</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comprasClis as $comprasCli)
            <tr>
                <td>{{ $comprasCli->estado }}</td>
            <td>{{ $comprasCli->idClienteR }}</td>
            <td>{{ $comprasCli->idEmpHorarioR }}</td>
            <td>{{ $comprasCli->fechaCompra }}</td>
                <td>
                    {!! Form::open(['route' => ['comprasClis.destroy', $comprasCli->idCompCli], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comprasClis.show', [$comprasCli->idCompCli]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('comprasClis.edit', [$comprasCli->idCompCli]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
