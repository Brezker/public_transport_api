namespace App\Http\Middleware;

use Closure;

class ContentSecurityPolicy
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', 'block-all-mixed-content');
        return $response;
    }
}
