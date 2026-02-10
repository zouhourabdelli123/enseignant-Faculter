<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        View::composer('dashbaord.sidebar', function ($view) {
            $unreadCount = 0;
            $user = auth()->user();

            if ($user) {
                $teacherId = null;
                if (isset($user->id_enseignant)) {
                    $teacherId = (int) $user->id_enseignant;
                } else {
                    $teacherId = DB::table('connection_enseignant')
                        ->where('id', $user->id)
                        ->value('id_enseignant');
                }

                if ($teacherId) {
                    $unreadCount = (int) DB::table('messages_enseignant')
                        ->where('id_enseignant', $teacherId)
                        ->where('envoye_par_enseignant', 0)
                        ->where('status', 0)
                        ->count();
                }
            }

            $view->with('messageUnreadCount', $unreadCount);
        });
    }
}
