<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WelcomeController extends Controller
{
    function index(){


        $yesterday = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/yesterday?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=obs%2Ccurrent%2Chistfcst')['days'];

        $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=stats%2Ccurrent')['days'];

        $forecast = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=fcst%2Cstats%2Ccurrent')['days'];

        return view('index' , ['yesterdayData'=> $yesterday, 'forecastData'=>$forecast, 'todayData'=>$today]);

    }

    function w3(){
        $yesterday = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/yesterday?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=obs%2Ccurrent%2Chistfcst')['days'];

        $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=stats%2Ccurrent')['days'];

        $forecast = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=fcst%2Cstats%2Ccurrent')['days'];

        return view('w3' , ['yesterdayData'=> $yesterday, 'forecastData'=>$forecast, 'todayData'=>$today]);
    }
}
