<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Admin

        Gate::before(function($user) {
            if($user->level == '1') {
                return true;
                }
        });

        Gate::define('view',function($user){
            return $user->level==1;
        });
        // Editor
        Gate::define('add',function($user){
            return $user->level==2;
        });

        //User

        Gate::define('edit',function($user,$web){
            if($user->level==3){
                if($web->status==0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return true;
            }
        });

        Gate::define('delete',function($user,$web){
            if($user->level==3){
                if($web->status==0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return true;
            }
        });

    }
}
