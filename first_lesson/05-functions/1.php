<?php

// Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
// Print this value out.

function add(string $string): string{
    return "$string codelex";
}

echo add("hello");
