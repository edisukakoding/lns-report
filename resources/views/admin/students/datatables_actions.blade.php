{!! Form::open(['route' => ['students.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('students.show', $id) }}" class='btn btn-info btn-sm' title="detail">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('students.edit', $id) }}" class='btn btn-warning btn-sm' title="ubah">
        <i class="fas fa-pencil-alt"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")',
        'title' => 'hapus'
    ]) !!}
    <a href="{{ route('students.assessment', $id) }}" target="_blank" class='btn btn-success btn-sm' title="asesmen anak">
        <i class="fas fa-file-alt"></i>
    </a>
</div>
{!! Form::close() !!}
