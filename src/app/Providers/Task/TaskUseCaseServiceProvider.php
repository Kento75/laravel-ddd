<?php

namespace App\Providers\Task;

use Illuminate\Support\ServiceProvider;

class TaskUseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\UseCase\Task\TaskCreateUseCase::class, function ($app) {
            // return new \App\UseCase\Task\TaskCreateUseCase(new \App\Infra\Task\Repositories\TaskRdbRepository);
            return new \App\UseCase\Task\TaskCreateUseCase(new \App\Infra\Task\Repositories\TaskMockRepository);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
