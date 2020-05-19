<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // JavaScript Vars
        // $view = config('javascript.bind_js_vars_to_this_view');
        // if(view()->exists($view)) {
        //     \View::composer(
        //         $view, 'App\Http\View\Composers\JavascriptComposer'
        //     );
        // }

    }
}
