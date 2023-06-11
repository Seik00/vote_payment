<?php

namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotePayController extends Controller
{

    public function get_info(Request $request)
    {
        dump("test");
    }

}
