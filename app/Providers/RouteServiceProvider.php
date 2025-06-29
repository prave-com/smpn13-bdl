<?php

namespace App\Providers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function boot(): void
    {
        // Route Model Binding by slug
        Route::bind('news', function ($value) {
            return News::where('slug', $value)->firstOrFail();
        });

        Route::bind('category', function ($value) {
            return NewsCategory::where('slug', $value)->firstOrFail();
        });

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
