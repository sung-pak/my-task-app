@extends('base')
@section('main')
<div class="row">
  <h1>Create</h1>
  <div>
    <a href="/tasks">Back</a>
  </div>
  <form method="post" action="{{ route('tasks.store') }}">
      @csrf
      <div>    
          <label for="name">Name</label>
          <input type="text" name="name"/>
      </div>
      <div>
          <label for="priority">Priority</label>
          <input type="number" name="priority"/>
      </div>
      <button type="submit">Add</button>
  </form>
</div>
@endsection