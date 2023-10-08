<?php

namespace App\Http\Controllers\Modules\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('modules.masterdata.index');
    }
}
