<?php

namespace App\Http\Controllers;
use App\Models\Statistic;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
{
    $statistics = Statistic::orderBy('task_count', 'desc')->take(10)->get();
    return view('statistics.index', compact('statistics'));
}
}
