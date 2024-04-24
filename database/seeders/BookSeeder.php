<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table(table: 'books')->insert(values: [
            'title' => 'Orgueil et Préjugés',
            'image' => 'Orgueil_et_Préjugés.jpg',
            'author' => 'Victor Hugo',
            'user_id' => 1,
            'price' => 2640,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de la famille Bennet et de l'amour contrarié entre Elizabeth Bennet et Mr. Darcy."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Les Misérables',
            'image' => 'Les_Misérables.jpg',
            'author' => 'Victor Hugo',
            'user_id' => 1,
            'price' => 3000,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de Jean Valjean, un ancien bagnard, et de son parcours pour trouver la rédemption."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Cent ans de solitude',
            'image' => 'Cent_ans_de_solitude.jpg',
            'author' => 'Gabriel García Márquez',
            'user_id' => 1,
            'price' => 2400,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de la famille Buendía à Macondo, une ville fictive en Amérique latine, sur plusieurs générations."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Petit Prince',
            'image' => 'Le_Petit_Prince.jpg',
            'author' => 'Antoine de Saint Exupéry',
            'user_id' => 1,
            'price' => 1680,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Les rencontres du Petit Prince avec différents personnages sur des planètes pour découvrir le sens de la vie."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Les Enfants du Nouveau Monde',
            'image' => 'Les_Enfants_du_Nouveau_Monde.jpg',
            'author' => 'Assia Djebar',
            'user_id' => 1,
            'price' => 2880,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de plusieurs femmes algériennes qui luttent pour leur liberté et leur identité dans une société en évolution."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Les Vigiles',
            'image' => 'Les_Vigiles.jpg',
            'author' => 'Tahar Djaout',
            'user_id' => 1,
            'price' => 1992,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman qui explore les thèmes de la répression politique et de la quête de liberté en Algérie."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Nedjma',
            'image' => 'Nedjma.jpg',
            'author' => 'Kateb Yacine',
            'user_id' => 1,
            'price' => 2640,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de Nedjma, une jeune femme algérienne, et de son impact sur quatre hommes qui l'aiment."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'L\'Étranger',
            'image' => 'L_Étranger.jpg',
            'author' => 'Albert Camus',
            'user_id' => 1,
            'price' => 1920,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de Meursault, un homme indifférent aux normes sociales, confronté à l'absurdité de la vie en Algérie"

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'La Nuit de l\'iguane',
            'image' => 'La_Nuit_de_l_iguane.jpg',
            'author' => 'Tahar Djaout',
            'user_id' => 1,
            'price' => 2350,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire de l'Algérie post-indépendance à travers le regard d'un homme confronté à la violence et à la répression."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Fils du pauvre',
            'image' => 'Le_Fils_du_pauvre.jpg',
            'author' => 'Mouloud Feraoun',
            'user_id' => 1,
            'price' => 1680,
            'quantity' => rand(min: 10, max: 90),
            'description' => "L'histoire autobiographique de l'auteur, Mouloud Feraoun, qui raconte son enfance et sa vie dans un village kabyle en Algérie. Le roman aborde des thèmes tels que la pauvreté, l'éducation et la lutte pour s'améliorer."

        ]);
        /* -----------------------------------------------SCIENCE_FICTION--------------------------------------*/

        DB::table(table: 'books')->insert(values: [
            'title' => 'Zabor ou les psaumes',
            'image' => 'Zabor_ou_les_psaumes.jpg',
            'author' => 'Kamel Daoud',
            'user_id' => 1,
            'price' => 4320,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Bien que davantage un roman contemporain, il contient des éléments de conte et de mystère qui pourraient plaire aux amateurs de science-fiction."

        ]);
        /*------------- ROMAN et SCIENCE_FICTION---------*/
        DB::table(table: 'books')->insert(values: [
            'title' => 'Alger la noire',
            'image' => 'Alger_la_noire.jpg',
            'author' => 'Maurice Attia',
            'user_id' => 1,
            'price' => 2600,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman noir teinté de science-fiction, situé dans un Alger dystopique et futuriste."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Binti',
            'image' => 'Binti.jpg',
            'author' => 'Nnedi Okorafor',
            'user_id' => 1,
            'price' => 3360,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre d'une trilogie de science-fiction sur une jeune fille africaine qui se retrouve au centre d'un conflit interstellaire."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Rosewater',
            'image' => 'Rosewater.jpg',
            'author' => 'Tade Thompson',
            'user_id' => 1,
            'price' => 4600,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre d'une trilogie de science-fiction qui se déroule dans un futur proche au Nigeria, où une ville se reconstruit autour d'une mystérieuse biodôme extraterrestre."

        ]);
        /*------------- ROMAN et SCIENCE_FICTION---------*/
        DB::table(table: 'books')->insert(values: [
            'title' => 'Azanian Bridges',
            'image' => 'Azanian_Bridges.jpg',
            'author' => 'Nick Wood',
            'user_id' => 1,
            'price' => 5500,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman uchronique qui imagine un monde où l'apartheid en Afrique du Sud n'a jamais pris fin, mais où des ponts entre les mondes existent."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Ubik',
            'image' => 'Ubik.jpg',
            'author' => 'Philip K.Dick',
            'user_id' => 1,
            'price' => 2100,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman qui explore la réalité subjective et les concepts de vie et de mort à travers une intrigue de science-fiction."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Dune',
            'image' => 'Dune.jpg',
            'author' => ' Frank Herbert',
            'user_id' => 1,
            'price' => 2060,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un classique de la science-fiction qui se déroule sur une planète désertique où se mêlent politique, religion et écologie."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Neuromancien',
            'image' => 'Neuromancien.jpg',
            'author' => 'William Gibson',
            'user_id' => 1,
            'price' => 2350,
            'quantity' => rand(min: 10, max: 90),
            'description' => " "

        ]);
        DB::table(table: 'books')->insert(values: [
            'title' => 'Fondation',
            'image' => 'Fondation.jpg',
            'author' => 'Isaac Asimov',
            'user_id' => 1,
            'price' => 2450,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Premier livre de la trilogie classique d'Asimov, racontant l'histoire d'un empire galactique en déclin et des efforts pour le sauver de la chute inévitable."

        ]);
        DB::table(table: 'books')->insert(values: [
            'title' => 'Fahrenheit 451',
            'image' => 'Fahrenheit_451.jpg',
            'author' => 'Ray Bradbury',
            'user_id' => 1,
            'price' => 1580,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Une nouvelle qui explore une société future où les livres sont interdits et brûlés, et où la pensée critique est supprimée."
        ]);

        /* -----------------------------------------------POLICIER et THRILLER--------------------------------------*/
        DB::table(table: 'books')->insert(values: [
            'title' => 'La Fille du train',
            'image' => 'La_Fille_du_train.jpg',
            'author' => 'Paula Hawkins',
            'user_id' => 1,
            'price' => rand(min: 1000, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un thriller psychologique qui suit les vies entrelacées de trois femmes, dont l'une devient témoin d'un crime depuis son train quotidien."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Gone Girl',
            'image' => 'Gone_Girl.jpg',
            'author' => 'Gillian Flynn',
            'user_id' => 1,
            'price' => rand(min: 1000, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un thriller domestique qui explore le mariage et la manipulation à travers l'histoire de la disparition d'une femme et les secrets qui en découlent."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Shutter Island',
            'image' => 'Shutter_Island.jpg',
            'author' => 'Dennis Lehane',
            'user_id' => 1,
            'price' => 2400,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un thriller psychologique qui se déroule sur une île psychiatrique où un enquêteur enquête sur la disparition mystérieuse d'une patiente."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Sacrifices',
            'image' => 'Sacrifices.jpg',
            'author' => 'Pierre Lemaitre',
            'user_id' => 1,
            'price' => rand(min: 1000, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un thriller qui suit une série de meurtres mystérieux à Paris et les efforts d'un commissaire de police pour arrêter le tueur."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Dernier Lapon',
            'image' => 'Le_Dernier_Lapon.jpg',
            'author' => 'Olivier Truc',
            'user_id' => 1,
            'price' => 2430,
            'quantity' => rand(min: 10, max: 90),
            'description' => " Un roman policier qui se déroule en Laponie et suit l'enquête d'un policier français et d'un journaliste suédois sur la disparition d'un éleveur de rennes."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'La Ligne verte',
            'image' => 'La_Ligne_verte.jpg',
            'author' => 'Stephen King',
            'user_id' => 1,
            'price' => rand(min: 1000, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman qui suit les vies entrelacées des détenus et des gardiens d'une prison en Louisiane, centré sur un homme accusé à tort de meurtre."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Mystic River',
            'image' => 'Mystic_River.jpg',
            'author' => 'Dennis Lehane',
            'user_id' => 1,
            'price' => 2000,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman policier qui explore les conséquences de la violence sur une communauté ouvrière de Boston après la disparition d'une jeune fille."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'misery',
            'image' => 'misery.jpg',
            'author' => 'stephen king',
            'user_id' => 1,
            'price' => rand(min: 1000, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un thriller psychologique qui suit un écrivain capturé par sa plus grande fan après un accident de voiture."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Dahlia noir',
            'image' => 'Le_Dahlia_noir.jpg',
            'author' => 'James Ellroy',
            'user_id' => 1,
            'price' => 2160,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman noir basé sur l'affaire du Dahlia noir, qui suit l'enquête sur le meurtre brutal d'une jeune femme à Los Angeles dans les années 1940."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Les Rivières pourpres',
            'image' => 'Les_Rivières_pourpres.jpg',
            'author' => 'Jean-Christophe Grangé',
            'user_id' => 1,
            'price' => 2200,
            'quantity' => rand(min: 10, max: 90),
            'description' => " Un thriller qui suit deux enquêteurs français alors qu'ils tentent de résoudre une série de meurtres mystérieux dans les Alpes françaises."
        ]);

        /* -----------------------------------------------FANTASY--------------------------------------*/

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Seigneur des Anneaux',
            'image' => 'Le_Seigneur_des_Anneaux.jpg',
            'author' => 'J.R.R.Tolkien',
            'user_id' => 1,
            'price' => 4800,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Une épopée fantastique qui suit la quête de Frodon pour détruire l'Anneau unique et vaincre le Seigneur des Ténèbres, Sauron."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Eragon',
            'image' => 'Eragon.jpg',
            'author' => 'Christopher Paolini',
            'user_id' => 1,
            'price' => 2350,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la série L\"'Héritage\", qui suit un jeune fermier nommé Eragon alors qu'il découvre un dragon et se lance dans une quête pour renverser un empire maléfique."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Les Annales du Disque-Monde : La Huitième Couleur',
            'image' => 'Les_Annales_du_Disque-Monde_La Huitième Couleur.jpg',
            'author' => 'Terry Pratchett',
            'user_id' => 1,
            'price' => 1980,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la série \"Les Annales du Disque-Monde\", qui se déroule dans un monde plat porté par quatre éléphants sur le dos d'une tortue géante, et qui parodie les conventions de la fantasy."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'A la croisée des mondes : Les Royaumes du Nord',
            'image' => 'A_la_croisée_des_mondes_Les_Royaumes_du_Nord.jpg',
            'author' => 'Philip Pullman',
            'user_id' => 1,
            'price' => 2230,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la trilogie \"A la croisée des mondes\", qui suit l'aventure de la jeune Lyra alors qu'elle découvre des mondes parallèles et se lance dans une quête épique pour sauver son univers."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'L\'Enfant de poussière',
            'image' => 'L_Enfant_de_poussière.jpg',
            'author' => 'Patrick K.Dewdney',
            'user_id' => 1,
            'price' => 4400,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la trilogie \"La Malédiction d'Old Haven\", qui se déroule dans un univers de fantasy inspiré de l'Afrique et suit les aventures de Nils, un jeune garçon aux pouvoirs mystérieux."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Qui a peur de la mort ?',
            'image' => 'Qui_a_peur_de_la_mort.jpg',
            'author' => 'Nnedi Okorafor',
            'user_id' => 1,
            'price' => 3400,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman de fantasy qui mêle mystère, aventure et exploration culturelle dans un futur où les frontières entre la vie et la mort sont floues."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'The Way of Kings',
            'image' => 'The_Way_of_Kings.jpg',
            'author' => 'Brandon Sanderson',
            'user_id' => 1,
            'price' => 3120,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la série \"The Stormlight Archive\", qui se déroule dans un monde où des tempêtes magiques ravagent régulièrement la terre, et suit les destins croisés de plusieurs personnages."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'The Lies of Locke Lamora',
            'image' => 'The_Lies_of_Locke_Lamora.jpg',
            'author' => 'Scott Lynch',
            'user_id' => 1,
            'price' => 2380,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la série \"Gentleman Bastard\", qui suit les aventures de Locke Lamora, un voleur et escroc de génie, dans une ville pleine de mystères et de dangers."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'American Gods',
            'image' => 'American_Gods.jpg',
            'author' => 'Neil Gaiman',
            'user_id' => 1,
            'price' => 2400,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Un roman qui mêle la mythologie ancienne et la culture moderne américaine, suivant l'ancien dieu Odin alors qu'il affronte les nouveaux dieux de la technologie et de la médias."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'The Poppy War',
            'image' => 'The_Poppy_War.jpg',
            'author' => ' R.F.Kuang',
            'user_id' => 1,
            'price' => 3300,
            'quantity' => rand(min: 10, max: 90),
            'description' => " Le premier livre de la série \"The Poppy War\", qui s'inspire de l'histoire de la Chine et suit une jeune femme ordinaire qui devient une guerrière redoutable dans une guerre dévastatrice."
        ]);

        /* -----------------------------------------------JEUNESSE--------------------------------------*/

        DB::table(table: 'books')->insert(values: [
            'title' => 'The Hunger Games',
            'image' => 'The_Hunger_Games.jpg',
            'author' => 'Suzanne Collins',
            'user_id' => 1,
            'price' => 2040,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Le premier livre de la trilogie The Hunger Games, qui se déroule dans un monde dystopique où des adolescents sont forcés de s'affronter dans une arène pour divertir les masses."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Harry Potter à l\'école des sorciers',
            'image' => 'Harry_Potter_à_l_école_des_sorciers.jpg',
            'author' => 'J.K.Rowling',
            'user_id' => 1,
            'price' => rand(min: 1900, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Harry Potter découvre qu'il est un sorcier et est invité à rejoindre Poudlard, une école de magie. Là, il se fait des amis, apprend la vérité sur la mort de ses parents et affronte le sorcier maléfique Voldemort."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Le Petit Prince',
            'image' => 'Le_Petit_Prince.jpg',
            'author' => 'Antoine de Saint Exupéry',
            'user_id' => 1,
            'price' => 1680,
            'quantity' => rand(min: 10, max: 90),
            'description' => "Les rencontres du Petit Prince avec différents personnages sur des planètes pour découvrir le sens de la vie."

        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Matilda',
            'image' => 'Matilda.jpg',
            'author' => 'Roald Dahl',
            'user_id' => 1,
            'price' => rand(min: 1900, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Matilda est une petite fille surdouée qui aime lire et apprendre, mais doit faire face à une famille négligente et à une directrice d'école cruelle. Elle découvre finalement qu'elle a des pouvoirs télékinésiques et utilise son intelligence pour se venger de ceux qui lui ont fait du mal."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Alice au pays des merveilles',
            'image' => 'Alice_au_pays_des_merveilles.jpg',
            'author' => 'Lewis Carroll',
            'user_id' => 1,
            'price' => rand(min: 1900, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Alice tombe dans un terrier de lapin et se retrouve dans un monde fantastique où elle rencontre des personnages étranges comme le Chapelier fou et le Chat du Cheshire. Le livre explore les thèmes de l'absurdité et de l'imagination."
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => '',
            'image' => '',
            'author' => '',
            'user_id' => 1,
            'price' => rand(min: 1900, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => ""
        ]);

        DB::table(table: 'books')->insert(values: [
            'title' => 'Charlie et la chocolaterie',
            'image' => 'Charlie_et_la_chocolaterie.jpg',
            'author' => 'Roald Dahl',
            'user_id' => 1,
            'price' => rand(min: 1900, max: 5500),
            'quantity' => rand(min: 10, max: 90),
            'description' => "Une histoire magique sur un garçon qui gagne un ticket d'or pour visiter la fabrique de chocolat du mystérieux Willy Wonka. Le livre explore les thèmes de la gourmandise, de l'égoïsme et de la générosité."
        ]);

        DB::table('books')->insert([
            'title' => 'Les Aventures de Tom Sawyer',
            'image' => 'Les_Aventures_de_Tom_Sawyer.jpg',
            'author' => 'Mark Twain',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Les aventures d'un garçon espiègle du sud des États-Unis, Tom Sawyer, qui vit des aventures passionnantes avec son ami Huckleberry Finn, comme la chasse au trésor et la lutte contre l'injustice."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Le Fantôme de l\'Opéra',
            'image' => 'Le_Fantome_de_l_Opera.jpg',
            'author' => 'Gaston Leroux',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "L'histoire d'un fantôme qui hante l'Opéra de Paris et tombe amoureux d'une chanteuse. Le livre explore les thèmes de l'amour, de la beauté et de l'obsession."
        ]);

        DB::table('books')->insert(values: [
            'title' => 'Demain j\'arrête !',
            'image' => 'Demain_j_arrete.jpg',
            'author' => 'Gilles Legardinier',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une comédie romantique légère qui aborde la quête du bonheur et les relations amoureuses."
        ]);


        /* -----------------------------------------------BIOGRAPHIE--------------------------------------*/

        DB::table('books')->insert(values: [
            'title' => 'Steve Jobs',
            'image' => 'Steve_Jobs.jpg',
            'author' => 'Walter Isaacson',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du co-fondateur d'Apple, Steve Jobs, qui explore sa vie personnelle, sa carrière et son impact sur l'industrie technologique."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Elon Musk : Tesla, PayPal, SpaceX - l\'entrepreneur qui va changer le monde',
            'image' => 'Elon_Musk.jpg',
            'author' => 'Ashlee Vance',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du célèbre entrepreneur Elon Musk, qui retrace sa vie, sa carrière et ses projets ambitieux."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Nelson Mandela : Une vie',
            'image' => 'Nelson_Mandela.jpg',
            'author' => 'Peter Hain',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du leader sud-africain Nelson Mandela, qui retrace sa vie, son combat contre l'apartheid et sa présidence démocratique en Afrique du Sud."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Coco Chanel : Une femme',
            'image' => 'Coco_Chanel.jpg',
            'author' => 'Axel Madsen',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie de la célèbre styliste Coco Chanel, qui explore sa vie, sa carrière et son influence sur la mode mondiale."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Leonard de Vinci',
            'image' => 'Leonard_de_Vinci.jpg',
            'author' => 'Walter Isaacson',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du célèbre artiste et inventeur Leonard de Vinci, qui explore sa vie, son œuvre artistique et ses contributions à la science et à l'ingénierie."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Pablo Picasso',
            'image' => 'Pablo_Picasso.jpg',
            'author' => 'Patrick O\'Brian',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du célèbre artiste Pablo Picasso, qui explore sa vie, son œuvre artistique et son influence sur l'art moderne."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Ronaldo: L\'incroyable destin du meilleur joueur du monde',
            'image' => 'Ronaldo_L_incroyable_destin.jpg',
            'author' => 'Luca Caioli',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du célèbre footballeur portugais Cristiano Ronaldo, qui explore sa vie personnelle, sa carrière et son impact sur le football."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Michelle Obama : Une histoire',
            'image' => 'Michelle_Obama.jpg',
            'author' => 'Peter Slevin',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie de l'ancienne première dame des États-Unis, Michelle Obama, qui explore sa vie, son engagement public, et son impact en tant que figure emblématique pour les femmes et les minorités."
        ]);



        DB::table('books')->insert(values: [
            'title' => 'Open',
            'image' => 'Open.jpg',
            'author' => 'Andre Agassi',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "L'autobiographie du joueur de tennis américain Andre Agassi, qui raconte sa vie personnelle, sa carrière et les défis auxquels il a été confronté."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Rafa: Ma propre histoire',
            'image' => 'Rafa_Ma_propre_histoire.jpg',
            'author' => 'Rafael Nadal et John Carlin',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Une biographie du célèbre joueur de tennis espagnol Rafael Nadal, qui explore sa vie, sa carrière et son impact sur le tennis mondial."
        ]);


        /* -----------------------------------------------POESIE--------------------------------------*/

        DB::table('books')->insert(values: [
            'title' => 'Les Fleurs du mal',
            'image' => 'Les_Fleurs_du_mal.jpg',
            'author' => 'Charles Baudelaire',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes emblématique de la poésie française, explorant des thèmes tels que la beauté, la mélancolie et la nature humaine."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Leaves of Grass',
            'image' => 'Leaves_of_Grass.jpg',
            'author' => 'Walt Whitman',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes américain écrit par Walt Whitman, célébrant la nature, l'individualisme et la démocratie."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Les Contemplations',
            'image' => 'Les_Contemplations.jpg',
            'author' => 'Victor Hugo',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes de Victor Hugo, exprimant des thèmes tels que l'amour, la nature et la réflexion sur la condition humaine."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Rubaïyat',
            'image' => 'Rubaiyat.jpg',
            'author' => 'Omar Khayyam',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de quatrains poétiques du poète persan Omar Khayyam, explorant des thèmes de la vie, de l'amour et de la nature."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Les Chants de Maldoror',
            'image' => 'Les_Chants_de_Maldoror.jpg',
            'author' => 'Comte de Lautréamont',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes en prose explorant des thèmes sombres et fantastiques, écrit par le Comte de Lautréamont."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Alcools',
            'image' => 'Alcools.jpg',
            'author' => 'Guillaume Apollinaire',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes modernistes de Guillaume Apollinaire, explorant des thèmes de l'amour, de la modernité et de la ville."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Les Contes d\'Hoffmann',
            'image' => 'Les_Contes_d_Hoffmann.jpg',
            'author' => 'Jacques Offenbach',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes fantastiques et mystérieux inspirés des contes d'E.T.A. Hoffmann."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Les Complaintes',
            'image' => 'Les_Complaintes.jpg',
            'author' => 'Jules Laforgue',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes mélancoliques et ironiques de Jules Laforgue, influencé par le symbolisme et le romantisme."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Le Spleen de Paris',
            'image' => 'Le_Spleen_de_Paris.jpg',
            'author' => 'Charles Baudelaire',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes en prose de Charles Baudelaire, explorant la vie urbaine, la solitude et la modernité."
        ]);


        DB::table('books')->insert(values: [
            'title' => 'Les Illuminations',
            'image' => 'Les_Illuminations.jpg',
            'author' => 'Arthur Rimbaud',
            'user_id' => 1,
            'price' => rand(1900, 5500),
            'quantity' => rand(10, 90),
            'description' => "Un recueil de poèmes surréalistes d'Arthur Rimbaud, explorant des thèmes de l'imaginaire, de la révolte et de la quête de sens."
        ]);


        /* -----------------------------------------------BD & COMICS--------------------------------------*/

        DB::table('books')->insert(values: [
            [
                'title' => 'Maus',
                'image' => 'maus.jpg',
                'author' => 'Art Spiegelman',
                'user_id' => 1,
                'price' => 4900,
                'quantity' => rand(10, 90),
                'description' => "Maus recounts the experiences of the author's father during the Holocaust, with Jews depicted as mice and Nazis as cats."
            ],
            [
                'title' => 'Watchmen',
                'image' => 'watchmen.jpg',
                'author' => 'Alan Moore',
                'user_id' => 1,
                'price' => 4700,
                'quantity' => rand(10, 90),
                'description' => "Set in an alternate history where superheroes exist, Watchmen explores complex themes of morality and politics."
            ],
            [
                'title' => 'The Dark Knight Returns',
                'image' => 'dark_knight.jpg',
                'author' => 'Frank Miller',
                'user_id' => 1,
                'price' => 5000,
                'quantity' => rand(10, 90),
                'description' => "This graphic novel features an older Bruce Wayne coming out of retirement as Batman to save Gotham City."
            ],
            [
                'title' => 'Sandman',
                'image' => 'sandman.jpg',
                'author' => 'Neil Gaiman',
                'user_id' => 1,
                'price' => 4730,
                'quantity' => rand(10, 90),
                'description' => "A rich blend of mythology, history, and dark fantasy, Sandman follows Dream, also known as Morpheus, the Lord of Dreams."
            ],
            [
                'title' => 'Bone',
                'image' => 'bone.jpg',
                'author' => 'Jeff Smith',
                'user_id' => 1,
                'price' => 3750,
                'quantity' => rand(10, 90),
                'description' => "Bone is an epic fantasy tale featuring the Bone cousins as they journey through a vast, uncharted desert."
            ],
            [
                'title' => 'Persepolis',
                'image' => 'persepolis.jpg',
                'author' => 'Marjane Satrapi',
                'user_id' => 1,
                'price' => 4790,
                'quantity' => rand(10, 90),
                'description' => "Persepolis is a memoir in graphic novel form depicting the author's childhood in Iran during and after the Islamic Revolution."
            ],
            [
                'title' => 'Saga',
                'image' => 'saga.jpg',
                'author' => 'Brian K. Vaughan',
                'user_id' => 1,
                'price' => 4848,
                'quantity' => rand(10, 90),
                'description' => "Saga is a space opera/fantasy comic book series that depicts the adventures of a mixed-race family."
            ],
            [
                'title' => 'Calvin and Hobbes',
                'image' => 'calvin_and_hobbes.jpg',
                'author' => 'Bill Watterson',
                'user_id' => 1,
                'price' => 4500,
                'quantity' => rand(10, 90),
                'description' => "Calvin and Hobbes follows the humorous antics of Calvin, a precocious and imaginative young boy, and his stuffed tiger, Hobbes."
            ],
            [
                'title' => 'The Walking Dead',
                'image' => 'walking_dead.jpg',
                'author' => 'Robert Kirkman',
                'user_id' => 1,
                'price' => 4600,
                'quantity' => rand(10, 90),
                'description' => "The Walking Dead is a post-apocalyptic horror comic book series that focuses on a group of survivors in a world overrun by zombies."
            ],
            [
                'title' => 'Hellboy',
                'image' => 'hellboy.jpg',
                'author' => 'Mike Mignola',
                'user_id' => 1,
                'price' => 4890,
                'quantity' => rand(10, 90),
                'description' => "Hellboy is a supernatural comic book series featuring the adventures of the demon Anung Un Rama, known as Hellboy."
            ],
            [
                'title' => 'V for Vendetta',
                'image' => 'vendetta.jpg',
                'author' => 'Alan Moore',
                'user_id' => 1,
                'price' => 4890,
                'quantity' => rand(10, 90),
                'description' => "Set in a dystopian future, V for Vendetta follows the vigilante V as he seeks to overthrow the fascist government."
            ],
            [
                'title' => 'Preacher',
                'image' => 'preacher.jpg',
                'author' => 'Garth Ennis',
                'user_id' => 1,
                'price' => 4800,
                'quantity' => rand(10, 90),
                'description' => "Preacher tells the story of Jesse Custer, a small-town preacher who becomes possessed by a supernatural entity."
            ],
            [
                'title' => 'Y: The Last Man',
                'image' => 'y_the_last_man.jpg',
                'author' => 'Brian K.Vaughan',
                'user_id' => 1,
                'price' => 5000,
                'quantity' => rand(10, 90),
                'description' => "Y: The Last Man explores a world in which a mysterious plague has killed every male mammal except for one man and his male monkey."
            ],

        ]);

        /* -----------------------------------------------ART & PHOTOGRAPHIE--------------------------------------*/

        DB::table(table: 'books')->insert(values: [
            [
                'title' => 'The Story of Art',
                'image' => 'story_of_art.jpg',
                'author' => 'E.H.Gombrich',
                'user_id' => 1,
                'price' => 6480,
                'quantity' => rand(10, 90),
                'description' => "The Story of Art is a classic introduction to art history, covering the development of art from ancient times to the present day."
            ],
            [
                'title' => 'Ways of Seeing',
                'image' => 'ways_of_seeing.jpg',
                'author' => 'John Berger',
                'user_id' => 1,
                'price' => 4640,
                'quantity' => rand(10, 90),
                'description' => "Ways of Seeing examines the way we view art and images, challenging traditional ways of understanding visual culture."
            ],
            [
                'title' => 'The Art Book',
                'image' => 'art_book.jpg',
                'author' => 'Phaidon Press',
                'user_id' => 1,
                'price' => 5200,
                'quantity' => rand(10, 90),
                'description' => "The Art Book is an A-Z guide to the greatest painters, sculptors, and photographers, with concise and informative entries."
            ],
            [
                'title' => 'Camera Lucida',
                'image' => 'camera_lucida.jpg',
                'author' => 'Roland Barthes',
                'user_id' => 1,
                'price' => 5000,
                'quantity' => rand(10, 90),
                'description' => "Camera Lucida is a meditation on photography, exploring the nature of the photographic image and its impact on the viewer."
            ],
            [
                'title' => 'On Photography',
                'image' => 'on_photography.jpg',
                'author' => 'Susan Sontag',
                'user_id' => 1,
                'price' => 4800,
                'quantity' => rand(10, 90),
                'description' => "On Photography is a collection of essays that examine the role of photography in modern society and its influence on our perception of the world."
            ],
            [
                'title' => 'The Shock of the New',
                'image' => 'shock_of_the_new.jpg',
                'author' => 'Robert Hughes',
                'user_id' => 1,
                'price' => 5350,
                'quantity' => rand(10, 90),
                'description' => "The Shock of the New is a history of modern art, exploring the development of art from the Impressionists to the present day."
            ],
            [
                'title' => 'Art and Fear',
                'image' => 'art_and_fear.jpg',
                'author' => 'David Bayles and Ted Orland',
                'user_id' => 1,
                'price' => 4400,
                'quantity' => rand(10, 90),
                'description' => "Art and Fear explores the challenges and fears that artists face, offering insights into how to overcome creative obstacles."
            ],
            [
                'title' => 'The Photograph as Contemporary Art',
                'image' => 'photograph_contemporary_art.jpg',
                'author' => 'Charlotte Cotton',
                'user_id' => 1,
                'price' => 5800,
                'quantity' => rand(10, 90),
                'description' => "The Photograph as Contemporary Art examines the role of photography in contemporary art, featuring works by leading artists."
            ],
            [
                'title' => 'Pictures at a Revolution',
                'image' => 'pictures_at_a_revolution.jpg',
                'author' => 'Mark Harris',
                'user_id' => 1,
                'price' => 5100,
                'quantity' => rand(10, 90),
                'description' => "Pictures at a Revolution explores the five films nominated for Best Picture at the 1967 Academy Awards, revealing the cultural and artistic shifts of the era."
            ],
            [
                'title' => 'The Art of Photography',
                'image' => 'art_of_photography.jpg',
                'author' => 'Bruce Barnbaum',
                'user_id' => 1,
                'price' => 5800,
                'quantity' => rand(10, 90),
                'description' => "The Art of Photography offers a comprehensive guide to photographic technique and aesthetics, with insights into the creative process."
            ],
            [
                'title' => 'Seven Days in the Art World',
                'image' => 'seven_days_art_world.jpg',
                'author' => 'Sarah Thornton',
                'user_id' => 1,
                'price' => 4640,
                'quantity' => rand(10, 90),
                'description' => "Seven Days in the Art World takes readers on a journey through the contemporary art world, exploring its institutions, markets, and personalities."
            ],
            [
                'title' => 'The Art of Looking Sideways',
                'image' => 'looking_sideways.jpg',
                'author' => 'Alan Fletcher',
                'user_id' => 1,
                'price' => 5050,
                'quantity' => rand(10, 90),
                'description' => "The Art of Looking Sideways is a visual exploration of creativity, perception, and the nature of art, filled with images, quotes, and anecdotes."
            ],
            [
                'title' => 'Art and Visual Perception: A Psychology of the Creative Eye',
                'image' => 'art_visual_perception.jpg',
                'author' => 'Rudolf Arnheim',
                'user_id' => 1,
                'price' => 5300,
                'quantity' => rand(10, 90),
                'description' => "Art and Visual Perception explores the psychology of visual perception and its implications for the creation and appreciation of art."
            ],
            [
                'title' => 'Camera Work',
                'image' => 'camera_work.jpg',
                'author' => 'Alfred Stieglitz',
                'user_id' => 1,
                'price' => 4000,
                'quantity' => rand(10, 90),
                'description' => "Camera Work was a photographic journal published by Alfred Stieglitz, featuring the work of leading photographers of the early 20th century."
            ],
        ]);

        /* -----------------------------------------------SCIENCES & TECHNIQUES--------------------------------------*/

        DB::table('books')->insert([
            [
                'title' => 'Cosmos',
                'image' => 'cosmos.jpg',
                'author' => 'Carl Sagan',
                'user_id' => 1,
                'price' => 5100,
                'quantity' => rand(10, 90),
                'description' => "Cosmos explores the universe and our place in it, blending science, philosophy, and history into an engaging narrative."
            ],
            [
                'title' => 'The Selfish Gene',
                'image' => 'selfish_gene.jpg',
                'author' => 'Richard Dawkins',
                'user_id' => 1,
                'price' => 4800,
                'quantity' => rand(10, 90),
                'description' => "The Selfish Gene revolutionized the way we think about evolution, introducing the concept of the 'selfish gene'."
            ],
            [
                'title' => 'A Brief History of Time',
                'image' => 'brief_history.jpg',
                'author' => 'Stephen Hawking',
                'user_id' => 1,
                'price' => 5000,
                'quantity' => rand(10, 90),
                'description' => "A Brief History of Time explores the nature of the universe, black holes, and the origin of the universe in accessible language."
            ],
            [
                'title' => 'The Elegant Universe',
                'image' => 'elegant_universe.jpg',
                'author' => 'Brian Greene',
                'user_id' => 1,
                'price' => 5020,
                'quantity' => rand(10, 90),
                'description' => "The Elegant Universe explains the complex theories of string theory and the nature of reality in a clear and engaging way."
            ],
            [
                'title' => 'Gödel, Escher, Bach: An Eternal Golden Braid',
                'image' => 'godel_escher_bach.jpg',
                'author' => 'Douglas Hofstadter',
                'user_id' => 1,
                'price' => 5090,
                'quantity' => rand(10, 90),
                'description' => "Gödel, Escher, Bach explores the connections between the works of Gödel, Escher, and Bach, and their implications for mathematics, art, and music."
            ],
            [
                'title' => 'The Structure of Scientific Revolutions',
                'image' => 'scientific_revolutions.jpg',
                'author' => 'Thomas S. Kuhn',
                'user_id' => 1,
                'price' => 4650,
                'quantity' => rand(10, 90),
                'description' => "The Structure of Scientific Revolutions argues that scientific progress is not linear but occurs through revolutionary changes in paradigms."
            ],
            [
                'title' => 'Silent Spring',
                'image' => 'silent_spring.jpg',
                'author' => 'Rachel Carson',
                'user_id' => 1,
                'price' => 4800,
                'quantity' => rand(10, 90),
                'description' => "Silent Spring is a groundbreaking book that explores the impact of pesticides on the environment and human health."
            ],
            [
                'title' => 'The Demon-Haunted World: Science as a Candle in the Dark',
                'image' => 'demon_haunted_world.jpg',
                'author' => 'Carl Sagan',
                'user_id' => 1,
                'price' => 4780,
                'quantity' => rand(10, 90),
                'description' => "The Demon-Haunted World explores the role of science and skepticism in an age of superstition and pseudoscience."
            ],
            [
                'title' => 'On the Origin of Species',
                'image' => 'origin_of_species.jpg',
                'author' => 'Charles Darwin',
                'user_id' => 1,
                'price' => 4000,
                'quantity' => rand(10, 90),
                'description' => "On the Origin of Species outlines Charles Darwin's theory of evolution by natural selection, revolutionizing our understanding of the natural world."
            ],
            [
                'title' => 'The Immortal Life of Henrietta Lacks',
                'image' => 'henrietta_lacks.jpg',
                'author' => 'Rebecca Skloot',
                'user_id' => 1,
                'price' => 3100,
                'quantity' => rand(10, 90),
                'description' => "The Immortal Life of Henrietta Lacks tells the story of Henrietta Lacks, whose cells were taken without her consent and used in scientific research."
            ]
        ]);



        //     for ($i = 0; $i < 100; $i++) {
        //         DB::table('books')->insert([
        //             'title' => 'Harry Potter' . ($i + 1),
        //             'image' => 'book-cover.jpg',
        //             'author' => 'macan iwan' . ($i + 1),
        //             'user_id' => 1,
        //             'price' => rand(1000, 2500),
        //             'quantity' => rand(10, 88),
        //             'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis ullam inventore, at odit eius tempora praesentium ab excepturi adipisci assumenda consequatur optio amet totam debitis, ad, dolorem quisquam repellendus? Nesciunt." . ($i + 1),
        //         ]);
        //     }
    }
}
