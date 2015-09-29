<?php

function delete_form($routeParams, $label = "Delete Task")
{
	$form = Form::open(['method' => 'DELETE', 'route' => $routeParams, 'class' => 'done-form']);
	$form .= Form::submit($label, ['class' => 'btn btn-danger']);
	$form .= Form::close();

	return $form;
}

function done_form($routeParams, $label = "Done!")
{
	$form = Form::open(['method' => 'PATCH', 'route' => $routeParams, 'class' => 'done-form']);
	$form .= Form::hidden('completed', '1');
	$form .= Form::submit($label, ['class' => 'btn btn-sm btn-success']);
	$form .= Form::close();

	return $form;
}

