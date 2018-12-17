<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\FrontendController;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->_to('dashboard.index');
    }
}
