<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

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
        Collection::macro('groupByDate', function () {
            return $this->groupBy(function ($item) {
                $due_date = $item->due_date;
                if ($due_date->isToday()) {
                    return 'Tasks Today';
                } elseif ($due_date->isTomorrow()) {
                    return 'Tasks Tomorrow';
                } elseif ($due_date->isWithinNextWeek()) {
                    return 'Tasks Next Week';
                } elseif ($due_date->isWithinNextMonth()) {
                    return 'Tasks in the Near Future';
                } else {
                    return 'Tasks in the Future';
                }
            });
        });
    }
}
