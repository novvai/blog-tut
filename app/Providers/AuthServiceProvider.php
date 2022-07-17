<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // //
        // Gate::before(fn (User $user) => $user->isWriter());


        // Gate::after(fn (User $user) => $user->isWriter());

        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        Gate::define('update-post-msg', function (User $user, Post $post) {
            return $user->id === $post->user_id ?
                Response::allow() :
                Response::deny("Sorry you dont have permission to update this article");
        });

        Gate::define('superuser', function (User $user) {
            return $user->id === 3;
        });

        Gate::define('create-post', function (User $user, $category, $s) {
            dd($category, $s);
            return $user->isWriter();
        });
    }
}
