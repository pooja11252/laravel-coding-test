<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserLocation;

class FetchRandomUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-random-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle() {
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://randomuser.me/api/');
            $data = $response->json()['results'][0];

            $user = User::create([
                'name' => $data['name']['first'] . ' ' . $data['name']['last'],
                'email' => $data['email'],
            ]);

            UserDetail::create([
                'user_id' => $user->id,
                'gender' => $data['gender'],
            ]);

            UserLocation::create([
                'user_id' => $user->id,
                'city' => $data['location']['city'],
                'country' => $data['location']['country'],
            ]);
        }

        $this->info('5 random users added successfully!');
    }

}
