<?php

namespace App\Exceptions;

use App\Constants\AuthRedirectionConstants;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
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

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest(AuthRedirectionConstants::ADMIN_LOGIN);
        }

        if ($request->is('organization') || $request->is('organization/*')) {
            return redirect()->guest(AuthRedirectionConstants::ORGANIZATION_LOGIN);
        }

        return redirect()->guest(AuthRedirectionConstants::USER_LOGIN);
    }
}
