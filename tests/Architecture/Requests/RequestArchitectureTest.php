<?php

use cdburgess\bggapi\Requests\RequestBuilder;

it('ensures all files in Requests directory are classes and extend RequestBuilder', function () {
    $files = glob('src/Requests/*.php');
    foreach ($files as $file) {
        if (basename($file) !== 'RequestBuilder.php') {
            $className = 'cdburgess\\bggapi\\Requests\\' . pathinfo($file, PATHINFO_FILENAME);
            expect(class_exists($className))->toBeTrue();
            expect(is_subclass_of($className, RequestBuilder::class))->toBeTrue();
        }
    }
});