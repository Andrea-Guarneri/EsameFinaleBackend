<?php

namespace Database\Seeders;

use App\Models\SerieTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class SerieTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SerieTv::create([

            "idSerie" => 1,
            "titolo" => "Stranger Thing",
            "descrizione" => "When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces and one strange little girl.",
            "numeroEpisodio" => 34,
            "totaleStagioni" => 5,
            "regista" => "Matt Duffer, Ross Duffer",
            "attori" => "Millie Bobby Brown, Finn Wolfhard, Winona Ryder",
            "annoInizio" => 2016,
            "srcImmagine" => "https://i.ytimg.com/vi/U9W85p8n-mE/maxresdefault.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/mnd7sFt5c3A",
            "srcBanner" => "https://images3.alphacoders.com/882/thumb-1920-882548.jpg"

        ]);
        SerieTv::create([

            "idSerie" => 2,
            "titolo" => "Dark",
            "descrizione" => "A family saga with a supernatural twist, set in a German town where the disappearance of two young children exposes the relationships among four families.",
            "numeroEpisodio" => 26,
            "totaleStagioni" => 3,
            "regista" => "Baran do Odar, Jantje Friese",
            "attori" => "Louis Hofmann, Karoline Eichhorn, Lisa Vicari",
            "annoInizio" => 2017,
            "srcImmagine" => "https://farofageek.com.br/wp-content/uploads/2020/06/wallpaper-de-dark-para-celular-800x445.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/rrwycJ08PSA",
            "srcBanner" => "https://images4.alphacoders.com/111/1118611.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 3,
            "titolo" => "The Sandman",
            "descrizione" => "Upon escaping after decades of imprisonment by a mortal wizard, Dream, the personification of dreams, sets about to reclaim his lost equipment.",
            "numeroEpisodio" => 10,
            "totaleStagioni" => 15,
            "regista" => "Neil Gaiman, David S. Goyer, Allan Heinberg",
            "attori" => "Tom Sturridge, Boyd Holbrook, Patton Oswalt",
            "annoInizio" => 2022,
            "srcImmagine" => "https://www.redbrick.me/wp-content/uploads/2022/08/sandman.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/ZJXamnPUm0I",
            "srcBanner" => "https://assets-prd.ignimgs.com/2022/08/05/sandman-1659699076597.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 4,
            "titolo" => "From",
            "descrizione" => "Unravel the mystery of a city in middle U.S.A. that imprisons everyone who enters. As the residents struggle to maintain a sense of normality and seek a way out, they must also survive the threats of the surrounding forest.",
            "numeroEpisodio" => 10,
            "totaleStagioni" => 2,
            "regista" => "John Griffin",
            "attori" => "Harold Perrineau, Catalina Sandino Moreno, Eion Bailey",
            "annoInizio" => 2022,
            "srcImmagine" => "https://fictionhorizon.com/wp-content/uploads/2023/04/From-Season-1-Recap-Ending-Explained-Get-Ready-for-Season-2.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/pDHqAj4eJcM",
            "srcBanner" =>  "https://tvseriesfinale.com/wp-content/uploads/2023/02/from08-scaled.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 5,
            "titolo" => "The Walking Dead: Daryl Dixon",
            "descrizione" => "Daryl's journey across a broken but resilient France as he hopes to find a way back home.",
            "numeroEpisodio" => 6,
            "totaleStagioni" => 1,
            "regista" => "David Zabel",
            "attori" => "Norman Reedus, Clémence Poésy, Laïka Blanc-Francard",
            "annoInizio" => 2023,
            "srcImmagine" => "https://m.media-amazon.com/images/S/pv-target-images/3b3bf446d19ae16e35939bf0cc1f2809c605cfe252aa757ea6d0e651d9d7091b.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/iTOaFootkSk",
            "srcBanner" => "https://images3.alphacoders.com/132/1321568.jpeg"
        ]);

        SerieTv::create([
            "idSerie" => 6,
            "titolo" => "Mayfair Witches",
            "descrizione" => "Follows a neurosurgeon who discovers she is the unlikely heir to a family of witches. She must contend with a sinister presence that has haunted her family for generations.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Anna Rice, Christopher Rice,",
            "attori" => "Alexandra Daddario, Tongayi Chirisa, Jack Huston",
            "annoInizio" => 2023,
            "srcImmagine" => "https://thathashtagshow.com/wp-content/uploads/2023/02/mayfair-witches-1280x640.png",
            "srcFilmato" => "https://www.youtube.com/embed/xscoUU7AeY8",
            "srcBanner" => "https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/7fd85c161749865.63ca2a2b9d22b.png"
        ]);

        SerieTv::create([
            "idSerie" => 7,
            "titolo" => "Yellowjackets",
            "descrizione" => "A wildly talented high school girls' soccer team become the unlucky survivors of a plane crash deep in the Canadian wilderness.",
            "numeroEpisodio" => 9,
            "totaleStagioni" => 2,
            "regista" => "Ashley Lyle, Bart Nickerson",
            "attori" => "Melanie Lynskey, Tawny Cypress, Sophie Nélisse",
            "annoInizio" => 2021,
            "srcImmagine" => "https://deliriumnerd.com/wp-content/uploads/2022/02/Yellowjackets-serie.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/lONCSd1Ao50",
            "srcBanner" => "https://www.sho.com/site/image-bin/images/1034344_2_0/1034344_2_0_01h_1920x1080.jpg"
        ]);

        SerieTv::create([
            "idSerie" => 8,
            "titolo" => "Fallout",
            "descrizione" => "In a future, post-apocalyptic Los Angeles brought about by nuclear decimation, citizens must live in underground bunkers to protect themselves from radiation, mutants and bandits.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Jonathan Nolan",
            "attori" => "Ella Purnell, Aaron Moten, Walton Goggins",
            "annoInizio" => 2024,
            "srcImmagine" => "https://cdn.mos.cms.futurecdn.net/r3rMKZge6NtmYVXzwNzCm6-1200-80.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/7vg6pexdW14",
            "srcBanner" => "https://www.teahub.io/photos/full/10-102940_fallout-4-full-hd-fallout-4.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 9,
            "titolo" => "House of the Dragon",
            "descrizione" => "An internal succession war within House Targaryen at the height of its power, 172 years before the birth of Daenerys Targaryen.",
            "numeroEpisodio" => 10,
            "totaleStagioni" => 1,
            "regista" => "Ryan J. Condal, George R.R. Martin",
            "attori" => "Rhys Ifans, Matt Smith, Graham McTavish",
            "annoInizio" => 2022,
            "srcImmagine" => "https://i.ibb.co/Vmwxf2K/1.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/DotnJ7tTA34",
            "srcBanner" => "https://images.wallpapersden.com/image/download/house-of-the-dragon-2022-season_bW1qZWeUmZqaraWkpJRmbmdlrWZlbWU.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 10,
            "titolo" => "The Last of Us",
            "descrizione" => "After a global pandemic destroys civilization, a hardened survivor takes charge of a 14-year-old girl who may be humanity's last hope.",
            "numeroEpisodio" => 9,
            "totaleStagioni" => 1,
            "regista" => "Neil Druckmann, Craig Mazin",
            "attori" => "Pedro Pascal, Bella Ramsey, Anna Torv",
            "annoInizio" => 2023,
            "srcImmagine" => "https://sejacriativo.com.br/wp-content/uploads/2023/07/how-to-watch-the-last-of-us_lead-1-scaled-1.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/uLtkt8BonwM",
            "srcBanner" => "https://images7.alphacoders.com/130/1305609.jpeg"

        ]);
        SerieTv::create([
            "idSerie" => 11,
            "titolo" => "Special Ops: Lioness",
            "descrizione" => "Joe attempts to balance her personal and professional life as the tip of the spear in the CIA's war on terror. She enlists Cruz, a female special operations Marine, as an undercover operative in the Lioness Program.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Taylor Sheridan",
            "attori" => "Zoe Saldana, Laysla De Oliveira, Dave Annable",
            "annoInizio" => 2023,
            "srcImmagine" => "https://www.avforums.com/styles/avf/editorial/block//caa92a4cf79d68a70811aae065ad2957_3x3.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/uEjcXhW7CXo",
            "srcBanner" => "https://images7.alphacoders.com/131/1314442.jpeg"

        ]);
        SerieTv::create([
            "idSerie" => 12,
            "titolo" => "Criminal Code",
            "descrizione" => "Follows the complex work of federal police officers in an unprecedented investigation that culminates in the beginning of a thread that unravels, like no other, the construction of crime in the country.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Heitor Dhalia, Leonardo Levis",
            "attori" => "Maeve Jinkings, Rômulo Braga, Thomas Aquino",
            "annoInizio" => 2023,
            "srcImmagine" => "https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/6AYY37jfdO6hpXcMjf9Yu5cnmO0/AAAABSA8WlBOU_Pk2s4HPgYIOw9gD8EOK3CxNPQWln_xhFbV8ubzTy_j2E8vwJWt9cSju3Bp1P0zUKysgEGxGrE8Vn8jbutQoD1AsTNN.jpg?r=872",
            "srcFilmato" => "https://www.youtube.com/embed/8IIJC-T4myo",
            "srcBanner" => "https://staticg.sportskeeda.com/editor/2023/11/374d6-16997123170785-1920.jpg"
        ]);

        SerieTv::create([
            "idSerie" => 13,
            "titolo" => "Halo",
            "descrizione" => "Aliens threaten human existence in an epic 26th-century showdown.",
            "numeroEpisodio" => 9,
            "totaleStagioni" => 1,
            "regista" => "Steven Kane, Kyle Killen",
            "attori" => "Pablo Schreiber, Shabana Azmi, Natasha Culzac",
            "annoInizio" => 2022,
            "srcImmagine" => "https://wwwimage-us.pplusstatic.com/base/files/seo/halo_social_1200x627_5.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/5KZ3MKraNKY",
            "srcBanner" => "https://images5.alphacoders.com/122/1226053.png"
        ]);

        SerieTv::create([
            "idSerie" => 14,
            "titolo" => "Blood Coast",
            "descrizione" => "A group of police officers with particular methods who track down a dangerous criminal in order to prevent Marseille from plunging into a bloodbath.",
            "numeroEpisodio" => 6,
            "totaleStagioni" => 1,
            "regista" => "Kamel Guemra",
            "attori" => "Jeanne Goursaud, Tewfik Jallab, Nicolas Duvauchelle",
            "annoInizio" => 2023,
            "srcImmagine" => "https://img.rgstatic.com/content/show/3648d9a3-d220-45a8-b6bb-c964db7c2ef5/backdrop-1920.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/QQyYHFIKvEs",
            "srcBanner" => "https://m.economictimes.com/thumb/msid-105868161,width-1600,height-900,resizemode-4,imgsize-75154/blood-coast-heres-episode-count-storyline-cast-rating-streaming-platform-and-more.jpg"
        ]);

        SerieTv::create([
            "idSerie" => 15,
            "titolo" => "Jujutsu Kaisen",
            "descrizione" => "A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a shaman's school to be able to locate the demon's other body parts and thus exorcise himself.",
            "numeroEpisodio" => 44,
            "totaleStagioni" => 2,
            "regista" => "Sunghoo Park",
            "attori" => "Junya Enoki, Yuma Uchida, Yûichi Nakamura",
            "annoInizio" => 2020,
            "srcImmagine" => "https://www.epicdope.com/wp-content/uploads/2022/11/Jujutsu-Kaisen-.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/pkKu9hLT-t8",
            "srcBanner" => "https://www.themoviedb.org/t/p/original/gmECX1DvFgdUPjtio2zaL8BPYPu.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 16,
            "titolo" => "Star Wars: The Clone Wars",
            "descrizione" => "Jedi Knights lead the Grand Army of the Republic against the droid army of the Separatists.",
            "numeroEpisodio" => 133,
            "totaleStagioni" => 7,
            "regista" => "George Lucas",
            "attori" => "Tom Kane, Dee Bradley Baker, Matt Lanter",
            "annoInizio" => 2008,
            "srcImmagine" => "https://disneyplusbrasil.com.br/wp-content/uploads/2020/10/Star-Wars-A-Guerra-dos-Clones.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/ZLW2jkd6E7g",
            "srcBanner" => "https://images8.alphacoders.com/112/1121348.jpg"
        ]);

        SerieTv::create([
            "idSerie" => 17,
            "titolo" => "Invincible",
            "descrizione" => "An adult animated series based on the Skybound/Image comic about a teenager whose father is the most powerful superhero on the planet.",
            "numeroEpisodio" => 16,
            "totaleStagioni" => 2,
            "regista" => "Robert Kirkman, Ryan Ottley, Cory Walker",
            "attori" => "Steven Yeun, J.K. Simmons, Sandra Oh",
            "annoInizio" => 2021,
            "srcImmagine" => "https://ntvb.tmsimg.com/assets/p19396751_b_h10_aj.jpg?w=1280&h=720",
            "srcFilmato" => "https://www.youtube.com/embed/-bfAVpuko5o",
            "srcBanner" => "https://images.squarespace-cdn.com/content/v1/51b3dc8ee4b051b96ceb10de/c8674383-cb64-477f-8b2d-abca1047f77d/invincible-season-2-gets-a-new-poster.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 18,
            "titolo" => "Arcane",
            "descrizione" => "Set in Utopian Piltover and the oppressed underground of Zaun, the story follows the origins of two iconic League Of Legends champions and the power that will tear them apart.",
            "numeroEpisodio" => 9,
            "totaleStagioni" => 2,
            "regista" => "Robert Kirkman, Ryan Ottley, Cory Walker",
            "attori" => "Hailee Steinfeld, Kevin Alejandro, Jason Spisak",
            "annoInizio" => 2021,
            "srcImmagine" => "https://www.riotgames.com/darkroom/1440/b540da2b9afe5ec83e842a2d84f6dbb1:e95535ecd35e48592908762c9353926a/arcane-final-poster-16x9-no-text-no-border.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/fXmAurh012s",
            "srcBanner" => "https://images6.alphacoders.com/118/thumb-1920-1188254.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 19,
            "titolo" => "Naruto: Shippuden",
            "descrizione" => "Naruto Uzumaki, is a loud, hyperactive, adolescent ninja who constantly searches for approval and recognition, as well as to become Hokage, who is acknowledged as the leader and strongest of all ninja in the village.",
            "numeroEpisodio" => 500,
            "totaleStagioni" => 29,
            "regista" => "Masashi Kishimoto",
            "attori" => "Alexandre Crepet, Junko Takeuchi, Maile Flanagan",
            "annoInizio" => 2007,
            "srcImmagine" => "https://blog.deagostini.com/wp-content/uploads/2023/02/naruto-cover.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/22R0j8UKRzY",
            "srcBanner" => "https://wallpapercave.com/wp/cQH49D8.jpg"

        ]);
        SerieTv::create([
            "idSerie" => 20,
            "titolo" => "Blue Eye Samurai",
            "descrizione" => "Driven by a dream of revenge against those who made her an outcast in Edo-period Japan, a young warrior cuts a bloody path toward her destiny.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Michael Green, Amber Noizumi",
            "attori" => "Maya Erskine, George Takei, Masi Oka",
            "annoInizio" => 2023,
            "srcImmagine" => "https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p25740020_b_h9_aa.jpg",
            "srcFilmato" => "https://www.youtube.com/embed/nJ1yQn17lbE",
            "srcBanner" => "https://images3.alphacoders.com/133/1338818.png"
        ]);

        SerieTv::create([
            "idSerie" => 21,
            "titolo" => "Gen V",
            "descrizione" => "From the world of 'The Boys comes 'Gen V', which explores the first generation of superheroes to know that their super powers are from Compound V. These heroes put their physical and moral boundaries to the test competing for the school's top ranking.",
            "numeroEpisodio" => 8,
            "totaleStagioni" => 1,
            "regista" => "Evan Goldberg, Eric Kripke, Craig Rosenberg",
            "attori" => "Jaz Sinclair, Chance Perdomo, Lizze Broadway",
            "annoInizio" => 2023,
            "srcImmagine" => "https://images6.alphacoders.com/132/1323290.jpeg",
            "srcFilmato" => "https://www.youtube.com/embed/mmkLMXN_lpI",
            "srcBanner" => "https://images3.alphacoders.com/133/1333206.jpeg"
        ]);
    }
}
