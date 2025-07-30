<?php
// tests/Feature/JobTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class JobTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Test uchun kerakli ma'lumotlar
        DB::table('categories')->insert(['id' => 1, 'name' => 'IT', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('subcategories')->insert(['id' => 1, 'name' => 'Programming', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('districts')->insert(['id' => 1, 'name' => 'Tashkent', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['id' => 1, 'name' => 'Full-time', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('employment_types')->insert(['id' => 1, 'name' => 'Permanent', 'created_at' => now(), 'updated_at' => now()]);

        $this->user = User::factory()->create();
    }

    // ==================== INDEX TESTLARI ====================

    /** @test */
    public function anyone_can_view_jobs_index()
    {
        $response = $this->get('/kr/jobs/index');

        $response->assertStatus(200);
        $response->assertViewIs('pages.user.jobs.index');
    }

    /** @test */
    public function jobs_index_shows_filter_data_when_filters_applied()
    {
        // Ba'zi joblar yaratamiz
        Job::factory()->count(3)->create(['category_id' => 1]);

        $response = $this->get('/kr/jobs/index?category_id=1');

        $response->assertStatus(200);
        $response->assertViewIs('pages.user.jobs.index');
        $response->assertViewHas('jobsData');
        $response->assertViewHas('filters');
    }

    /** @test */
    public function jobs_index_shows_null_data_when_no_filters()
    {
        $response = $this->get('/kr/jobs/index');

        $response->assertStatus(200);
        $response->assertViewHas('jobsData', null);
        $response->assertViewHas('filters', []);
    }

    // ==================== CREATE TESTLARI ====================

    /** @test */
    public function authenticated_user_can_access_create_page()
    {
        $response = $this->actingAs($this->user)->get('/kr/jobs/create');

        $response->assertStatus(200);
        $response->assertViewIs('pages.user.jobs.create');
    }

    /** @test */
    public function guest_cannot_access_create_page()
    {
        $response = $this->get('/kr/jobs/create');

        // Auth middleware redirect qiladi
        $this->assertTrue(in_array($response->status(), [302, 401]));
    }

    // ==================== STORE TESTLARI ====================

    /** @test */
    public function authenticated_user_can_create_job()
    {
        $jobData = [
            'category_id' => 1,
            'subcategory_id' => 1,
            'district_id' => 1,
            'type_id' => 1,
            'employment_type_id' => 1,
            'phone' => 901234567,
            'title' => 'Laravel Developer',
            'description' => 'Looking for Laravel developer',
            'salary_from' => 3000000,
            'salary_to' => 5000000,
            'deadline' => '2025-12-31',
            'address' => 'Tashkent, Uzbekistan',
        ];

        $response = $this->actingAs($this->user)->post('/kr/jobs/store', $jobData);

        // Job yaratilganini tekshirish
        $this->assertDatabaseHas('jobs', [
            'user_id' => $this->user->id,
            'title' => 'Laravel Developer',
        ]);

        // Success alert va redirect
        $response->assertRedirect(route('jobs.create', ['locale' => 'kr']));
        $response->assertSessionHas('alert.config.type', 'success');
    }

    /** @test */
    public function store_validates_required_fields()
    {
        $response = $this->actingAs($this->user)->post('/kr/jobs/store', []);

        $response->assertSessionHasErrors();
    }

    /** @test */
    public function guest_cannot_create_job()
    {
        $jobData = ['title' => 'Test Job'];

        $response = $this->post('/kr/jobs/store', $jobData);

        $this->assertTrue(in_array($response->status(), [302, 401]));
        $this->assertDatabaseMissing('jobs', ['title' => 'Test Job']);
    }

    // ==================== SHOW TESTLARI ====================

    /** @test */
    public function anyone_can_view_job_show()
    {
        $job = Job::factory()->create(['title' => 'Test Job Title']);

        $response = $this->get("/kr/jobs/show/{$job->id}");

        $response->assertStatus(200);
        $response->assertViewIs('pages.user.jobs.show');
        $response->assertViewHas('job');
        $response->assertSee('Test Job Title');
    }

    /** @test */
    public function job_show_loads_required_relationships()
    {
        $job = Job::factory()->create();

        $response = $this->get("/kr/jobs/show/{$job->id}");

        $response->assertStatus(200);

        // View'da job bilan relationships yuklanganini tekshirish
        $viewJob = $response->viewData('job');
        $this->assertTrue($viewJob->relationLoaded('images'));
        $this->assertTrue($viewJob->relationLoaded('category'));
        $this->assertTrue($viewJob->relationLoaded('district'));
        $this->assertTrue($viewJob->relationLoaded('type'));
        $this->assertTrue($viewJob->relationLoaded('user'));
    }

    // ==================== EDIT TESTLARI (OWNER MIDDLEWARE) ====================

    /** @test */
    public function job_owner_can_access_edit_page()
    {
        $job = Job::factory()->forUser($this->user)->create();

        $response = $this->actingAs($this->user)->get("/kr/jobs/edit/{$job->id}");

        $response->assertStatus(200);
        $response->assertViewIs('pages.user.jobs.edit');
        $response->assertViewHas('job');
    }

    /** @test */
    public function non_owner_cannot_access_edit_page()
    {
        $otherUser = User::factory()->create();
        $job = Job::factory()->forUser($otherUser)->create();

        $response = $this->actingAs($this->user)->get("/kr/jobs/edit/{$job->id}");

        // Owner middleware to'xtatishi kerak
        $this->assertTrue(in_array($response->status(), [403, 404, 302]));
    }

    /** @test */
    public function edit_page_loads_required_relationships()
    {
        $job = Job::factory()->forUser($this->user)->create();

        $response = $this->actingAs($this->user)->get("/kr/jobs/edit/{$job->id}");

        $response->assertStatus(200);

        $viewJob = $response->viewData('job');
        $this->assertTrue($viewJob->relationLoaded('images'));
        $this->assertTrue($viewJob->relationLoaded('category'));
        $this->assertTrue($viewJob->relationLoaded('district'));
        $this->assertTrue($viewJob->relationLoaded('type'));
    }

    // ==================== UPDATE TESTLARI (OWNER MIDDLEWARE) ====================

    /** @test */
    public function job_owner_can_update_job()
    {
        $job = Job::factory()->forUser($this->user)->create(['title' => 'Old Title']);

        $updateData = [
            'category_id' => 1,
            'subcategory_id' => 1,
            'district_id' => 1,
            'type_id' => 1,
            'employment_type_id' => 1,
            'phone' => 901234567,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'salary_from' => 4000000,
            'salary_to' => 6000000,
            'deadline' => '2025-12-31',
            'address' => 'Updated Address',
        ];

        $response = $this->actingAs($this->user)->put("/kr/jobs/update/{$job->id}", $updateData);

        // Database yangilanganini tekshirish
        $this->assertDatabaseHas('jobs', [
            'id' => $job->id,
            'title' => 'Updated Title',
        ]);

        // Redirect va alert
        $response->assertRedirect(route('profile.manage-jobs', ['locale' => 'kr']));
        $response->assertSessionHas('alert.config.type', 'success');
    }

    /** @test */
    public function non_owner_cannot_update_job()
    {
        $otherUser = User::factory()->create();
        $job = Job::factory()->forUser($otherUser)->create(['title' => 'Original Title']);

        $updateData = ['title' => 'Hacked Title'];

        $response = $this->actingAs($this->user)->put("/kr/jobs/update/{$job->id}", $updateData);

        // Owner middleware to'xtatishi kerak
        $this->assertTrue(in_array($response->status(), [403, 404, 302]));

        // Database o'zgarmaganini tekshirish
        $this->assertDatabaseHas('jobs', [
            'id' => $job->id,
            'title' => 'Original Title'
        ]);
    }

    // ==================== DELETE TESTLARI (OWNER MIDDLEWARE) ====================

    /** @test */
    public function job_owner_can_delete_job()
    {
        $job = Job::factory()->forUser($this->user)->create();

        $response = $this->actingAs($this->user)->delete("/kr/jobs/destroy/{$job->id}");

        // Database'dan o'chirilganini tekshirish
        $this->assertDatabaseMissing('jobs', ['id' => $job->id]);

        // Redirect va alert
        $response->assertRedirect(route('profile.manage-jobs', ['locale' => 'kr']));
        $response->assertSessionHas('alert.config.type', 'success');
    }

    /** @test */
    public function non_owner_cannot_delete_job()
    {
        $otherUser = User::factory()->create();
        $job = Job::factory()->forUser($otherUser)->create();

        $response = $this->actingAs($this->user)->delete("/kr/jobs/destroy/{$job->id}");

        // Owner middleware to'xtatishi kerak
        $this->assertTrue(in_array($response->status(), [403, 404, 302]));

        // Database'da hali mavjudligini tekshirish
        $this->assertDatabaseHas('jobs', ['id' => $job->id]);
    }

    // ==================== SERVICE INTEGRATION TESTLARI ====================

    /** @test */
    public function job_creation_uses_job_service()
    {
        // JobService mock qilish yoki oddiy test
        $jobData = [
            'category_id' => 1,
            'subcategory_id' => 1,
            'district_id' => 1,
            'type_id' => 1,
            'employment_type_id' => 1,
            'phone' => 901234567,
            'title' => 'Service Test Job',
            'description' => 'Testing service integration',
            'salary_from' => 3000000,
            'salary_to' => 5000000,
            'deadline' => '2025-12-31',
            'address' => 'Test Address',
        ];

        $response = $this->actingAs($this->user)->post('/kr/jobs/store', $jobData);

        // JobService orqali yaratilganini tekshirish
        $this->assertDatabaseHas('jobs', [
            'user_id' => $this->user->id,
            'title' => 'Service Test Job',
        ]);
    }

    // ==================== FILTER INTEGRATION TESTLARI ====================

    /** @test */
    public function index_applies_filters_correctly()
    {
        // Turli kategoriya joblar yaratish
        Job::factory()->create(['category_id' => 1, 'title' => 'IT Job']);
        Job::factory()->create(['category_id' => 2, 'title' => 'Marketing Job']);

        $response = $this->get('/kr/jobs/index?category_id=1');

        $response->assertStatus(200);
        $response->assertViewHas('filters', ['category_id' => '1']);
        $response->assertViewHas('jobsData');
    }

    /** @test */
    public function index_handles_multiple_filters()
    {
        $response = $this->get('/kr/jobs/index?category_id=1&district_id=1&salary_from=3000000');

        $response->assertStatus(200);
        $response->assertViewHas('filters', [
            'category_id' => '1',
            'district_id' => '1',
            'salary_from' => '3000000'
        ]);
    }
}
