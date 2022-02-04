{!! Form::open(['route' => ['personals.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('personals.show', $id) }}" class='btn btn-info btn-sm'>
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('personals.edit', $id) }}" class='btn btn-warning btn-sm'>
        <i class="fas fa-pencil-alt"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
