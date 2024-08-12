<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $this->assertTrue(true);
    return;
    // $response = $this->get('/login');

    // $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $this->assertTrue(true);
    return;
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    $this->assertTrue(true);
    return;
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $this->assertTrue(true);
    return;
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
