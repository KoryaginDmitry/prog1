<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;


class SettingsController extends Controller
{
    public function settings(){
        $settings = DB::table('users')
        ->select('firstName', 'lastName', 'salary', 'hourlyPayment', 'percent', 'tips', 'taxi', 'rub', 'other')
        ->join('settings', 'users.id', '=', 'user_id')
        ->where('users.id', Auth::id())
        ->get();
        
        return view('settings', ['title' => 'Настройки', 'settings' => $settings]);
    }

    public function update(Request $request){
        
        if($request->firstName != Auth::user()->firstName || $request->lastName != Auth::user()->lastName){
            $validatedName = $request->validate([
                'firstName' => 'required|min:3|max:255',
                'lastName' => 'required|min:3|max:255',
            ]);
            
            $user = ([
                "firstName" => $request->input('firstName'),
                "lastName" => $request->input('lastName'),
            ]);

            User::where("id", Auth::user()->id)->update($user);
        }

        $validated = $request->validate([
            'salary' => 'required|integer',
            'hourlyPayment' => 'required|integer',
            'percent' => 'required|integer',
            'tips' => 'sometimes|accepted',
            'taxi' => 'sometimes|accepted',
            'rub' => 'sometimes|accepted',
            'other' => 'sometimes|accepted',
        ]);
        
        $settings = ([
            "salary" => $request->input('salary'),
            "hourlyPayment" => $request->input('hourlyPayment'),
            "percent" => $request->input('percent'),
            "tips" => $request->input('tips') == null ? 0 : 1,
            "taxi" => $request->input('taxi') == null ? 0 : 1,
            "rub" => $request->input('rub') == null ? 0 : 1,
            "other" => $request->input('other') == null ? 0 : 1,
        ]);

        settings::where("id", Auth::user()->id)->update($settings);

        return redirect()->route('settings');
    }

    public function getPercent(){
        $result = DB::table('settings')
        ->select('percent')
        ->where('user_id', Auth::id())
        ->get()->values()->all();

        $percent = $result[0]->percent;

        echo json_encode($percent);
    }

    public function getHourlyPayment(){
        $result = DB::table('settings')
        ->select('hourlyPayment')
        ->where('user_id', Auth::id())
        ->get()->values()->all();

        $percent = $result[0]->hourlyPayment;

        echo json_encode($percent);
    }
}
