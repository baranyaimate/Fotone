<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureHeaders
{

    private $unwantedHeaderList = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        return $response;
    }
 
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header){
            header_remove($header);
        }
    }
}
