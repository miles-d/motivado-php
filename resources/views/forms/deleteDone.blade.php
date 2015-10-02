<div class="row">
{!! Form::open(['method' => 'POST', 'route' => ['tasks.destroyDone']]) !!}
{!! Form::submit('Clear done tasks', ['class' => 'btn btn-danger col-lg-2']) !!}
{!! Form::close() !!}
</div>
