<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Information;
use App\Models\Settings;

class GetInfoController extends Controller
{
    public function viewInfo(){
        $month = date('m');
        $year = date('Y');

        $settings = DB::table('settings')
        ->select('salary', 'hourlyPayment', 'percent', 'tips', 'taxi', 'rub', 'other')
        ->where('user_id', Auth::id())
        ->get()->values();

        $info = DB::table('information')
            ->select('salary', 'countHours', 'hourlySalary', 'percent', 'kassa', 'tips', 'taxi', 'rub', 'other', 'dateInfo')
            ->where('user_id', Auth::id())
            ->whereMonth('dateInfo', $month)
            ->whereYear('dateInfo', $year)
            ->get();

        $avgDay = DB::table('information')
            ->select(DB::raw("ROUND(AVG(`salary`), 0) AS 'salary', ROUND(AVG(`countHours`), 0) AS 'countHours', ROUND(AVG(`hourlySalary`), 0) AS 'hourlySalary', ROUND(AVG(`percent`), 0) AS 'percent', ROUND(AVG(`kassa`), 0) AS 'kassa', ROUND(AVG(`tips`), 0) AS 'tips', ROUND(AVG(`taxi`), 2) AS 'taxi', ROUND(AVG(`rub`), 0) AS 'rub', ROUND(AVG(`other`), 0) AS 'other'"))
            ->where('user_id', Auth::id())
            ->whereMonth('dateInfo', $month)
            ->whereYear('dateInfo', $year)
            ->get();

        $resultMonth = DB::table('information')
            ->select(DB::raw("SUM(`salary`) AS `salary`, SUM(`countHours`) AS `countHours`, SUM(`hourlySalary`) AS `hourlySalary`, SUM(`percent`) AS `percent`, SUM(`kassa`) AS `kassa`, SUM(`tips`) AS `tips`, SUM(`taxi`) AS `taxi`, SUM(`rub`) AS `rub`, SUM(`other`) AS `other`"))
            ->where('user_id', Auth::id())
            ->whereMonth('dateInfo', $month)
            ->whereYear('dateInfo', $year)
            ->get();

        return view('info', ['title' => 'Моя статистика за этот месяц', 'info' => $info, 'avgday' => $avgDay, 'resutlMonth' => $resultMonth, 'settings' => $settings]);
    }
}
