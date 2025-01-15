<?php

namespace App\Http\Controllers;

use App\Models\FinanceData;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
      $financeData = FinanceData::firstOrCreate();

        return view('finance.dashboard', ['financeData' => $financeData]);
    }

    public function addOutgoing(Request $request)
    {
         $request->validate([
            'student_id' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        $financeData = FinanceData::firstOrCreate();

        $financeData->addOutgoing($request->student_id, $request->amount);
        $financeData->save();

         return redirect()->route('finance.dashboard')->with('success', 'Amount added.');
    }
  
  
    public function removeOutgoing(Request $request)
    {
         $request->validate([
            'student_id' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);
      $financeData = FinanceData::firstOrCreate();
       $financeData->removeOutgoing($request->student_id, $request->amount);
        $financeData->save();

         return redirect()->route('finance.dashboard')->with('success', 'Amount removed.');
    }

     public function setTotalSum(Request $request)
    {
      $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

      $financeData = FinanceData::firstOrCreate();
        $financeData->setTotalSum($request->amount);
        $financeData->save();
         return redirect()->route('finance.dashboard')->with('success', 'Total sum updated.');
    }
  
    public function setStudentCount(Request $request)
    {
          $request->validate([
              'count' => 'required|numeric|min:0',
           ]);
         $financeData = FinanceData::firstOrCreate();
          $financeData->setStudentCount($request->count);
          $financeData->save();

          return redirect()->route('finance.dashboard')->with('success', 'Total student updated.');
    }
}
