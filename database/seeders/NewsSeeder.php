<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Voorbeeldnieuws 1
        News::create([
            'title' => 'Season 15 Patch Notes Released!',
            'image' => 'news_images/last_patch.jpg', // Zorg dat de afbeelding bestaat in 'storage/app/public/news_images'
            'content' => "
Hier is een langere tekst die je kunt gebruiken voor de inhoud van je nieuwsbericht over de Season 15 Patch Notes:

Details about the Season 15 Patch Notes

Season 15 introduces a wide range of changes aimed at improving gameplay balance and refreshing the meta. Significant adjustments have been made to both champions and items, ensuring that players have new strategies to explore. Among the highlights:

Champion Adjustments:

Several champions have received buffs to make them more viable in the current meta, including enhanced abilities and reduced cooldowns.
Nerfs were applied to overly dominant champions to create a fairer playing field.
Item Changes:

The reintroduction of classic items with updated stats and effects.
A new mythic item for assassins has been added, providing alternative build paths.
Gameplay Systems:

Improved jungle mechanics to make jungle paths more intuitive and rewarding.
Adjustments to turret plating and objective bounties to encourage more strategic plays.
Bug Fixes:

Fixed numerous issues related to pathfinding, champion interactions, and item mechanics.
Whether you're a casual player or a hardcore competitor, these updates are designed to keep the game fresh and exciting. Dive into Season 15 and explore the changes for yourself!",

            'published_at' => now(),
        ]);

        // Voorbeeldnieuws 2
        News::create([
            'title' => 'Esports: Top Teams to Watch in the Upcoming Championship',
            'image' => 'news_images/esports_championship.jpg', // Zorg dat de afbeelding bestaat
            'content' => 'The stage is set for one of the biggest esports events of the year: the upcoming championship that will bring together the best teams from around the world. This year’s tournament promises to be a showcase of intense competition, innovative strategies, and unforgettable moments. Fans are already buzzing with excitement as they anticipate epic rivalries and unexpected upsets.
        
            Among the top contenders is **Team Liquid**, known for their incredible adaptability and precise execution. They’ve been on a winning streak this season and are determined to maintain their dominance. Meanwhile, **T1**, the iconic team with a history of championship wins, is hungry to reclaim the title they lost last year. Their veteran players, combined with rising talents, make them a force to be reckoned with.
        
            But the competition doesn’t stop there. European powerhouse **G2 Esports** has been impressing fans with their aggressive playstyle and unpredictable strategies, while North American underdogs **100 Thieves** are looking to shock the world with their newfound synergy and momentum. And let’s not forget **Fnatic**, a team that has consistently delivered stellar performances on the global stage.
        
            This year’s championship also introduces a new format designed to encourage even more strategic gameplay and adaptability. Teams will face off in grueling best-of-five series, testing their mental resilience and teamwork under pressure. The stakes have never been higher, with a record-breaking prize pool of $5 million that has fans and players alike on the edge of their seats.
        
            Beyond the competition itself, the event is a celebration of the esports community. Viewers can expect exclusive content, behind-the-scenes footage, and special interviews with players and coaches, giving them a deeper insight into the strategies and dedication that drive these athletes.
        
            Whether you’re rooting for Team Liquid, T1, G2 Esports, 100 Thieves, Fnatic, or another favorite, this championship is not to be missed. Mark your calendars, gather your friends, and get ready to witness the best of the best as they battle for glory in one of the most anticipated tournaments in esports history!',
            'published_at' => now()->subDays(1),
        ]);
        
        

        // Voorbeeldnieuws 3
        News::create([
            'title' => 'Atakhan Revealed',
            'image' => 'news_images/atakhan.jpg', // Zorg dat de afbeelding bestaat
            'content' => 'The new champion Atakhan has been revealed! Find out more about his abilities.',
            'published_at' => now()->subDays(2),
        ]);
    }
}
