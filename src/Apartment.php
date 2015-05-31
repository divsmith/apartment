<?php  namespace Apartment; 

use Closure;
use Illuminate\Contracts\Container\Container;
use Tenantable\Tenantable;

class Apartment {

    /**
     * @var \Tenantable\Tenantable
     */
    protected $tenantable;

    /**
     * @var \ \Illuminate\Contracts\Container\Container
     */
    protected $app;

    public function __construct(Tenantable $tenantable, Container $app)
    {
        $this->tenantable = $tenantable;
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $this->tenantable->userBelongsToTenant())
        {
            return $next($request);
        }

        $this->app->abort(403, 'Unauthorized User');
    }
}