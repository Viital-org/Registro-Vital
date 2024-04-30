<?php

it('has prossionaiscontroller page', function () {
    $response = $this->join('/prossionaiscontroller');

    $response->assertStatus(200);
});
