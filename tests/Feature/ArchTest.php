<?php

it('does not debugging functions')
    ->expect(
        ['dd', 'dump', 'ray']
    )->not->toBeUsed();


it('uses the redirect facade for redirecting')
    ->expect(['back', 'redirect', 'to_route' ])
    ->not->toBeUsedIn('App\Http\Controllers\\');


it('connot use facades')
    ->expect('Illuminate\\Support\\Facades\\')
    ->not->toBeUsed();
