<?php

namespace App\Providers;

use App\Http\Controllers\AuthorController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RentController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(CartController::class, 'app\Policies\CartPolicy');
        Gate::policy(AuthorController::class, 'app\Policies\AuthorPolicy');
        Gate::policy(BookController::class, 'app\Policies\BookPolicy');
        Gate::policy(MessageController::class, 'app\Policies\MessagePolicy');
        Gate::policy(RentController::class, 'app\Policies\RentPolicy');
    }
}
