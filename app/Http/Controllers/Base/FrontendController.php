<?php

namespace App\Http\Controllers\Base;

use App\Helpers\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

/**
 * Class FrontendController
 * @package App\Http\Controllers\Base
 */
class FrontendController extends BaseController
{
    /**
     * @var string
     */
    protected $_area = 'frontend';

    public function index()
    {
        return $this->render();
    }

    public function getCurrentUser()
    {
        return frontendGuard()->user();
    }
}
