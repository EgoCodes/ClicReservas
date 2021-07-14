<div class="table-responsive">
    <table class="table" id="contactos-table">
        <thead>
            <tr>
                <th>Connombre</th>
        <th>Conasunto</th>
        <th>Conmail</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contacto)
            <tr>
                <td>{{ $contacto->conNombre }}</td>
            <td>{{ $contacto->conAsunto }}</td>
            <td>{{ $contacto->conMail }}</td>
                <td>
                    {!! Form::open(['route' => ['contactos.destroy', $contacto->idContact], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contactos.show', [$contacto->idContact]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('contactos.edit', [$contacto->idContact]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
