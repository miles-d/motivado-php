@extends('master')
@section('content')

<button id="toggleAddBtn" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new task</button>

@include('forms.addTask')

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
    <tr>
  @endif
      <td>{{ $task->description }}</td>
      <td>{{ $task->motivation }}</td>
      <td>{{ $task['dateString'] }}</td>
      <td>
        @include('forms.done')
        <a class="btn btn-sm btn-primary" href="{{ route('tasks.edit', $task->id) }}">Edit...</a>
      </td>
    </tr>
@endforeach

</tbody>
</table>

@if(count($doneTasks) > 0)
  <button id="show_done_tasks" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Show Completed Tasks</button>
  <div id="tasks_done">
  @include('forms.deleteDone')
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
