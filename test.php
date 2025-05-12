<?php

require_once 'index.php';

function assertEqual($actual, $expected, $testName = ''): void
{
    $pass = $actual === $expected;
    echo $pass ? "Passed $testName\n" : "Failed $testName\nExpected";
    echo "<br>";
}

// Test 1: Normal product
assertEqual(
    cartesianProduct([1, 2], ['a', 'b']),
    [
        [1, 'a'], [1, 'b'],
        [2, 'a'], [2, 'b']
    ],
    "Normal product"
);

// Test 2: Empty input array
assertEqual(
    cartesianProduct([1, 2], []),
    [],
    "Empty input array"
);

// Test 3: Single array
assertEqual(
    cartesianProduct([5, 6]),
    [[5], [6]],
    "Single array"
);

// Test 4: With callback
assertEqual(
    cartesianProduct([1, 2], ['x'], fn($c) => implode('-', $c)),
    ['1-x', '2-x'],
    "With callback"
);

// Test 5: Invalid input (should throw)
try {
    cartesianProduct([1, 2], 'String Paramater');
} catch (InvalidArgumentException $e) {
    echo "Not Array Type Provided (Passed)";
}
