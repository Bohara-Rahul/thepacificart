<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;

class LocationRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $position = Location::get();

        if ($position && !$request->session()->has('location_redirected')) 
        {
            $countryCode = $position->countryCode;

            // Example rules (customize as needed)
            if ($countryCode === 'CO') {
                $request->session()->put('location_redirected', true);
                return redirect()->away('https://artepacifico.co');
            }

            
        }
        return $next($request);
    }
}