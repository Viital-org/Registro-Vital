<?php

it('has pacientescontroller page', function () {
    $response = $this->get('/pacientescontroller');

    $response->assertStatus(200);
});
