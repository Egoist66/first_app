<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;

class BaseController extends Controller
{
    public AdminService $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

}
