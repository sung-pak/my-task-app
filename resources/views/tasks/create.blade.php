@extends('base')
@section('main')
<div class="row">
  <h1>Create</h1>
  <div id="nav1">
    <a class="btn btn-primary" href="/tasks" role="button">Back</a>
  </div>
  <div class="row g-3 align-items-center">
    <form method="post" action="{{ route('tasks.store') }}" >
      @csrf
      <div class="col-md-6"> 
          <label for="group" class="form-label">Group</label>
          <input type="text" name="group" class="form-control"/>
      </div>
      <div class="col-md-6"> 
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control"/>
      </div>
      <div class="col-md-6">
          <label for="priority" class="form-label">Priority</label>
          <input type="number" name="priority" class="form-control"/>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
</div>
@endsection