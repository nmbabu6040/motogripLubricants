<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
        View::share(
            'setting',
            Setting::first()
        );

        View::share(
            'menus',
            Menu::with('children')
                ->whereNull('parent_id')
                ->where('status', 1)
                ->orderBy('sort_order')
                ->get()
        );

        View::composer('*', function ($view) {

            $menuCategories = Category::with([

                'subCategories' => function ($query) {

                    $query->where('status', 1)
                        ->orderBy('sort_order');
                }

            ])
                ->where('status', 1)
                ->orderBy('sort_order')
                ->get();

            $view->with(
                'menuCategories',
                $menuCategories
            );
        });
    }
}
