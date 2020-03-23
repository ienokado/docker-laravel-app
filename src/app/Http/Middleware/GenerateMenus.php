<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
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
        \Menu::make('AdminMenus', function ($menu) {
            $menu->add('Top', [
                'label' => 'Top', 'route' => 'admin.top', 'icon' => 'ti-home', 'icon-color' => 'c-red-500'
            ]);
            $menu->add('Debayashi', [
                'label' => '出囃子情報', 'icon' => 'ti-view-list-alt', 'icon-color' => 'c-light-blue-500'
            ]);
            $menu->debayashi->add('List', ['label' => '出囃子一覧', 'route'  => 'admin.debayashi']);
            $menu->debayashi->add('Regist', ['label' => '出囃子登録', 'route'  => 'admin.debayashi.new']);

            $menu->add('System', ['label' => 'システム', 'icon' => 'ti-settings', 'icon-color' => 'c-gray-500']);
            $menu->system->add('RequestLog', ['label' => 'リクエストログ', 'route'  => 'admin.system.log']);
        });

        return $next($request);
    }
}
