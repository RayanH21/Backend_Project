<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // Maak categorieën aan
        $categories = [
            'Algemene vragen' => FaqCategory::create(['name' => 'Algemene vragen'])->id,
            'Technische vragen' => FaqCategory::create(['name' => 'Technische vragen'])->id,
            'Account en veiligheid' => FaqCategory::create(['name' => 'Account en veiligheid'])->id,
        ];

        // Voeg FAQs toe
        $faqs = [
            // Algemene vragen
            [
                'category_id' => $categories['Algemene vragen'],
                'question' => 'Wat is League of Legends en hoe begin ik?',
                'answer' => 'League of Legends is een strategisch teamspel waarin twee teams van vijf spelers tegen elkaar strijden om de basis van de tegenstander te vernietigen. Begin door tutorials te spelen, een account aan te maken en tegen AI of andere beginners te spelen.',
            ],
            [
                'category_id' => $categories['Algemene vragen'],
                'question' => 'Welke rollen zijn er in League of Legends?',
                'answer' => 'De vijf rollen in League of Legends zijn: 
                - Toplaner: Speelt op de bovenste lane en bouwt vaak tanky of split-push builds.
                - Jungler: Beheert de jungle, doodt monsters en helpt lanes.
                - Midlaner: Richt zich op flexibele mages of assassins.
                - ADC (Attack Damage Carry): Doet consistente schade vanuit de achterlinie.
                - Support: Helpt de ADC en biedt utility aan het team.',
            ],
            [
                'category_id' => $categories['Algemene vragen'],
                'question' => 'Hoe kies ik een geschikte champion?',
                'answer' => 'Kies een champion die past bij jouw speelstijl. Gebruik de gratis wekelijkse rotatie om verschillende rollen en champions te proberen. Champions zoals Garen en Ashe zijn perfect voor beginners.',
            ],
            [
                'category_id' => $categories['Algemene vragen'],
                'question' => 'Hoe werken ranked games?',
                'answer' => 'Ranked games zijn competitieve wedstrijden waarbij spelers LP verdienen of verliezen. De ranks variëren van Iron tot Challenger, en elk seizoen kun je je rank verbeteren door meer wedstrijden te winnen.',
            ],

            // Technische vragen
            [
                'category_id' => $categories['Technische vragen'],
                'question' => 'Hoeveel internetgebruik heeft League of Legends?',
                'answer' => 'League of Legends gebruikt ongeveer 20-25 MB aan data per game. Dit maakt het geschikt voor spelers met beperkte bandbreedte.',
            ],
            [
                'category_id' => $categories['Technische vragen'],
                'question' => 'Wat zijn de minimale systeemvereisten om League of Legends te spelen?',
                'answer' => 'Minimaal:
                - CPU: 2 GHz processor
                - RAM: 2 GB
                - GPU: DirectX 9-compatibel videokaart
                Aanbevolen:
                - Moderne CPU met minimaal 4 cores
                - 4 GB RAM of meer voor stabiele prestaties.',
            ],
            [
                'category_id' => $categories['Technische vragen'],
                'question' => 'Hoe los ik in-game lag of FPS-problemen op?',
                'answer' => 'Verlaag grafische instellingen in het spel.
                - Zorg ervoor dat je drivers up-to-date zijn.
                - Sluit achtergrondprogramma’s die veel CPU of netwerk gebruiken.
                - Gebruik een bekabelde internetverbinding voor stabiliteit.',
            ],

            // Account en veiligheid
            [
                'category_id' => $categories['Account en veiligheid'],
                'question' => 'Hoe beveilig ik mijn account tegen hackers?',
                'answer' => 'Gebruik tweefactorauthenticatie (2FA) en kies een sterk wachtwoord dat niet elders wordt gebruikt. Deel nooit je inloggegevens en wees alert op phishing e-mails.',
            ],
            [
                'category_id' => $categories['Account en veiligheid'],
                'question' => 'Wat moet ik doen als mijn account is gehackt?',
                'answer' => 'Neem direct contact op met Riot Support via hun officiële website. Verzamel bewijs van eigendom zoals oude wachtwoorden of betalingsgegevens om je account terug te krijgen.',
            ],
            [
                'category_id' => $categories['Account en veiligheid'],
                'question' => 'Wat gebeurt er als mijn account geblokkeerd wordt?',
                'answer' => 'Accounts kunnen worden geblokkeerd vanwege toxisch gedrag, cheats, of overtreding van de regels. Controleer de e-mail van Riot Games voor details. Neem contact op met Riot Support als je denkt dat de ban onterecht is.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
