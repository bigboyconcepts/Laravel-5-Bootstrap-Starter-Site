<?php namespace Starter\Providers;

use Illuminate\Support\ServiceProvider;
use Starter\Models\Comment;
use Starter\Models\Post;
use Starter\Repositories\CommentRepository;
use Starter\Repositories\PostRepository;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->bindRegistrars();

        $this->registerPostRepository();
        $this->registerCommentRepository();
	}

    /**
     * Bind the default registrars
     */
    protected function bindRegistrars()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'Starter\Services\Registrar'
        );
    }

    /**
     * Register the post repository class.
     *
     * @return void
     */
    protected function registerPostRepository()
    {
        $this->app->singleton('PostRepository', function ($app) {
            return new PostRepository((new Post()), $app['validator']);
        });
        $this->app->alias('PostRepository', 'Starter\Repositories\PostRepository');
    }

    /**
     * Register the comment repository class.
     *
     * @return void
     */
    protected function registerCommentRepository()
    {
        $this->app->singleton('CommentRepository', function ($app) {
            return new CommentRepository((new Comment()), $app['validator']);
        });
        $this->app->alias('CommentRepository', 'Starter\Repositories\CommentRepository');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'CommentRepository',
            'PostRepository',
        ];
    }

}
