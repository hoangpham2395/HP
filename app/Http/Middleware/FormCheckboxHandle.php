<?php

namespace App\Http\Middleware;

use Closure;

class FormCheckboxHandle
{
    public function handle($request, Closure $next)
    {
        // set default value if checkbox won't submit
        $checkbox = (array)$request->get(getConstant('CHECKBOX_PREFIX'), []);
        $checkboxMulti = (array)$request->get(getConstant('CHECKBOX_MULTI_PREFIX'), []);
        $this->_handle($checkbox, $request);
        $this->_handle($checkboxMulti, $request, true);

        return $next($request);
    }

    protected function _handle($keys, &$request, $multi = false)
    {
        // set default value if checkbox won't submit
        foreach ($keys as $key) {
            $data = [$key => $request->get($key, $multi ? [] : null)];
            $request->merge($data);
        }
    }
}
