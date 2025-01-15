<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discussion;
use App\Models\User;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Controleer of er gebruikers in de database zijn
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('Er zijn geen gebruikers gevonden. Voeg eerst gebruikers toe voordat je discussies seedt.');
            return;
        }

        // Dummy data voor discussies
        $discussions = [
            [
                'title' => 'How to build Ashe for the latest patch?',
                'content' => 'I need advice on the best items for Ashe after the recent updates. Any tips?',
                'user_id' => $users->random()->id, // Gebruik de juiste kolomnaam
            ],
            [
                'title' => 'What are the best jungle champions for solo queue?',
                'content' => 'Looking for some strong jungle picks for climbing the ranked ladder.',
                'user_id' => $users->random()->id, // Gebruik de juiste kolomnaam
            ],
            [
                'title' => 'Tips for climbing ranked in season 25',
                'content' => 'Share your best tips and tricks for climbing ranked this season!',
                'user_id' => $users->random()->id, // Gebruik de juiste kolomnaam
            ],
        ];

        foreach ($discussions as $discussion) {
            Discussion::create($discussion);
        }

        $this->command->info('Discussions succesvol toegevoegd!');
    }
}
