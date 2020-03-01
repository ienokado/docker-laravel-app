<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Log;
use Illuminate\Http\Request;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array(App::environment(), config('const.request_logger.environment'), true)) {
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
        Log::channel('request')->info(
            $request->method(),
            [
                'url' => $request->fullUrl(),
                'request' => $request->search_keyword
            ]
        );
    }
}
