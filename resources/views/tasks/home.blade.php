@extends('master')

@section('content')

	<div id="show_add_form_button">
		<button class="btn btn-success"><span class="glyphicon
	glyphicon-plus"></span> Add new task</button>
	</div>
	<br>
	@include('forms.add_task_form')

	<br>

	<table class="table table-hover table-bordered">
	<thead>
      <tr>
		<th>Task</th>
		<th>Motivation</th>
		<th>When</th>
		<th>Actions</th>
      </tr>
	</thead>
	<tbody>

	@foreach ($tasks as $task)
      @if ($task->isPending() === true)
        <tr class="active text-info">
      @else
        <tr class="">
      @endif
            <td><b>{{ $task->description }}</b></td>
            <td><b>{{ $task->motivation }}</b></td>
            <td><b>{{ $task->due_date }}</b></td>
            <td>
              {!! done_form(['tasks.destroy', $task->id]) !!}
              <a class="btn btn-sm btn-primary" href="{{ route('tasks.edit', $task->id) }}">Edit...</a>
            </td>
        </tr>
	@endforeach

	</tbody>
	</table>
	<br><br>

	@if(count($doneTasks) > 0)
		<div id="show_done_tasks">
			<button class="btn btn-default"><span class="glyphicon
		glyphicon-plus"></span>Show Completed Tasks</button>
		</div>
		<br>

		<div id="tasks_done">
			<table class="table table-hover table-bordered">
				@foreach ($doneTasks as $task)
					<tr>
						<td>{{ $task->description }}</td>
						<td>{{ $task->motivation }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	@endif
@stop
