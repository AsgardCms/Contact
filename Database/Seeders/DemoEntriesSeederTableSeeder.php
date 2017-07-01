<?php

namespace Modules\Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DemoEntriesSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('contact__contact_requests')->insert([
            ['name' => 'John Doe', 'email' => 'john@doe.com', 'message' => 'Hello World!'],
            ['name' => 'Jane Doe', 'email' => 'jane@doe.com', 'message' => 'Hello World!'],
        ]);
    }
}
