<?php

namespace App\Exceptions;

use App\Helpers\ApiHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // This will replace our 404 response with
        // a JSON response.
        if ( $exception instanceof MethodNotAllowedHttpException || $exception instanceof ModelNotFoundException ) {
            return ApiHelper::response404();
        }

        // This will replace our 400 response with
        // a JSON response.
        if ( $exception instanceof ValidationException) {
            return ApiHelper::response400($exception->errors());
        }

        // This will replace our 401 response with
        // a JSON response.
        if ($exception instanceof AuthenticationException) {
            return ApiHelper::response401();
        }

        // This will replace our 403 response with
        // a JSON response.
        if ($exception instanceof AuthorizationException) {
            return ApiHelper::response403();
        }

        return parent::render($request, $exception);
    }
}
