<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\ColumnChart;
use App\Charts\Monthly;
use App\Charts\Yearly;
use App\Models\AccountBalances;
use App\Models\ChartOfAccount;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\VoucherDetail;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function dashboard(Request $request)
    {
        return view("admin.dasboard");
    }
}

