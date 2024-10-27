<?php

use App\Models\FrontendUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

it('can register a user', function () {
    // Arrange: Data to send in request
    $data = [
        'username' => 'newuser',
        'email' => 'newuser@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    // Act: Send request
    $response = postJson('api/register', $data);

    // Assert: Check response and database
    $response->assertStatus(200);
    $response->assertJson(['message' => 'User registered successfully!']);

    $this->assertDatabaseHas('frontend_users', [
        'username' => 'newuser',
        'email' => 'newuser@example.com',
    ]);
});

it('can login with valid credentials', function () {
    // Arrange: Create a user
    $user = FrontendUser::create([
        'username' => 'testuser',
        'email' => 'testuser@example.com',
        'password' => Hash::make('password123'),
    ]);

    // Act: Attempt to login
    $response = postJson('api/login', [
        'username' => 'testuser',
        'password' => 'password123',
    ]);

    // Assert: Successful login and token received
    $response->assertStatus(200);
    $response->assertJsonStructure(['token', 'message']);
});

it('fails login with invalid credentials', function () {
    // Arrange: Create a user
    $user = FrontendUser::create([
        'username' => 'testuser',
        'email' => 'testuser@example.com',
        'password' => Hash::make('password123'),
    ]);

    // Act: Attempt to login with wrong password
    $response = postJson('api/login', [
        'username' => 'testuser',
        'password' => 'wrongpassword',
    ]);

    // Assert: Failed login
    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['username']);
});

it('can send password reset link', function () {
    // Arrange: Create a user
    FrontendUser::create([
        'email' => 'user@example.com',
        'username' => 'user',
        'password' => Hash::make('password123'),
    ]);

    // Mock Password broker
    Password::shouldReceive('broker->sendResetLink')
        ->once()
        ->andReturn(Password::RESET_LINK_SENT);

    // Act: Send request
    $response = postJson('api/reset-password', [
        'email' => 'user@example.com',
    ]);

    // Assert: Reset link sent
    $response->assertStatus(200);
    $response->assertJson(['message' => 'Password reset link sent to user@example.com']);
});

it('can logout a user', function () {
    // Arrange: Create and authenticate user
    $user = FrontendUser::create([
        'username' => 'user',
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
    ]);

    // Simulate logged in user
    actingAs($user, 'sanctum');

    // Act: Log out the user
    $response = postJson('api/logout');

    // Assert: Logout success
    $response->assertStatus(200);
    $response->assertJson(['message' => 'Logged out']);
});
