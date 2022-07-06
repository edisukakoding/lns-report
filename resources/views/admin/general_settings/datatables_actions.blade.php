{!! Form::open(['route' => ['generalSettings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('generalSettings.show', $id) }}" class='btn btn-info btn-sm'>
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('generalSettings.edit', $id) }}" class='btn btn-warning btn-sm'>
        <i class="fas fa-pencil-alt"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
