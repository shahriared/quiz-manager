<?php

namespace Shahriared\QuizManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QuizManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('quiz-manager')
            ->hasConfigFile()
            ->hasMigrations('create_quizzes_table', 'create_quiz_questions_table', 'create_quiz_participants_table');
    }

    public function packageBooted()
    {
        $this->configureRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishSeeders();
        }
    }

    protected function configureRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }

    protected function publishSeeders()
    {
        //
    }
}
