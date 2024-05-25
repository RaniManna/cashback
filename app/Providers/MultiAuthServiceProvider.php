<?php

namespace App\Providers;

use App\Auth\MVCAuthAdmin;
use App\Auth\MVCAuthManager;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

class MultiAuthServiceProvider extends ServiceProvider
{
    private $authTypes = [
        'admin' => MVCAuthAdmin::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(MVCAuthManager::class, function ($app) {

            $path = request()->path();

            foreach ($this->authTypes as $authType => $authClass) {

                if (Str::contains($path, $authType)) {
                    return $app->make($authClass);
                }
            }

            return MVCAuthAdmin::class;
        });
    }
}
