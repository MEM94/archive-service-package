<?php
    namespace Archive\Service;

    use Illuminate\Support\ServiceProvider;

    class ArchiveServiceProvider extends ServiceProvider
    {
        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {
3            $this->loadViewsFrom(__DIR__.'/../assets/resources/views', 'pagereview');

            $this->app['router']->namespace('Archive\\Service\\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
                });

            if ($this->app->runningInConsole()) {
                $this->bootForConsole();
            }
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides()
        {
            return ['archive'];
        }

        /**
         * Console-specific booting.
         *
         * @return void
         */
        protected function bootForConsole()
        {
            $this->publishes([
                __DIR__.'/../assets/resources/views' => base_path('resources/views/vendor/archive'),
            ], 'archive.views');

            $this->publishes([
                __DIR__ . '/../assets/resources/js' =>
                resource_path('assets/vendor/archive'
            )], 'vue-components');
        }
    }