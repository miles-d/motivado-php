{!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PATCH']) !!}

    <div class="form-group">
        {!! Form::label('description', 'I will...') !!}
		{!! Form::text('description', $task->description, ['class' => 'form-control', 'autofocus']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('motivation', 'Because...') !!}
		{!! Form::text('motivation', $task->motivation, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('due_date', 'When it should be done:') !!}
		{!! Form::text('due_date', $task->due_date, ['class' => 'form-control', 'id' => 'date_picker']) !!}
    </div>

    {!! Form::submit('Save Changes!', ['class' => 'btn btn-success']) !!}


{!! Form::close() !!}
<br>
{!! delete_form(['tasks.destroy', $task->id]) !!}
