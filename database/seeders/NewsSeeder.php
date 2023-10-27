<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exampleUser = User::first();
        $pigeonUser = User::factory()->create();

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'unusual')->id,
            'title' => "Come back des pigeons ?",
            'summary' => "Les pigeons voyageurs, ça te parle ?
            Pigeon, c’est l’application qui te permet d’envoyer ton pigeon voyageur métaphorique récupérer des informations journalistiques aux quatre coins du monde.

            Dans une société où l’information surabonde et l’anxiété liée aux médias ne cesse de grandir, nous avons besoin de retourner à une consommation saine d’information.
            Mais par quel moyen ?

            Je te laisse te renseigner sur la fatigue informationnelle et sur l’application Pigeon grâce aux ressources disponibles juste en dessous :)
            ",
            'lat' => 44.836151,
            'lng' => -0.580816,
            'sources' => [
                [
                    'label' => 'L’information est devenue un puits sans fond',
                    'url' => 'https://www.ouest-france.fr/medias/ouest-france/le-grand-entretien/entretien-linformation-est-devenue-un-puits-sans-fond-et-ca-genere-de-langoisse-3358539c-c426-11ed-9add-012db42d5c37',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Plus sur la fatigue informationnelle',
                    'url' => 'https://www.radiofrance.fr/franceinter/podcasts/zoom-zoom-zen/zoom-zoom-zen-du-mardi-13-septembre-2022-2200476',
                ],
                [
                    'label' => "D'où ça sort la “la fatigue informationnelle” ?",
                    'url' => 'https://www.youtube.com/watch?v=8RYkszr5NIc',
                ],
                [
                    'label' => 'Les médias sociaux et la santé mentale',
                    'url' => 'https://www.youtube.com/watch?v=K8IAoPk2-Ik',
                ],
                [
                    'label' => 'Réseaux sociaux et démocratie',
                    'url' => 'https://www.youtube.com/watch?v=pnFw2nYt7lw',
                ],
                [
                    'label' => 'Le manque d’intérêt pour l’information',
                    'url' => 'https://la-rem.eu/2022/12/le-manque-dinteret-pour-linformation-un-autre-defi-a-relever-pour-les-journalistes/',
                ],
                [
                    'label' => 'Activation du “mode moine”',
                    'url' => 'https://www.bbc.com/afrique/articles/c807dldl157o',
                ],
            ],
        ]);

        News::create([
            'user_id' => $exampleUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'geopolitics')->id,
            'title' => 'Cop28 à Dubaï',
            'summary' => 'La Cop28 se tiendra du 30 novembre au 12 décembre 2023 à Dubaï. Elle a déjà du plomb dans l’aile. La nomination ce jeudi 12 janvier à sa présidence de Sultan Al Jaber, PDG de la principale compagnie pétrolière des Émirats Arabes Unis, envoie un signal inquiétant.',
            'lat' => 25.276987,
            'lng' => 55.296249,
            'sources' => [
                [
                    'label' => 'Ouest France',
                    'url' => 'https://www.ouest-france.fr/environnement/rechauffement-climatique/climat-presidee-par-un-magnat-du-petrole-la-prochaine-cop28-a-dubai-est-elle-encore-credible-c86a8072-9262-11ed-ab73-c9410301d337',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Les COP - Wikipédia',
                    'url' => 'https://fr.wikipedia.org/wiki/Conf%C3%A9rence_des_Parties',
                ],
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'geopolitics')->id,
            'title' => "L'ex-Premier ministre chinois Li Keqiang meurt à 68 ans",
            'summary' => "L'ex-Premier ministre chinois Li Keqiang, en poste de 2013 à 2023 mais éclipsé par la toute puissance du président Xi Jinping, est mort vendredi à 68 ans d'une crise cardiaque.",
            'lat' => 31.224361,
            'lng' => 121.469170,
            'sources' => [
                [
                    'label' => 'Le point',
                    'url' => 'https://www.lepoint.fr/monde/l-ex-premier-ministre-chinois-li-keqiang-meurt-a-68-ans-27-10-2023-2540939_24.php',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Sa page Wikipédia',
                    'url' => 'https://fr.wikipedia.org/wiki/Li_Keqiang',
                ],
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'sport')->id,
            'title' => "Le premier match de Victor Wembanyama en NBA charme les supporters américains",
            'summary' => "La pépite française du basket, Victor Wembanyama, a joué son premier match de NBA dans la nuit de mercredi à jeudi. Une rencontre disputée devant près de 19 000 spectateurs.",
            'lat' => 29.426944,
            'lng' => -98.437500,
            'sources' => [
                [
                    'label' => 'FranceTv Info',
                    'url' => 'https://www.francetvinfo.fr/sports/basket/victor-wembanyama/reportage-c-est-le-wemby-qu-on-veut-le-premier-match-de-victor-wembanyama-en-nba-charme-les-supporters-americains_6145668.html',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Sa page Wikipédia',
                    'url' => 'https://fr.wikipedia.org/wiki/Victor_Wembanyama',
                ],
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'sport')->id,
            'title' => "Le Parlement brésilien demande l’ouverture d’une enquête contre l’ex-président Jair Bolsonaro pour tentative de coup d’Etat",
            'summary' => "Il appartient au bureau du procureur général de décider de poursuivre M. Bolsonaro pour des « attaques perpétrées contre les institutions », qui ont culminé avec les émeutes de Brasilia en janvier 2023. S’il est reconnu coupable, il encourra jusqu’à vingt-neuf ans de prison, selon les parlementaires.",
            'lat' => -15.799717,
            'lng' => -47.864131,
            'sources' => [
                [
                    'label' => 'Le Monde',
                    'url' => 'https://www.lemonde.fr/international/article/2023/10/19/le-parlement-bresilien-demande-l-ouverture-d-une-enquete-contre-l-ex-president-bolsonaro-pour-tentative-de-coup-d-etat_6195255_3210.html',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Sa page Wikipédia',
                    'url' => 'https://fr.wikipedia.org/wiki/Jair_Bolsonaro',
                ],
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'environment')->id,
            'title' => "L’Australie va reprendre l’abattage des chevaux sauvages par hélicoptère pour protéger la faune et la flore",
            'summary' => "Les autorités de l’Etat de Nouvelle-Galles du Sud veulent réduire le nombre des chevaux sauvages à 3 000 d’ici à la mi-2027. Cette mesure, jugée nécessaire pour protéger la faune et la flore, risque aussi de faire polémique.",
            'lat' => -36.072222,
            'lng' => 148.348611,
            'sources' => [
                [
                    'label' => 'Le Monde',
                    'url' => 'https://www.lemonde.fr/international/article/2023/10/27/l-australie-va-reprendre-l-abattage-par-helicoptere-des-chevaux-sauvages-pour-proteger-la-faune-et-la-flore_6196789_3210.html',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Cheval Brumby',
                    'url' => 'https://fr.wikipedia.org/wiki/Brumby',
                ],
                [
                    'label' => "Lutte contre l'abattage",
                    'url' => 'https://loopsider.com/fr/video/elle-lutte-pour-la-fin-de-labattage-des-chevaux-australiens',
                ],
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'sport')->id,
            'title' => "Football : au Sénégal, les malentendants s’emparent du ballon rond",
            'summary' => "« L’Afrique au centre du jeu » (4/4). Championne d’Afrique en 2021, l’équipe nationale des sourds vient de décrocher la médaille de bronze lors du Mondial en Malaisie.",
            'lat' => 2.956328,
            'lng' => 101.725075,
            'sources' => [
                [
                    'label' => 'Le Monde',
                    'url' => 'https://www.lemonde.fr/afrique/article/2023/10/26/football-au-senegal-les-malentendants-s-emparent-du-ballon-rond_6196668_3212.html',
                ],
            ],
            'resources' => [
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'sport')->id,
            'title' => "En Afrique du Sud, le « mamie foot » change le regard sur le grand âge",
            'summary' => "« L’Afrique au centre du jeu » (3/4). Selon la pionnière Mama Beka, qui a organisé une Coupe du monde des mamies dans son village de Nkowankowa, le pays compte aujourd’hui quelque 200 équipes de grands-mères.",
            'lat' => -23.888400,
            'lng' => 30.292310,
            'sources' => [
                [
                    'label' => 'Le Monde',
                    'url' => 'https://www.lemonde.fr/afrique/article/2023/10/25/en-afrique-du-sud-le-mamie-foot-change-le-regard-sur-le-grand-age_6196474_3212.html',
                ],
            ],
            'resources' => [
            ],
        ]);

        News::create([
            'user_id' => $pigeonUser->id,
            'news_category_id' => NewsCategory::firstWhere('name', 'sport')->id,
            'title' => "Canada : Les peuples autochtones remportent une victoire historique",
            'summary' => "Le gouvernement fédéral canadien va devoir payer 16 milliards d'euros d'indemnisation à 300 000 enfants et à leurs familles, victimes de discrimination raciale.",
            'lat' => 45.425060,
            'lng' => -75.699829,
            'sources' => [
                [
                    'label' => 'FranceTv Info',
                    'url' => 'https://www.francetvinfo.fr/replay-radio/un-monde-d-avance/canada-les-peuples-autochtones-remportent-une-victoire-historique_6114021.html',
                ],
            ],
            'resources' => [
                [
                    'label' => 'Vidéo sur les pensionnats autochtones',
                    'url' => 'https://information.tv5monde.com/international/les-pensionnats-autochtones-le-crime-dont-le-canada-peine-se-remettre-35826',
                ],
                [
                    'label' => 'Vidéo sur les enfants autochtones',
                    'url' => 'https://information.tv5monde.com/international/enfants-autochtones-les-oublies-du-canada-24286',
                ],
            ],
        ]);
    }
}
