<?php  namespace Apartment\Providers; 

use Apartment\Apartment;
use Illuminate\Support\ServiceProvider;

class ApartmentServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Apartment\Apartment', function($app)
        {
            return new Apartment($app['Tenantable\Tenantable'], $app);
        });
    }
}