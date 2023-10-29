<?php

namespace App\Http\Controllers\Modules\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
     * Display the main dashboard for the Master Data module.
     *
     * @return View
     */
class MasterDataController extends Controller
{
    public function index(): View
    {
        return view('modules.masterdata.index');
    }
}
