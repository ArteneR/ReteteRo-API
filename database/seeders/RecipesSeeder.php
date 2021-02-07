<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;


class RecipesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                // Recipe #1
                Recipe::create([
                        'title'              => 'Pui marinat cu sos condimentat de rosii cu iaurt',
                        'author_id'          => 3,
                        'description'        => 'Cina. Sambata. Arome indiene. Sosul mi-nu-nat!',
                        'time'               => '45 min',
                        'difficulty'         => 'medium',
                        'portions'           => 4,
                        'ingredients'        => '[
                            {
                                "quantity": 4,
                                "unit": "piece",
                                "ingredient": "pulpe intregi de pui",
                                "order": 1
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "cutie mica de iaurt grecesc (150g)",
                                "order": 2
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "lingura ulei",
                                "order": 3
                            },
                            {
                                "quantity": 500,
                                "unit": "ml",
                                "ingredient": "apa",
                                "order": 4
                            }
                        ]',
                        'preparation_method' => '[
                            {
                                "direction": "In blender/robot se pun 2 linguri generoase de iaurt si toate ingredientele pana la turmeric, inclusiv. Se mixeaza pana aveti o pasta galbuie.",
                                "order": 1
                            },
                            {
                                "direction": "Puiul se abosoarbe cu servetele de hartie si se presara generos cu sare si piper negru. Se toarna marinata de iaurt si se maseaza peste tot. Se acopera cu folie si se da la frigider minim 4 ore.",
                                "order": 2
                            },
                            {
                                "direction": "Scoateti carnea marinata din frigider cu 1/2 ora inainte de preparare.",
                                "order": 3
                            },
                            {
                                "direction": "Se aseaza carnea intr-un vas termorezistent in care sa intre pe un singur strat. Se coace carnea la 220C timp de 45-55 minute (daca folisiti pulpe; sau 1 ora si 20 minute daca folositi pui intreg). Tot la 20 minute ungeti carnea cu sucul lasat in tava.",
                                "order": 4
                            },
                            {
                                "direction": "Cat se face carnea fierbeti orezul conform instructiunilor de pe pachet. Cand e gata il strecurati, il sarati si adaugati chives tocat marunt.",
                                "order": 5
                            }
                        ]'
                ]);


                // Recipe #2
                Recipe::create([
                        'title'              => 'Muschiulet de vita cu salsa de porumb si cartofi dulci',
                        'author_id'          => 3,
                        'description'        => 'Pranzul cowboy-lor... in imagintia mea.',
                        'time'               => '60 min',
                        'difficulty'         => 'medium',
                        'portions'           => 5,
                        'ingredients'        => '[
                            {
                                "quantity": 4,
                                "unit": "piece",
                                "ingredient": "stiuleti de porumb (pentru fiert)",
                                "order": 1
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "ceapa rosie mai mica",
                                "order": 2
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "avocado",
                                "order": 3
                            },
                            {
                                "quantity": 2,
                                "unit": "piece",
                                "ingredient": "linguri suc de lime",
                                "order": 4
                            },
                            {
                                "quantity": 2,
                                "unit": "piece",
                                "ingredient": "linguri ulei",
                                "order": 5
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "lingurita fulgi de chili",
                                "order": 6
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "sare",
                                "order": 7
                            }
                        ]',
                        'preparation_method' => '[
                            {
                                "direction": "Se taie cu cutitul boabele de pe stiuleti. Practic se tin vertical si cu un cutit ascutit treceti de sus in jos, pe toata lungimea stiuletului astfel incat sa taiati boabele pana la cotor.",
                                "order": 1
                            },
                            {
                                "direction": "Se presara boabele de porumb cu sare si chili. Se adauga 1 lingura de ulei si se amesteca bine. Se intind in strat uniform in tava cuptorului.",
                                "order": 2
                            },
                            {
                                "direction": "Se coace porumbul la 220C timp de 30 minute, amestecand la fiecare 10 minute.",
                                "order": 3
                            },
                            {
                                "direction": "Cat se face porumbul se toaca ceapa cubulete marunte. Se presara cu sare. Se lasa sa stea 10 minute. Se adauga sucul de lime si se lasa sa se macereze inca 15 minute. Se taie avocado cubulete si se adauga peste ceapa. Se amesteca usor, sucul de lime va preveni oxidarea.",
                                "order": 4
                            },
                            {
                                "direction": "Cand porumbul e gata, se scoate si se lasa sa se racoreasca.",
                                "order": 5
                            },
                            {
                                "direction": "Se incinge timp de 5 minute o tigaie grill. Se coc ardeii pe tigaia incinsa, intorcandu-i sa se faca pe toate partile. Dureaza cam 10 minute sa fie gata, rumeni.",
                                "order": 6
                            },
                            {
                                "direction": "Se scot ardeii intr-un bol si se presara cu sare grunjoasa si se picura foarte putin ulei de masline.",
                                "order": 7
                            },
                            {
                                "direction": "In tigaia grill deja incinsa se aseaza feliile de muschiulet si se fac cate 1 minut / parte, pana prinde urme frumoase de gratar (pentru medium-rare).",
                                "order": 8
                            },
                            {
                                "direction": "Porumbul se pune peste ceapa cu avocado, se amesteca si se drege de sare. Se adauga 1/2 lingura ulei de masline.",
                                "order": 9
                            },
                            {
                                "direction": "Se scoate carnea pe platoul de servire si se presara cu sare grunjoasa si se rasneste putin piper negru. Alaturi se aseaza cartofii dulci copti. Se presara 2-3 linguri de salsa printre ele. Se decoreaza platoul cu cativa ardei copti. Se serveste imediat, cu restul de salsa si ardei copti alaturi.",
                                "order": 10
                            }
                        ]'
                ]);


                // Recipe #3
                Recipe::create([
                        'title'              => 'Vita cu legume la cuptor',
                        'author_id'          => 3,
                        'description'        => 'Daca sunteti deja fani ai acestei tocanite de pui, atunci sigur o sa va placa si reteta de azi. Aceeasi idee simpla: doar se aseaza ingredientele in straturi in tava (fara prajire, sotare...) si se uita la cuptor pana e gata. Weekendul care vine o repet, dar trebuie cantitate mai mare, de abia i-am prins gustul. Reteta din care m-am inspirat o gasiti aici.',
                        'time'               => '45 min',
                        'difficulty'         => 'medium',
                        'portions'           => 5,
                        'ingredients'        => '[
                            {
                                "quantity": 500,
                                "unit": "g",
                                "ingredient": "ceafa de vita (sau antricot)",
                                "order": 2
                            },
                            {
                                "quantity": 500,
                                "unit": "g",
                                "ingredient": "cartofi",
                                "order": 2
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "ardei kapia rosu (cca 150 gr)",
                                "order": 3
                            },
                        ]',
                        'preparation_method' => '[
                            {
                                "direction": "Vita se taie cuburi sau fasii cate o imbucatura. Ceapa se toaca cubulete. Ardeii se taie cubulete. Usturoiul se taie felii. Rosiile se taie bucati. Se curata si se taie cartofii cuburi cam de dimensiunea bucatilor de carne. Se toaca marunt patrunjelul.",
                                "order": 1
                            },
                            {
                                "direction": "Intr-o tava termorezistenta se pun 2 linguri de ulei. Se adauga bucatile de vita si se amesteca sa se acopere cu ulei. Se disperseaza pe fundul tavii in strat egal. Se presara cu sare si piper negru.",
                                "order": 2
                            },
                            {
                                "direction": "Se presara apoi jumatate din ceapa, ardei si usturoi. Se pune un strat de cartofi. Se presara iar cu sare si piper. Se presara acum si oregano sfaramat intre degete si patrunjelul tocat.",
                                "order": 3
                            }
                        ]'
                ]);


                // Recipe #4
                Recipe::create([
                        'title'              => 'Muschiulet marinat la gratar cu spanac',
                        'author_id'          => 3,
                        'description'        => 'Vineri e 1 Mai! Punem de-un gratar indoor. Fiindca #maistamacasa... inca putin.',
                        'time'               => '75 min',
                        'difficulty'         => 'medium',
                        'portions'           => 5,
                        'ingredients'        => '[
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "muschiulet de porc (cca 500 gr)",
                                "order": 1
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "lingura pasta de ardei",
                                "order": 2
                            },
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "lingura pasta de rosii",
                                "order": 3
                            }
                        ]',
                        'preparation_method' => '[
                            {
                                "direction": "Muschiuletul se usca bine cu servetele si apoi se taie felii groase de aprox. 3 cm. Partea subtire dinspre varf o lasati intreaga, nu o feliati. Se presara cu sare si piper negru.",
                                "order": 1
                            },
                            {
                                "direction": "Se amesteca restul ingredientelor pentru marinata si se toarna peste carne. Se maseaza bine si se lasa sa stea la frigider macar 3-4 ore, dar poate sta si peste noapte.",
                                "order": 2
                            },
                            {
                                "direction": "Se scoate carnea inainte de a o prepara si se lasa sa revina la temperatura camerei, cca 30 minute.",
                                "order": 3
                            }
                        ]'
                ]);

        }
}
