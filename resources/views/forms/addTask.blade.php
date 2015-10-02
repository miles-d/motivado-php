{!! Form::open(['route' => ['tasks.store'], 'id' => 'addTaskForm']) !!}
<div class="form-group">
  {!! Form::label('description', 'I will...') !!}
  {!! Form::text('description', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('motivation', 'Because... ') !!}
  {!! Form::text('motivation', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('due_date', 'When it should be done:') !!}
  {!! Form::text('due_date', $today->format('Y-m-d'), ['class' => 'form-control', 'id' => 'date_picker']) !!}
</div>
<div class="form-group">
  <button type="submit" class="btn btn-success">Add task!</button>
</div>
{!! Form::close() !!}
