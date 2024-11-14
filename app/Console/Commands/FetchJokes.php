<?php

namespace App\Console\Commands;

use App\Models\Joke;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class FetchJokes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:jokes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To fetch 15 jokes from icanhazdadjoke.com API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $input = $this->ask('How many jokes you want to fetch?');

        for ($i = 1; $i <= $input; $i++) {
            $response = Http::accept('application/json')->get('https://icanhazdadjoke.com/');
            $joke = collect($response->json())->toArray();

            Joke::updateOrCreate(
                ['api_joke_id' => $joke['id']],
                ['content' => $joke['joke']]
            );
        }
    }
}
