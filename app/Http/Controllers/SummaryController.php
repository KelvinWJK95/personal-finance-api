<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function daily(){
        $daily = Entry::whereNull('deleted_at')->select('date', 'amount')->orderBy('date', 'desc')->get()->groupBy(function($entry) {
            return Carbon::parse($entry->date)->format('Y-m'); // grouping by months
        })->map(function($monthly) {
            return $monthly->sortBy('date')->groupBy(function($entry) {
                return Carbon::parse($entry->date)->format('Y-m-d'); // grouping by months
            })->mapWithKeys(function($group, $key){
                return [$key => number_format($group->sum('amount'),2)];
            });
        });

        return response()->json($daily);
    }

}
