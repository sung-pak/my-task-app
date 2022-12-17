@extends('base')
@section('main')
<div class="row">
  <h1>My Tasks</h1>
  <div>
    <a href="{{ route('tasks.create')}}" >Create Task</a>
  </div>
  <table>
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Priority</td>
          <td>Timestamp</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($task as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}} </td>
            <td>{{$task->priority}}</td>
            <td>{{$task->updated_at}}</td>
            <td>
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
            </td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection