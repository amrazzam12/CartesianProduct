# PHP Cartesian Product Generator

A native PHP function to compute the **Cartesian product** of multiple input arrays, with support for edge cases, optional transformation via callback, and no external dependencies.

---

##  Features

- Accepts any number of arrays.
- Returns all possible combinations of their elements.
- Supports an optional final argument: a custom callable to transform each combination.
- Handles edge cases:
    - 1 - Returns an empty array if any input array is empty.
    - 2 - Returns single-element arrays if only one array is provided.

---

##  Usage

### Basic Example

```php
require_once 'cartesianProduct.php';

$result = cartesianProduct([1, 2], ['a', 'b'], ['x', 'y']);

print_r($result);

// Output:
[
  [1, 'a', 'x'], [1, 'a', 'y'],
  [1, 'b', 'x'], [1, 'b', 'y'],
  [2, 'a', 'x'], [2, 'a', 'y'],
  [2, 'b', 'x'], [2, 'b', 'y']
]
```

### With Callable Example

```php

$products = cartesianProduct(
    [1, 2],
    ['x', 'y'],
    fn($combination) => implode('-', $combination)
);

// Output: ['1-x', '1-y', '2-x', '2-y']

```


 Run Tests

To verify everything works, run the included test script:

```php
php test.php
```
### License
This script is free to use and modify for educational or commercial projects.