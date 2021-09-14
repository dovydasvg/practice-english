<?php

namespace App\Providers;

use App\Components\RandomQuote\RandomQuoteGenerator;
use App\Components\RandomQuote\RandomQuoteParser;
use App\Components\RandomQuote\RandomQuoteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RandomQuoteGenerator::class, function($app){
            return new RandomQuoteGenerator(new RandomQuoteService(), new RandomQuoteParser());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
