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
            'content' => " Details about the Season 15 Patch Notes

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
            'image' => 'news_images/esport.jpg', // Zorg dat de afbeelding bestaat
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
            'title' => 'Atakhan Revealed: The New Champion Shakes Up the Rift',
            'image' => 'news_images/atakhan.jpg', // Zorg dat de afbeelding bestaat
            'content' => 'The wait is over! Atakhan, the long-rumored new champion, has finally been revealed, and he is set to bring a unique playstyle to the game. Known as the "Shadow Warden," Atakhan combines agility, strength, and control in a way never seen before. Players and fans are already speculating how he will fit into the current meta.
        
            Atakhan’s abilities revolve around harnessing the power of shadows to outmaneuver opponents and deal devastating damage. His **passive ability**, "Shadowborn Resilience," allows him to gain additional movement speed and a shield after exiting combat, making him an excellent choice for repositioning and surprise attacks. His **Q ability**, "Shadow Slash," is a skill shot that deals damage to enemies in a line, while also applying a slow, making it perfect for chasing down opponents.
        
            The highlight of his kit, however, is his **ultimate ability**, "Warden’s Eclipse," which creates a massive zone of darkness around Atakhan, blinding enemies and reducing their vision. This ability can single-handedly change the outcome of a team fight, as it disorients opponents and forces them to reposition while Atakhan wreaks havoc.
        
            Atakhan’s aesthetic design is just as impressive as his abilities. With sleek armor and shadowy effects, he embodies the perfect balance between a fierce warrior and a mysterious figure. His lore tells the story of a fallen protector who now wields forbidden powers to restore balance to his world. Fans of deep lore will love uncovering the connections between Atakhan and existing champions.
        
            Whether you are a top-laner looking for a new main or a mid-laner eager to dominate the battlefield, Atakhan is sure to become a popular pick. His unique playstyle promises to bring fresh strategies to the game, and we can’t wait to see how players adapt to his mechanics. Will he be the next big meta-changer, or will he require some buffs before becoming a staple in competitive play? Only time will tell.
        
            Atakhan will be available for testing on the Public Beta Environment (PBE) starting this week. Make sure to try him out and see for yourself why everyone is talking about the Shadow Warden!',
            'published_at' => now()->subDays(2),
        ]);
        
    }
}
