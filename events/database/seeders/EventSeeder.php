<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::factory()
                ->count(10)
                ->state(new Sequence(
                    ['location_id' => '1'],
                    ['location_id' => '2'],
                    ['location_id' => '3'],
                    ['location_id' => '4']
                ))
                ->create();
    }
}
