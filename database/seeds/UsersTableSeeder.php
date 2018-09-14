<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
        'name' => str_random(10),
        'gender' => str_random(10),
        'student_id' => str_random(6),
        'department' => str_random(5),
        'batch' => str_random(3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);

//        $users = factory(User::class, 10)->create();
    }

}
