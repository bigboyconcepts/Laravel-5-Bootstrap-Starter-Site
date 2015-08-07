<?php namespace Starter\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
		\Illuminate\Cookie\Middleware\EncryptCookies::class,
		\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
		\Illuminate\Session\Middleware\StartSession::class,
		\Illuminate\View\Middleware\ShareErrorsFromSession::class,
		\Starter\Http\Middleware\VerifyCsrfToken::class,
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => \Starter\Http\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'guest' => \Starter\Http\Middleware\RedirectIfAuthenticated::class,
	];

}
