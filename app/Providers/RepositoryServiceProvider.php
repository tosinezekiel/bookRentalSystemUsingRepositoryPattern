<?php

namespace App\Providers;

use App\Repositories\Contracts\{BookRepository, RentedBookRepository, UserRepository};
use App\Repositories\Eloquent\{BookRepositoryImpl, RentedBookRepositoryImpl, UserRepositoryImpl};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookRepository::class, BookRepositoryImpl::class);
        $this->app->bind(RentedBookRepository::class, RentedBookRepositoryImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
    }
}
