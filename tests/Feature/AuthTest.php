<?php
// tests/Feature/AuthTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    // =============== REGISTER TESTLARI ===============

    /** @test */
    public function user_can_register()
    {
        $response = $this->post('/kr/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => 901234567, // 9 ta raqam
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        // Database ga yozilganini tekshirish
        $this->assertDatabaseHas('users', [
            'first_name' => 'John',
            'phone' => 901234567
        ]);

        // Login bo'lganini tekshirish
        $this->assertAuthenticated();

        // Home ga redirect bo'lganini tekshirish
        $response->assertRedirect(route('home', ['locale' => 'kr']));
    }

    /** @test */
    public function register_requires_all_fields()
    {
        $response = $this->post('/kr/register', []);

        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'phone',
            'password'
        ]);
    }

    /** @test */
    public function phone_must_be_unique()
    {
        // Birinchi user yaratamiz
        User::factory()->create(['phone' => 901234567]);

        // Ikkinchi user xuddi shu telefon bilan ro'yxatdan o'tishga harakat qiladi
        $response = $this->post('/kr/register', [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone' => 901234567, // Takrorlangan telefon
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        $response->assertSessionHasErrors('phone');
    }

    // =============== LOGIN TESTLARI ===============

    /** @test */
    public function user_can_login()
    {
        // User yaratamiz
        $user = User::factory()->create([
            'phone' => 901234567,
            'password' => bcrypt('password123')
        ]);

        // Login qilish
        $response = $this->post('/kr/login', [
            'phone' => 901234567,
            'password' => 'password123'
        ]);

        // Login bo'lganini tekshirish
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home', ['locale' => 'kr']));
    }

    /** @test */
    public function user_cannot_login_with_wrong_password()
    {
        $user = User::factory()->create([
            'phone' => 901234567,
            'password' => bcrypt('password123')
        ]);

        $response = $this->post('/kr/login', [
            'phone' => 901234567,
            'password' => 'wrong-password'
        ]);

        $this->assertGuest(); // Login bo'lmaganini tekshirish
    }

    // =============== LOGOUT TESTLARI ===============

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();

        // Avval login qilamiz
        $this->actingAs($user);

        // Logout qilamiz
        $response = $this->post('/kr/logout');

        // Logout bo'lganini tekshirish
        $this->assertGuest();
        $response->assertRedirect(route('home', ['locale' => 'kr']));
    }

    // =============== PASSWORD UPDATE TESTLARI ===============

    /** @test */
    public function user_can_change_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('old-password')
        ]);

        $response = $this->actingAs($user)->post('/kr/update', [
            'old_password' => 'old-password',
            'password' => 'new-password123',
            'password_confirmation' => 'new-password123'
        ]);

        $response->assertRedirect(route('home', ['locale' => 'kr']));

        // Yangi parol bilan login qila olishini tekshirish
        Auth::logout();
        $loginResponse = $this->post('/kr/login', [
            'phone' => $user->phone,
            'password' => 'new-password123'
        ]);

        $this->assertAuthenticated();
    }

    /** @test */
    public function cannot_change_password_with_wrong_old_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('old-password')
        ]);

        $response = $this->actingAs($user)->post('/kr/update', [
            'old_password' => 'wrong-old-password',
            'password' => 'new-password123',
            'password_confirmation' => 'new-password123'
        ]);

        $response->assertSessionHasErrors('old_password');
    }

    // =============== MIDDLEWARE TESTLARI ===============

    /** @test */
    public function guest_cannot_access_protected_routes()
    {
        // Login qilmagan user protected route ga kira olmaydi
        $response = $this->get('/kr/edit');
        $response->assertRedirect('/kr'); // Sizning middleware qayerga redirect qilishiga qarab

        $response = $this->post('/kr/logout');
        $response->assertRedirect('/kr');

        $response = $this->post('/kr/update', []);
        $response->assertRedirect('/kr');
    }

    /** @test */
    public function authenticated_user_cannot_access_guest_routes()
    {
        $user = User::factory()->create();

        // Login qilgan user guest route larga kira olmaydi
        $response = $this->actingAs($user)->post('/kr/register', []);
        $response->assertRedirect('/home'); // guest middleware redirect qiladi

        $response = $this->actingAs($user)->post('/kr/login', []);
        $response->assertRedirect('/home');
    }
}
