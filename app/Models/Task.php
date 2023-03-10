<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'name',
        'priority'    
    ];

    public function getall(){

        $taskObj = DB::table('tasks')
            ->orderBy('priority', 'asc')
            ->orderBy('name', 'asc')
            ->get();

         return $taskObj;
    }

    public function updateRow($id1, $id2){

      try{
        DB::table('tasks')
          ->where('id', $id1)
          ->update(array('priority'=> $id2));
      } catch(e){
        
      }
        
    }
}
