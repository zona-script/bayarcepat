<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Option
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(
        Request $request,
        Closure $next,
        $keyOption,
        $expectationOptionValue,
        $message = 'Ups, fitur sedang tidak tersedia')
    {
        $option = \App\Models\Option::where('name', $keyOption)
            ->first();

        if (blank($option) || optional($option)->value != $expectationOptionValue) {
            $this->returnView($option, $keyOption, $expectationOptionValue, $message);
        }

        return $next($request);
    }

    private function returnView($option, $key, $value, $message)
    {
        die(view('errors.option', [
            'option' => $option,
            'key' => $key,
            'value' => $value,
            'message' => $message,
        ]));
    }
}
