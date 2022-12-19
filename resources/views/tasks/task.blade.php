@extends('base')
@section('main')
<div class="row">
  <h1>My Tasks</h1>
  <div>
    <a href="/">{{--<i class="fa-solid fa-bars"></i>--}} home</a> <a href="{{ route('tasks.create')}}" >Create Task</a>
  </div>
  <div class="result"></div>
  <table id="table-1">
    <thead>
        <tr>
          <!-- <td width="4%"></td> -->
          <td>Id</td>
          <td>Name</td>
          <td>Priority</td>
          <td>Timestamp</td>
          <td>Modify</td>
          <td>[x]</td>
        </tr>
    </thead>
    <tbody>
        @foreach($task as $task)
        @php($count= $loop->index + 1)
        <tr id="{{$count}}">
            <!-- <td> <span>∙</span><span>∙</span><span>∙</span></td> -->
            <td  class="id">{{$task->id}}</td>
            <td>{{$task->name}} </td>
            <td class="priority">{{$task->priority}}</td>
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