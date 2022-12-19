@extends('base') 
@section('main')
<div class="row">
	<h1>Edit</h1>
	<div id="nav1">
    <a class="btn btn-primary" href="/tasks" role="button">Back</a>
	</div>
  <div class="row g-3 align-items-center">
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
      @method('PATCH') 
      @csrf
      <div class="col-md-6"> 
        <label for="name" class="form-label">Group</label>
        <input type="text" name="name" value="{{ $task->group }}" class="form-control"/>
      </div>
      <div class="col-md-6"> 
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" value="{{ $task->name }}" class="form-control"/>
      </div>
      <div class="col-md-6"> 
        <label for="priority" class="form-label">Priority</label>
        <input type="number" name="priority" value="{{ $task->priority }}" class="form-control"/>
      </div>
      <div class="col-md-6"> 
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection