<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
