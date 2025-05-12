<?php

function cartesianProduct(...$params): array {

    $result = [[]];
    $callback = null;
    if (!empty($params) && is_callable(end($params)))
        $callback = array_pop($params); // Save The Callback Method And Remove it From Array To Avoid Looping Through it

    foreach ($params as $array){ // Edge Case 1 (Empty Array)
        if(empty($array))
            return [];
        if (!is_array($array))
            throw new InvalidArgumentException(
                'All arguments must be arrays'
            );
    }

    if (count($params) === 1) { // Edge Case 2 (One Array Provided)
        $single = [];
        foreach ($params[0] as $item) {
            $single[] = $callback ? $callback([$item]) : [$item];
        }
        return $single;
    }

    foreach ($params as $array) {
        $resultUpdated = [];
        foreach ($result as $product) {
            foreach ($array as $item) {
                $resultUpdated[] = array_merge($product, [$item]);
            }
        }
        $result = $resultUpdated;
    }
    if ($callback) {
        return array_map($callback, $result);
    }

    return $result;
}

$cartesianProduct = cartesianProduct(['Y' , 'L'], ['a', '%#' , 'b'], ['x', 'y', '05' , 'z'] , ['F' , 'Y' , 'W'] , function($combination) {
    return implode('-', $combination);
}
);

echo '<pre>'.print_r($cartesianProduct, true).'</pre>';