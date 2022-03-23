<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Information;

class AddInfoConrtroller extends Controller
{
    public function form(){
        $date = date('Y-m-d');

        $settings = DB::table('settings')
        ->select('salary', 'hourlyPayment', 'percent', 'tips', 'taxi', 'rub', 'other')
        ->where('user_id', Auth::id())
        ->get();

        $info = DB::table('information')
        ->select('salary', 'countHours', 'hourlySalary', 'percent', 'kassa', 'tips', 'taxi', 'rub', 'other', 'dateInfo')
        ->where('user_id', Auth::id())
        ->where('dateInfo', $date)
        ->get()->values();
       
        return view('day', ['title' => 'Добавление данных', 'settings' => $settings, 'info' => $info, 'date' => $date]);
    }

    public function add(Request $request){
        
        $validated = $request->validate([
            'salary' => 'sometimes|integer',
            'countHours' => 'sometimes|integer',
            'hourlySalary' => 'sometimes|integer',
            'percent' => 'sometimes|integer',
            'kassa' => 'sometimes|integer',
            'tips' => 'sometimes|integer',
            'taxi' => 'sometimes|integer',
            'rub' => 'sometimes|integer',
            'other' => 'sometimes|integer',
            'dateInfo' => 'required|date',
        ]);
     
        Information::create([
            "user_id" => Auth::id(),
            "salary" => $request->input('salary') == null ? 0 : $request->input('salary'),
            "countHours" => $request->input('countHours') == null ? 0 : $request->input('countHours'),
            "hourlySalary" => $request->input('hourlySalary') == null ? 0 : $request->input('hourlySalary'),
            "percent" => $request->input('percent') == null ? 0 : $request->input('percent'),
            "kassa" => $request->input('kassa') == null ? 0 : $request->input('kassa'),
            "tips" => $request->input('tips') == null ? 0 : $request->input('tips'),
            "taxi" => $request->input('taxi') == null ? 0 : $request->input('taxi'),
            "rub" => $request->input('rub') == null ? 0 : $request->input('rub'),
            "other" => $request->input('other') == null ? 0 : $request->input('other'),
            "dateInfo" => $request->input('dateInfo'),
        ]);
        
        return redirect()->route('info');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'salary' => 'sometimes|integer',
            'countHours' => 'sometimes|integer',
            'hourlySalary' => 'sometimes|integer',
            'percent' => 'sometimes|integer',
            'kassa' => 'sometimes|integer',
            'tips' => 'sometimes|integer',
            'taxi' => 'sometimes|integer',
            'rub' => 'sometimes|integer',
            'other' => 'sometimes|integer',
            'dateInfo' => 'required|date',
        ]);

        Information::where('user_id', Auth::id())->where('dateInfo', $request->input('dateInfo'))->update([
            "user_id" => Auth::id(),
            "salary" => $request->input('salary') == null ? 0 : $request->input('salary'),
            "countHours" => $request->input('countHours') == null ? 0 : $request->input('countHours'),
            "hourlySalary" => $request->input('hourlySalary') == null ? 0 : $request->input('hourlySalary'),
            "percent" => $request->input('percent') == null ? 0 : $request->input('percent'),
            "kassa" => $request->input('kassa') == null ? 0 : $request->input('kassa'),
            "tips" => $request->input('tips') == null ? 0 : $request->input('tips'),
            "taxi" => $request->input('taxi') == null ? 0 : $request->input('taxi'),
            "rub" => $request->input('rub') == null ? 0 : $request->input('rub'),
            "other" => $request->input('other') == null ? 0 : $request->input('other'),
            "dateInfo" => $request->input('dateInfo'),
        ]);
        
        return redirect()->route('info');
    }

    public function delete($date = 0){
        DB::table('information')->where('user_id', Auth::id())->where('dateInfo', $date)->delete();
        return redirect()->route('info');
    }

    public function dateGetInfo(){
        $date = $_GET['date'];

        $info = DB::table('information')
        ->select('salary', 'countHours', 'hourlySalary', 'percent', 'kassa', 'tips', 'taxi', 'rub', 'other', 'dateInfo')
        ->where('user_id', Auth::id())
        ->where('dateInfo', $date)
        ->get()->values();

        echo json_encode($info);
    }
}
