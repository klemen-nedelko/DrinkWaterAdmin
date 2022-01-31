<?php

namespace App\Http\Controllers;
use App\Models\WaterAmount;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class WaterAmountController extends Controller
{
    function amountWrite(Request $request){
        $amountWrite = new WaterAmount;
        $amountWrite-> amount = $request->input('amount');
        $amountWrite-> users_id = $request->input('users_id');
        $amountWrite-> date_water_input = Carbon::now()->format('d-m-Y');
        $amountWrite->save();
        return "Succsessfully loaded into database";
    }
    function amountDisplay(Request $request){
        $users_id = $request->input('users_id');
        $water = User::find($users_id);
        $DisplayWater = WaterAmount::where('users_id',$users_id)->get();
        return $DisplayWater ;
    }
    function displayAllWater(Request $request){
        $allData = DB::table('water_amounts')->select('users.id','water_amounts.amount','users.name','users.lastName','water_amounts.date_water_input')
        ->join('users', 'users.id' , '=','water_amounts.users_id')
        ->orderBy('users.id', 'desc')
        ->get(); 
        return $allData;
    }
}
