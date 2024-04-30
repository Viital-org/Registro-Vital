<?php

it('has consultascontroller page', function () {
    $response = $this->get('/consultascontroller');

    $response->assertStatus(200);
});
