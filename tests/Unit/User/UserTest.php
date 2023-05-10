<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 
class UserTest extends TestCase
{

    use DatabaseTransactions;

    public function test_store_user()
    {
        $data = [
            'f_name'=>'test',
            'l_name'=>'test',
            'father_name'=>'test',
            'national_code'=>'1111111111',
            'gender'=>'1',
            'role'=>'1',
            'email'=>'test@gmail.com',
            'password'=>'1111111',
        ];
        $response = $this->post('/api/school/user/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
    }
    public function test_update_user()
    {
        $data = [
            'f_name'=>'1',
            'l_name'=>'2',
            'father_name'=>'3',
            'national_code'=>'4',
            'gender'=>'1',
            'role'=>'1',
            'email'=>'rpishva999@gmail.com',
            'password'=>'1111111',
        ];
        $response = $this->put('/api/school/user/update/16', $data);
        $response->assertStatus(200);
    }
    public function test_get_user_by_id()
    {
        $response = $this->get('/api/school/user/16');
        $response->assertStatus(200);
    }
    public function test_get_users()
    {
        $response = $this->get('/api/school/user/users');
        $response->assertStatus(200);
    }
    public function test_get_user_profile()
    {
        $response = $this->get('/api/school/user-profile/16');
        $response->assertStatus(200);
    }
    public function test_get_users_men()
    {
        $response = $this->get('/api/school/user/men');
        $response->assertStatus(200);
    }
    public function test_get_users_women()
    {
        $response = $this->get('/api/school/user/women');
        $response->assertStatus(200);
    }
    public function test_remove_user()
    {
        $response = $this->delete('/api/school/user/remove/32');
        $response->assertStatus(200);
    }
    public function test_get_users_students()
    {
        $response = $this->get('/api/school/user/students');
        $response->assertStatus(200);
    }
    public function test_get_users_teacher()
    {
        $response = $this->get('/api/school/user/teachers');
        $response->assertStatus(200);
    }
    public function test_get_users_personel()
    {
        $response = $this->get('/api/school/user/personels');
        $response->assertStatus(200);
    }
}