<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    const STATUS = [
    
        1 => [ 'label' => 'Backlog', 'class' => 'label-danger'],
        2 => [ 'label' => 'Doing', 'class' => 'label-info'],
        3 => [ 'label' => 'Done', 'class' => '' ],
    ];

    public function getStatusLabelAttribute()

    {
        $status = $this->attributes['status'];
         
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        
        return self::STATUS[$status]['label'];
        
    }        
    
    public function getStatusClassAttribute()
    
    {
        $status = $this->attributes['status'];
    
        if (!isset(self::STATUS[$status])) {
        return '';
        }

    return self::STATUS[$status]['class'];
    }

/*    public function getFormattedDueDateAttribute()

    {
          return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y-m-d'); 
          //return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('y/m/d'); 
    }          
*/
}
