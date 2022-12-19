@extends('base')
@section('main')
<div class="row">
  <h1>My Tasks</h1>
  <div id="nav1">
    <a class="btn btn-primary" href="/" role="button">Home</a> |  <a class="btn btn-info" href="{{ route('tasks.create')}}" role="button">Create Task</a>
    |
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
        Groups
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/tasks">All</a></li>
        @php
        $groupArr = array();
        foreach ($task as $key => $value) {
          $t1 = strtolower( $value->group );
          $groupArr[]= $t1;
        }
        $groupArr = array_unique($groupArr);
        sort($groupArr);


        @endphp
        {{-- $task->unique('group')->sortBy('group', SORT_NATURAL|SORT_FLAG_CASE)  --}}
        @foreach($groupArr as $group)
          <li><a class="dropdown-item" href="{{ route('tasks.show', $group)}}">{{$group}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="result"></div>
  <table id="table-1">
    <thead>
        <tr>
          <!-- <td width="4%"></td> -->
          <td>Id</td>
          <td>Group</td>
          <td>Name</td>
          <td>Priority</td>
          <td>Timestamp</td>
          <td>Modify</td>
          <td>[x]</td>
        </tr>
    </thead>
    <tbody>
      {{-- filter group: {{ $filterId ?? '' }} --}}

        @foreach($task as $task)

          @php
          $count= $loop->index + 1;

          $class='';
          if(isset($filterId)){
            if( strtolower($filterId)==strtolower($task->group) ){}
            else{
              $class='d-none';
            }
          }
          @endphp

          <tr id="{{$count}}" class="{{$class}}">
              <!-- <td> <span>∙</span><span>∙</span><span>∙</span></td> -->
              <td  class="id">{{$task->id}}</td>
              <td>{{$task->group}}</td>
              <td>{{$task->name}}</td>
              <td class="priority">{{$task->priority}}</td>
              <td>{{$task->updated_at}}</td>
              <td>
                  <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Edit</a>
              </td>
              <td>
                  <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-secondary">Delete</button>
                  </form>
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection