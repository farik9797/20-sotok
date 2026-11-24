<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Адреса страниц — со слешем в конце, как у WordPress: /uslugi → 301 на /uslugi/. */
class TrailingSlash
{
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();
        if ($request->isMethod('GET') && $path !== '/' && ! str_ends_with($path, '/')) {
            $qs = $request->getQueryString();

            return redirect()->to($request->getSchemeAndHttpHost().$request->getBaseUrl().$path.'/'.($qs ? '?'.$qs : ''), 301);
        }

        return $next($request);
    }
}
