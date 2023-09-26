<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Handler extends ExceptionHandler
{


    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return redirect()->route('error.404');
        } elseif ($exception instanceof UrlGenerationException) {
            // Handle the UrlGenerationException here
            return redirect()->route('custom.error.page'); // Replace with your desired route
        }

        return parent::render($request, $exception);
    }
    
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
