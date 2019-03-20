<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson()) {
            // this part is from render function in Illuminate\Foundation\Exceptions\Handler.php
            // works well for json
            $exception = $this->prepareException($exception);

            if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
                return $exception->getResponse();
            } elseif ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                return $this->unauthenticated($request, $exception);
            } elseif ($exception instanceof \Illuminate\Validation\ValidationException) {
                return $this->convertValidationExceptionToResponse($exception, $request);
            }

            // we prepare custom response for other situation such as modelnotfound
            $response = [];
            $response['error'] = $exception->getMessage();

            if (config('app.debug')) {
                $response['code'] = $exception->getCode();
                $response['file'] = $exception->getFile();
                $response['line'] = $exception->getLine();
                $response['previous'] = $exception->getPrevious();
                $response['trace'] = $exception->getTrace();
            }

            // we look for assigned status code if there isn't we assign 500
            $statusCode = method_exists($exception, 'getStatusCode')
                ? $exception->getStatusCode()
                : 500;

            $response['status'] = $statusCode;

            return response()->json($response, $statusCode);
        }

        return parent::render($request, $exception);
    }
}
