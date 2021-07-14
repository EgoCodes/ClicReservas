<div class="table-responsive">
    <table class="table" id="ventanillas-table">
        <thead>
            <tr>
                <th>Vennumero</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ventanillas as $ventanilla)
            <tr>
                <td>{{ $ventanilla->VenNumero }}</td>
                <td>
                    {!! Form::open(['route' => ['ventanillas.destroy', $ventanilla->idVentanillas], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ventanillas.show', [$ventanilla->idVentanillas]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('ventanillas.edit', [$ventanilla->idVentanillas]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
