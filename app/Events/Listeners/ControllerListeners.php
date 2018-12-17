<?php

namespace App\Events\Listeners;
use App\Events\Handles\Controllers\Frontend\Home\AfterRender;
use App\Events\Handles\Controllers\Frontend\Home\BeforeRender;

/**
 * Class Listeners
 * @package App\Events
 */
class ControllerListeners extends \App\Events\Listeners\Base\ControllerListeners
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
//        $this->_listenControllerEvent('before_render.frontend.home', function ($arg) {
//            return (new BeforeRender())->handle($arg);
//        });

//        $this->_listenControllerEvent('after_render.frontend.home', function ($arg) {
//            return (new AfterRender())->handle($arg);
//        });
    }
}