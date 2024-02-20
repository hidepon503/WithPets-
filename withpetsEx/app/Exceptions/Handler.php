<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // if ($request->is('api/*')) {
        //     if ($exception instanceof \Illuminate\Validation\ValidationException) {
        //         return response()->json([
        //             'message' => 'The given data was invalid.',
        //             'errors' => $exception->errors()
        //         ], 422);
        //     }
        // }
        // return parent::render($request, $exception);
        if($exception instanceof AuthenticationException){
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }
        return parent::render($request, $exception);
    }
}
