@extends('base') 
@section('main')
<div class="row">
	<h1>Edit</h1>
	<div>
		<a href="/tasks">Back</a>
	</div>
	<form method="post" action="{{ route('tasks.update', $task->id) }}">
			@method('PATCH') 
			@csrf
			<div>
					<label for="name">Name</label>
					<input type="text" name="name" value="{{ $task->name }}" />
			</div>
			<div>
					<label for="priority">Priority</label>
					<input type="number" name="priority" value="{{ $task->priority }}" />
			</div>
			<button type="submit">Update</button>
	</form>
</div>
@endsection