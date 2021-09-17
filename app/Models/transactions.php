<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{

    public $guarded=[];
    protected $table="transactions";
    
    protected $casts=['date'=>'date'];

    public function getStatusColorAttribute(){
        return [
            'processing'=>'indigo',
            'success' => 'green',
            'failed' => 'red'
        ][$this->status] ?? 'cool-gray';
    }


   public function getDateForHumansAttribute(){
       return $this->date->format('M , d Y');
   }

   public static function search($search){
       return empty($search) ? static::query() :
       static::where('title','LIKE','%'.$search.'%')
       ->OrWhere('status','LIKE','%'.$search.'%')
       ->OrWhere('date','LIKE','%'.$search.'%')
       ->OrWhere('amount','LIKE','%'.$search.'%'); 
   }


 
   
}
