<?php

namespace App\Exceptions;

use Bastinald\Ux\Jobs\EmailException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if (app()->environment('production') && $this->shouldReport($e)) {
                EmailException::dispatch($e->getMessage(), $this->renderExceptionContent($e));
            }
        });
    }
}
