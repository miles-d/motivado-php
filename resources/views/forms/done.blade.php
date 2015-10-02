{!! Form::open(['method' => 'PATCH', 'route' => ['tasks.destroy', $task->id], 'class' => 'done-form']) !!}
{!! Form::hidden('completed', '1') !!}
{!! Form::submit('Done!', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}
