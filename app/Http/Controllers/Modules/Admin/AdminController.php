<?php

namespace App\Http\Controllers\Modules\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class AdminController
 *
 * This controller handles administrative tasks and views for the admin module.
 */
class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('modules.admin.index');
    }
}
