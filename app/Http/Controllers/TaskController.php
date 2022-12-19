<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Task;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$task = New Task;
        $task = $task->getall();

        return view('tasks.task', compact('task'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group'=>'required',
            'name'=>'required'
        ]); 

        $task = new task([
            'group' => $request->get('group'),
            'name' => $request->get('name'),
            'priority' => $request->get('priority')
        ]);

        $task->save();

        return redirect('/tasks')->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
      $task = New Task;
      //if($id==''||$id==null){
      $task = $task->getall();
      // }else{
      //   $task = $task->all()->where('group', $id);
      // }

      $idArr = array('filterId'=>$id);

      return view('tasks.task', compact('task'), $idArr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$request->validate([
				'name' => 'required',
				'priority' => 'required'
			]); 
			$task = Task::find($id);
			// Getting values from the blade template form
			$task->name =  $request->get('name');
			$task->priority = $request->get('priority');

      $task->save();
 
      return redirect('/tasks')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
 
        return redirect('/tasks')->with('success', 'Task deleted.'); 
    }

    public function updateTask(Request $request){

      $obj =  $request->all();
      $orderArr = json_decode($obj['data']);

      foreach ($orderArr as $key => $value){
        $k2 = $key + 1;
        $task = New Task;
        $task = $task->updateRow($value, $k2);
      }
      
      return json_encode(array("success"=>1));
    }
}
