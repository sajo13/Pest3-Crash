<?php

uses()->group("laracasts");
use PHPUnit\Framework\ExpectationFailedException;

it('can validate an email', function () {
    $rule = new \App\Rules\IsValidEmailAddress();

    expect($rule->passes('email', 'test@test.com'))->toBeTrue();
});

it('throws an exception if the value is not a string', function () {
    $rule = new \App\Rules\IsValidEmailAddress();

    // Here we expect an exception because the value is not a string
    $this->expectException(\InvalidArgumentException::class);

    $this->expectExceptionMessage('Value must be a string.');

    $rule->passes('email', 123); // This should trigger the exception
})->group('current');



it('throws an expect exception', function () {
    $this->expectException(ExpectationFailedException::class);
    $this->expectExceptionMessage('This is my expected exception message');

    // Code that is expected to throw an exception
    throw new ExpectationFailedException('This is my expected exception message');
})->skip('skip expectation')
    ->group('current');;

//php artisan test --coverage

//php artisan test --parallel
