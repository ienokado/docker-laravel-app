<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Log;
use Illuminate\Http\Request;

class RequestLogger
{
    const ENABLE_ENVIRONMENT = [
        'local',
        'development',
        'production',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('app.debug') && in_array(App::environment(), self::ENABLE_ENVIRONMENT, true)) {
            $this->writeLog($request);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return void
     */
    private function writeLog(Request $request): void
    {
        Log::debug($request->method(), ['url' => $request->fullUrl(), 'request' => $request->all()]);
    }
}
