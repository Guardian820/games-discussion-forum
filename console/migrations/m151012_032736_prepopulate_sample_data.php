<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_032736_prepopulate_sample_data extends Migration
{
    public function up()
    {
        //User Table
        $this->batchInsert('user', ['id', 'username', 'email', 'password_hash', 'auth_key', 'confirmed_at', 'unconfirmed_email', 'blocked_at', 'registration_ip', 'created_at', 'updated_at', 'flags', 'role', 'avatar'], 
        [
            [1, 'admin', 'a@a1.com', '$2y$10$QsX7Wt.WyyYfBpLRgNxjxOu1ryo/5gI1FW/dWjvsHCWNv5Scb7SUW', 'k8zAZKCSmG9yV9mCI0sT-bhqxkIULlnJ', 1444581552, NULL, NULL, '::1', 1444562338, 1444562338, 0, 'admin', 'unicorn.gif'],
            [2, 'super_moderator', 'a@a2.com', '$2y$10$cMt9YeL.ac9Gz.tdqgOdy.gcBMWAOgoJ8FUY7DyX2d.3mql5QItnC', '37SCPz_a0mp399yiBQ_i1Y7mCUgYIJHW', 1444581552, NULL, NULL, '::1', 1444566363, 1444581491, 0, 'super_moderator', NULL],
            [3, 'moderator', 'a@a3.com', '$2y$10$enea5tqLkG52OwHAeUcfK.6.A59O0RyXD549Du8HfW0V5x/1Q2fUG', 'mv7276rSyJEd2InzqFKAc0A8IheqzuQw', 1444581552, NULL, NULL, '::1', 1444581552, 1444581552, 0, 'moderator', NULL],
            [4, 'user', 'a@4.com', '$2y$10$hwyS9hE0yAgXuco.c13mEuqskFYjfTGVT0/XV7EEwnjO8h4dhyIEG', '6Dq6GR2ouFbutWMz_qzCcbRyxzlBmb4F', 1444615947, NULL, NULL, '::1', 1444615947, 1444615947, 0, 'user', NULL]
        ]);

        //Thread Table
        $this->batchInsert('thread', ['thread_id', 'title', 'thread_starter', 'created_at', 'updated_at', 'replies', 'views', 'locked', 'picture', 'content', 'description', 'release_date', 'genre', 'producers', 'developers', 'composers', 'designers'], 
        [
            [1, 'World of Warcraft: Legion', 1, '2015-10-12 04:39:32', '2015-10-12 04:45:31', 0, 0, 0, '20151012044049Legion_cover.jpg', NULL, 'World of Warcraft (WoW) is a massively multiplayer online role-playing game (MMORPG) created in 2004 by Blizzard Entertainment. It is the fourth released game set in the fantasy Warcraft universe, which was first introduced by Warcraft: Orcs & Humans in 1994.[3] World of Warcraft takes place within the Warcraft world of Azeroth, approximately four years after the events at the conclusion of Blizzard previous Warcraft release, Warcraft III: The Frozen Throne.[4] Blizzard Entertainment announced World of Warcraft on September 2, 2001.[5] The game was released on November 23, 2004, on the 10th anniversary of the Warcraft franchise.<br/><br/><br/><br/>The first expansion set of the game, The Burning Crusade, was released on January 16, 2007.[6] The second expansion set, Wrath of the Lich King, was released on November 13, 2008.[7] The third expansion set, Cataclysm, was released on December 7, 2010. The fourth expansion set, Mists of Pandaria, was released on September 25, 2012.[8] The fifth expansion set, Warlords of Draenor, was released on November 13, 2014.[9] The sixth expansion set, Legion, was announced at Gamescom 2015, on August 6, 2015.[10]<br/><br/><br/><br/>With 5.6 million subscribers as of the end of June 2015,[11][12] World of Warcraft is currently the worlds most-subscribed MMORPG,[7][13] and holds the Guinness World Record for the most popular MMORPG by subscribers.[14][15][16][17] Having grossed over 10 billion dollars as of July 2012, it is also the highest grossing video game of all time.[18] In January 2014, it was announced that more than 100 million accounts had been created over the games lifetime.[19]', '2004-11-23', 'Massively multiplayer online role-playing game', 'Blizzard Entertainment', 'Blizzard Entertainment', 'Jason Hayes, Tracy W. Bush, Derek Duke, Glenn Stafford', 'Rob Pardo, Jeff Kaplan, Tom Chilton'],
            [2, 'Metal Gear Solid V: Phantom Pain', 1, '2015-10-12 04:44:13', '2015-10-12 04:44:13', 0, 0, 0, '2015101204441320151002211722!MGSV_The_Phantom_Pain_boxart.jpg', NULL, 'Metal Gear Solid V: The Phantom Pain (Japanese: メタルギアソリッドV ファントムペイン Hepburn: Metaru Gia Soriddo Faibu Fantomu Pein?) is an open world action-adventure stealth video game developed by Kojima Productions, directed, designed, co-produced and co-written by Hideo Kojima, published by Konami for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360 and Xbox One.[2][3] It was released worldwide on September 1, 2015.[4][5] The game is the eleventh canonical and final installment in the Metal Gear series and the fifth within the series chronology. It serves as a sequel to Metal Gear Solid V: Ground Zeroes, and a continuation of the narrative established there,[6] and a prequel to the original Metal Gear game. It carries over the tagline of Tactical Espionage Operations first used in Metal Gear Solid: Peace Walker.[7] Set in 1984, the game follows the mercenary leader Punished "Venom" Snake[N 1] as he ventures into Afghanistan and the Angola—Zaire border region to exact revenge on the people who destroyed his forces and came close to killing him during the climax of Ground Zeroes.', '2015-09-01', 'Action-adventure, stealth', 'Hideo Kojima, Kenichiro Imaizumi, Kazuki Muraoka', 'Konami', 'Ludvig Forssell, Justin Burnett, Daniel James', 'Hideo Kojima'],
            [3, 'Final Fantasy XIV: Heavensward', 3, '2015-10-12 04:49:10', '2015-10-12 04:54:45', 0, 0, 0, '20151012045445FFXIV_Heavensward_PC_PEGI_1426176152.jpg', NULL, 'Final Fantasy XIV: A Realm Reborn (ファイナルファンタジーXIV: 新生エオルゼア Fainaru Fantajī Fōtīn: Shinsei Eoruzea?, lit. Final Fantasy XIV: Reborn Eorzea) is a massively multiplayer online role-playing game (MMORPG) for Microsoft Windows, Mac OS X, Sony PlayStation 3, and PlayStation 4. It was developed by Square Enix with Naoki Yoshida as producer and director, and was released worldwide on August 27, 2013. The game is currently available in Japanese, English, French, German, Mandarin Chinese, and Korean. Final Fantasy XIV: A Realm Reborn takes place in the fictional land of Eorzea, five years after the events of the original release. At the conclusion of Final Fantasy XIV, the primal dragon Bahamut escapes from its lunar prison to initiate the Seventh Umbral Calamity, an apocalyptic event which destroys much of Eorzea. Through the gods blessing, the player character escapes the devastation by time traveling five years into the future. As Eorzea recovers and rebuilds, the player must deal with the impending threat of invasion by the Garlean Empire from the north.<br/><br/><br/><br/>The original Final Fantasy XIV was released in September 2010 to overwhelmingly negative reviews. As a result of this poor reception, then-Square Enix President Yoichi Wada announced that a new team, led by Yoshida, would take over development of the title. This team was responsible for generating content for the original version as well as developing a brand new game which would address all of the previous releases criticisms. Initially dubbed "Version 2.0", Final Fantasy XIV: A Realm Reborn features a new engine, improved server structures, revamped gameplay and interface, and a new story. The game released to largely positive reception; reviewers praised the game for its solid mechanics and progression, and commended Yoshida for turning the project around. The first major content patch—"A Realm Awoken"—was released on December 17, 2013, and introduced player housing, player versus player arena battles, new quests, and the first 24-man raid, Crystal Tower. Subsequent content patches have been released every three months. Square Enix executives attributed the companys return to profitability in part to the games strong sales and subscriber base, reaching a cumulative total of 5 million subscriptions as of July 2015. The first expansion pack, titled Final Fantasy XIV: Heavensward, was released on June 23, 2015.', '2013-08-27', 'Massively multiplayer online role-playing game', 'Naoki Yoshida', 'Square Enix', 'Masayoshi Soken, Nobuo Uematsu', 'Naoki Yoshida, Hideyuki Kasuga'],
        ]);

        //Post Table
        $this->batchInsert('post', ['post_id', 'thread_id', 'post_creator', 'created_at', 'updated_at', 'content'], 
        [
            [1, 1, 3, '2015-10-12 04:56:38', '2015-10-12 04:56:38', '<br/><br/>Not sure why they keep going on about largest invasion of Azeroth ever. Really? Larger than the Sundering of the World? Does this mean the rest of Azeroth is going to have Burning Legion forces running around attacking villages cities? No of course not... that would make too much sense.<br/><br/>Even in Classic I had to make my own events by dragging mobs from Blasted Lands all the way to Stormwind. Id drag the mob into the keep. "Protect the KING!" people would yell, as Stormwind guards rushed to defeat the insanely difficult demon forces.<br/><br/>Once, also in Classic, I dragged an elite green dragon all the way from Hinterlands emerald dream portal area all the way to Ironforge, "Protect the King!" players yelled. So awesome. People were like "where did that come from?"<br/><br/>For some reason creating world events continues to remain too difficult to fathom for WoW devs. Even when they did the Scourge Invasion, zones like Winterspring and Blasted Lands were attacked..... why? Why not Elwynn Forest? Why not Durotar? Why not the very heart of the Alliance and Horde?<br/><br/>Devs just didnt seem to have a clue, I hope they do now.<br/>'],
            [2, 1, 4, '2015-10-12 04:58:36', '2015-10-12 04:58:42', 'Since when did writers ever care about logistics.'],
            [3, 3, 4, '2015-10-12 05:06:04', '2015-10-12 05:11:57', 'Recommended<br/><br/>778.7 hrs on record<br/><br/><br/><br/>The expansion pack features the Au-Ra, a half-dragon race.<br/><br/><br/><br/>You can be a half-dragon dragoon that rides a dragon mount, while fighting actual dragons.<br/><br/><br/><br/>Dragons/10 '],
            [4, 3, 2, '2015-10-12 05:11:33', '2015-10-12 05:11:33', 'Recommended<br/><br/>1,117.0 hrs on record<br/><br/><br/><br/>If you enjoy your social life, or have any hobbies and interests apart from sitting in front of a computer, dont buy this game. You will stop going outside. I have to take vitamin D supplements now.<br/><br/><br/><br/>10/10 would get rickets again.<br/><br/><br/><br/>I have averaged ~8 hours a day since I bought this game. I have a full time job. And study post grad a t uni. And I have a wife. Future edit will likely be for the sacking, deferring and divorcing. '],
            [5, 2, 2, '2015-10-12 05:14:15', '2015-10-12 05:14:15', 'Not Recommended<br/><br/>19.2 hrs last two weeks / 244.5 hrs on record<br/><br/><br/><br/>Gameplay is outstanding.<br/><br/>Story is unresolved and half-baked.<br/><br/>Konamis business practices are unforgiveable.<br/><br/><br/><br/>This is less a review of a game rather a condemnation of Konamis business practices and insistence on using thinly veiled blackmail into squeezing additional money from their already paid customers.<br/><br/><br/><br/>F*cKonami']
        ]);

        //Profile Table
        $this->batchInsert('profile', ['user_id', 'name', 'public_email', 'gravatar_email', 'gravatar_id', 'location', 'website', 'bio'], 
        [
            [1, NULL, NULL, NULL, NULL, NULL, NULL, NULL],
            [2, NULL, NULL, NULL, NULL, NULL, NULL, NULL],
            [3, NULL, NULL, NULL, NULL, NULL, NULL, NULL],
            [4, NULL, NULL, NULL, NULL, NULL, NULL, NULL]
        ]);

    }

    public function down()
    {
        $this->delete ('user', $condition = '' );
        $this->delete ('thread', $condition = '' );
        $this->delete ('post', $condition = '' );
        $this->delete ('profile', $condition = '' );
        $this->delete ('social_account', $condition = '' );
        $this->delete ('token', $condition = '' );
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
