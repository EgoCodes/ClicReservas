<div class="table-responsive">
    <table class="table" id="hors-table">
        <thead>
            <tr>
                <th>Hora</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($hors as $hor)
            <tr>
                <td>{{ $hor->hora }}</td>
                <td>
                    {!! Form::open(['route' => ['hors.destroy', $hor->idHora], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('hors.show', [$hor->idHora]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('hors.edit', [$hor->idHora]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
