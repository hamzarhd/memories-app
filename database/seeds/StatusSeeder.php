<?php

use Illuminate\Database\Seeder;
use  \Illuminate\Support\Facades\DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('status')->insert([
           'id'=> 1,
           'name' => "Phase 1",
            'order' => 0,
            'is_child' => 0,

        ]);
        DB::table('status')->insert([
            'id'=> 2,
            'name' => "Phase 2",
            'order' => 0,
            'is_child' => 0,

        ]);
        DB::table('status')->insert([
            'id'=> 3,
            'name' => "Phase 3",
            'order' => 0,
            'is_child' => 0,

        ]);
        DB::table('status')->insert([
            'id'=> 4,
            'name' => "Phase 4",
            'order' => 0,
            'is_child' => 0,

        ]);
        DB::table('status')->insert([
            'id'=> 5,
            'name' => "Payment",
            'order' => 1,
            'is_child' => 1,
            'parent_id'=> 1
        ]);
        DB::table('status')->insert([
            'id'=> 6,
            'name' => "Layouts",
            'order' => 2,
            'is_child' => 1,
            'parent_id'=> 1
        ]);

        DB::table('status')->insert([
            'id'=> 7,
        'name' => "Template Done",
        'order' => 3,
        'is_child' => 1,
        'parent_id'=> 2
    ]);
        DB::table('status')->insert([
            'id'=> 8,
            'name' => "Inhalte wischer",
            'order' => 4,
            'is_child' => 1,
            'parent_id'=> 3
        ]);
        DB::table('status')->insert([
            'id'=> 9,
            'name' => "Inhalte eizalt",
            'order' => 5,
            'is_child' => 1,
            'parent_id'=> 3
        ]);

        DB::table('status')->insert([
            'id'=> 10,
            'name' => "Fehisutell",
            'order' => 6,
            'is_child' => 1,
            'parent_id'=> 4
        ]);
        DB::table('status')->insert([
            'id'=> 11,
            'name' => "Payment",
            'order' => 7,
            'is_child' => 1,
            'parent_id'=> 4
        ]);
        DB::table('status')->insert([
            'id'=> 12,
            'name' => "Access",
            'order' => 8,
            'is_child' => 1,
            'parent_id'=> 4
        ]);
        DB::table('status')->insert([
            'id'=> 13,
            'name' => "Web Page done",
            'order' => 9,
            'is_child' => 1,
            'parent_id'=> 4
        ]);
        DB::table('status')->insert([
            'id'=> 14,
            'name' => "Deleted",
            'order' => 0,
            'is_child' => 0,

        ]);
    }
}
