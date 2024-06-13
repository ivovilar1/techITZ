<?php

use function Pest\Laravel\get;

it('should be able to render component', function () {
    get(route('home'))
        ->assertOk();
});
