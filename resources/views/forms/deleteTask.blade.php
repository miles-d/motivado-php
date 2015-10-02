<div class="row">
  {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id], 'class' => 'done-form']); !!}
  {!! Form::submit('Delete task', ['class' => 'btn btn-danger col-lg-2']); !!}
  {!! Form::close(); !!}
</div>
