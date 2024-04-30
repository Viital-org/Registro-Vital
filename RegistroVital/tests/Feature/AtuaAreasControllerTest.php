<?php

it('has atuaareascontroller page', function () {
    $response = $this->get('/atuaareascontroller');

    $response->assertStatus(200);
});
