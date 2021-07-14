<div class="table-responsive">
    <table class="table" id="barris-table">
        <thead>
            <tr>
                <th>Bnombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($barris as $barri)
            <tr>
                <td>{{ $barri->bNombre }}</td>
                <td>
                    {!! Form::open(['route' => ['barris.destroy', $barri->idBarrio], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('barris.show', [$barri->idBarrio]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('barris.edit', [$barri->idBarrio]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
