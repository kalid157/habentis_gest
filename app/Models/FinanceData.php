<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinanceData extends Model
{
    use HasFactory;
    protected $table = 'finance_data';
    protected $fillable = [
        'total_sum',
        'outgoing_amounts',
        'total_students'
    ];
    
   protected $casts = [
       'outgoing_amounts' => 'array',
    ];
  
    public function addOutgoing($studentId, $amount): void
    {
      $outgoing = $this->outgoing_amounts ?? [];
        if(isset($outgoing[$studentId])){
          $outgoing[$studentId] += $amount;
        }
        else{
          $outgoing[$studentId] = $amount;
        }
      $this->outgoing_amounts = $outgoing;
    }

    public function removeOutgoing($studentId, $amount): void
    {
      $outgoing = $this->outgoing_amounts ?? [];
        if (isset($outgoing[$studentId])) {
            $outgoing[$studentId] -= $amount;
              if($outgoing[$studentId] <=0){
                unset($outgoing[$studentId]);
              }
               $this->outgoing_amounts = $outgoing;
        }
       
    }

    public function getRemainingSum(): float
    {
        $totalOutgoing = collect($this->outgoing_amounts ?? [])->sum();
        return $this->total_sum - $totalOutgoing;
    }
    
    public function setTotalSum($amount): void
    {
       $this->total_sum = $amount;
    }

    public function setStudentCount($count): void
    {
        $this->total_students = $count;
    }
}
