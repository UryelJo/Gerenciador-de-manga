SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

CREATE TABLE `autor` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `idade` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `editora` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `cnpj` varchar(14) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `manga` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `volume` int(11) NOT NULL,
    `descricao` text NOT NULL,
    `resumo` text NOT NULL,
    `avaliacao` double(2, 1) NOT NULL,
    `genero` varchar(30) NOT NULL,
    `quantidades_requisitada` int(11) NOT NULL,
    `url_capa` varchar(255) DEFAULT NULL,
    `autor_id` int(11) NOT NULL,
    `editora_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `autor_id` (`autor_id`),
    KEY `editora_id` (`editora_id`),
    CONSTRAINT `fk_manga_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor`(`id`),
    CONSTRAINT `fk_manga_editora` FOREIGN KEY (`editora_id`) REFERENCES `editora`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `email` varchar(60) NOT NULL,
    `senha` varchar(70) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `user_manga` (
    `user_id` int(11) NOT NULL,
    `manga_id` int(11) NOT NULL,
    PRIMARY KEY (`user_id`, `manga_id`),
    CONSTRAINT `fk_user_manga_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`), 
    CONSTRAINT `fk_user_manga_manga` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `autor` (`nome`, `idade`) VALUES
('Hayao Miyazaki', 82),
('Hajime Isayama', 37),
('Akira Toriyama', 68),
('Gege Akutami', 23),
('Eiichiro Oda', 48);

INSERT INTO `editora` (`nome`, `cnpj`) VALUES
('Shueisha', '12345678000100'),
('Kodansha', '23456789000111'),
('Panini', '34567890000122'),
('Square Enix', '45678901000133'),
('Kadokawa', '56789012000144');

INSERT INTO `manga` (`nome`, `volume`, `descricao`,`resumo`, `avaliacao`, `genero`, `quantidades_requisitada`,`url_capa`, `autor_id`, `editora_id`) VALUES
('Naruto', 1,'Naruto é um mangá japonês escrito e ilustrado por Masashi Kishimoto. Publicado originalmente na revista Weekly Shonen Jump de 1999 a 2014, a história segue as aventuras de Naruto Uzumaki, um jovem ninja que busca reconhecimento e sonha em se tornar o Hokage, o líder de sua aldeia, a Vila Oculta da Folha.', '<h3>Premissa</h3>
Naruto Uzumaki é um garoto que vive na Vila Oculta da Folha (Konohagakure) e é desprezado por seus colegas de vila devido ao demônio raposa de nove caudas, Kurama, selado em seu corpo desde o seu nascimento. Para conquistar o respeito dos moradores da vila, Naruto sonha em se tornar o Hokage, o ninja mais forte e líder da vila.<br><br>

<h3>Arco Inicial</h3>
A história começa com Naruto se formando na academia ninja e sendo designado ao Time 7, liderado pelo sensei Kakashi Hatake e composto por seus colegas Sasuke Uchiha e Sakura Haruno. Juntos, eles realizam missões para a vila e gradualmente enfrentam desafios mais difíceis.<br><br>

<h3>Desenvolvimento</h3>
Ao longo da série, Naruto faz amizades, enfrenta inimigos e participa de várias batalhas importantes. Um dos arcos centrais envolve a organização criminosa Akatsuki, que busca capturar as bestas com cauda (bijuu), incluindo Kurama dentro de Naruto. A série também explora os passados e motivações dos personagens, especialmente Sasuke, que busca vingança contra seu irmão Itachi Uchiha.<br><br>

<h3>Grande Guerra Ninja</h3>
A história culmina na Quarta Grande Guerra Ninja, onde as aldeias ninjas se unem para enfrentar a ameaça da Akatsuki e a ressurreição de antigos inimigos. Naruto e Sasuke se tornam figuras-chave na batalha contra Madara Uchiha e a entidade divina Kaguya Otsutsuki.<br><br>

<h3>Conclusão</h3>
Naruto finalmente se torna um herói reconhecido e, eventualmente, o Hokage. O mangá conclui com a redenção de Sasuke, a paz entre as aldeias ninjas e a nova geração de ninjas, incluindo os filhos de Naruto e seus amigos.<br><br>
', 4.8, 'Ação', 500,'https://www.researchgate.net/profile/Marilurdes-Borges/publication/348637849/figure/fig5/AS:982232843948049@1611193967796/Figura-2-Capa-do-manga-Naruto-Shippuden.png', 1, 1),

('Dragon Ball', 1, 'Dragon Ball é um mangá japonês escrito e ilustrado por Akira Toriyama. Publicado originalmente na revista Weekly Shonen Jump de 1984 a 1995, a história segue as aventuras de Son Goku desde sua infância até a vida adulta, enquanto ele treina artes marciais e explora o mundo em busca das sete Esferas do Dragão, que podem invocar um dragão capaz de realizar desejos.','<h3>Premissa</h3>
Son Goku é um garoto com uma cauda de macaco e força sobre-humana que vive nas montanhas. Um dia, ele encontra Bulma, uma jovem inteligente que está em busca das lendárias Esferas do Dragão. Juntos, eles embarcam em uma jornada para reunir as sete esferas e realizar seus desejos.<br><br>

<h3>Arco Inicial</h3>
A história começa com Goku e Bulma formando uma equipe para encontrar as Esferas do Dragão. Ao longo do caminho, eles encontram vários amigos e inimigos, incluindo Oolong, Yamcha, e Mestre Kame, que se torna o mentor de Goku. Goku também participa do Torneio de Artes Marciais (Tenkaichi Budokai), onde conhece Krillin, um monge e seu futuro melhor amigo.<br><br>

<h3>Desenvolvimento</h3>
Goku cresce e continua sua busca pelas Esferas do Dragão, enfrentando vilões cada vez mais poderosos. Ele descobre suas origens como um Saiyajin, uma raça de guerreiros alienígenas, e enfrenta vários inimigos, como o Rei Piccolo e seus descendentes, Piccolo Jr.<br><br>

<h3>Conclusão</h3>
A série culmina com a derrota de Majin Buu e um salto temporal que mostra Goku continuando suas aventuras, agora com sua família, incluindo seu filho Gohan e seu neto Pan. A série termina com Goku participando de um novo Torneio de Artes Marciais, onde encontra Uub, a reencarnação de Buu, e decide treiná-lo.<br><br>
', 4.7, 'Aventura', 300,'https://static.wikia.nocookie.net/dragonball/images/4/4b/DragonBallJapão1.jpg/revision/latest?cb=20211030193731&path-prefix=pt-br', 3, 1),

('One Piece', 1, 'One Piece é um mangá japonês escrito e ilustrado por Eiichiro Oda. Publicado na revista Weekly Shonen Jump desde 1997, a história segue as aventuras de Monkey D. Luffy e sua tripulação de piratas, os Chapéus de Palha, em busca do tesouro lendário conhecido como One Piece, que tornará Luffy o Rei dos Piratas.','<h3>Premissa</h3>
Monkey D. Luffy é um jovem pirata com a habilidade de esticar seu corpo como borracha, graças a ter comido uma Fruta do Diabo chamada Gomu Gomu no Mi. Inspirado por seu ídolo de infância, o pirata Shanks, Luffy sonha em encontrar o One Piece e se tornar o Rei dos Piratas. Para isso, ele deve navegar pela Grand Line e superar inúmeros desafios e inimigos.<br><br>

<h3>Arco Inicial</h3>
A história começa com Luffy partindo em uma pequena embarcação e formando sua tripulação, os Chapéus de Palha. Ele recruta Zoro, um espadachim, Nami, uma navegadora, Usopp, um atirador, e Sanji, um cozinheiro. Juntos, eles enfrentam vilões como Buggy, o Palhaço, e o Capitão Kuro, enquanto procuram por aventuras e tesouros.<br><br>

<h3>Desenvolvimento</h3>
Ao longo da série, Luffy e sua tripulação enfrentam desafios cada vez maiores, recrutando novos membros como Tony Tony Chopper, um médico renascentista, Nico Robin, uma arqueóloga, Franky, um carpinteiro ciborgue, Brook, um esqueleto músico, e Jinbe, um homem-peixe timoneiro. Eles enfrentam diversos inimigos poderosos, incluindo a Marinha, outros piratas, e organizações criminosas.<br><br>

<h3>Conclusão</h3>
A história de "One Piece" ainda está em andamento, com Luffy e sua tripulação se aproximando cada vez mais do tesouro One Piece e de enfrentar o imperador pirata Kaido, além de outros poderosos inimigos.<br><br>
', 4.9, 'Aventura', 700,'https://static.wikia.nocookie.net/onepiece/images/0/0e/Volume_1.png/revision/latest?cb=20140106204057&path-prefix=pt', 5, 2),
('Jujutsu Kaisen', 1, 'Jujutsu Kaisen é um mangá japonês escrito e ilustrado por Gege Akutami. Publicado na revista Weekly Shonen Jump desde 2018, a história segue Yuji Itadori, um estudante do ensino médio que se envolve no mundo do Jujutsu, a prática de exorcizar Maldições, seres sobrenaturais formados a partir de emoções negativas dos humanos.','<h3>Premissa</h3>
Yuji Itadori é um estudante atlético e bem-humorado que vive com seu avô doente. Após a morte do avô, ele encontra um objeto amaldiçoado que atrai Maldições. Para salvar seus amigos, Yuji ingere o objeto, que é um dedo de Ryomen Sukuna, uma poderosa Maldição. Ele ganha habilidades sobrenaturais e se torna o receptáculo de Sukuna. Yuji é recrutado pelo Jujutsu High, uma escola de exorcistas, para aprender a combater Maldições e reunir os dedos de Sukuna para destruí-los.<br><br>

<h3>Arco Inicial</h3>
A história começa com Yuji se juntando ao Jujutsu High e sendo treinado pelo professor Satoru Gojo, um dos exorcistas mais poderosos. Ele faz amizade com seus colegas Megumi Fushiguro e Nobara Kugisaki. Juntos, eles enfrentam várias Maldições e missões perigosas enquanto Yuji aprende sobre o mundo do Jujutsu.<br><br>

<h3>Desenvolvimento</h3>
Yuji e seus amigos enfrentam desafios cada vez maiores, incluindo Maldições poderosas e usuários de Jujutsu que se aliam a Maldições. A série explora a complexidade das Maldições, a origem do poder de Sukuna, e os conflitos internos dos personagens. Um dos arcos centrais envolve a luta contra Mahito, uma Maldição transfiguradora que deseja exterminar a humanidade.<br><br>

<h3>Arcos Principais</h3>
Jujutsu Kaisen se divide em várias sagas importantes, incluindo:<br>

Saga de Introdução: Yuji ingere o dedo de Sukuna e se junta ao Jujutsu High.
Saga da Escola de Jujutsu de Kyoto: Yuji e seus colegas competem contra estudantes de outra escola de Jujutsu e enfrentam ataques de Maldições.
Saga do Incidente de Shibuya: Um evento catastrófico onde exorcistas e Maldições colidem em uma batalha massiva em Shibuya.
Saga do Arco da Morte Prematura: Explora o passado de Satoru Gojo e sua amizade com Suguru Geto, um exorcista que se voltou contra a humanidade.<br><br>

<h3>Conclusão</h3>
A história de "Jujutsu Kaisen" ainda está em andamento, com Yuji e seus aliados continuando a enfrentar Maldições e buscar a destruição dos dedos de Sukuna. A série está repleta de batalhas intensas e momentos emocionantes enquanto o destino de Yuji e do mundo do Jujutsu se desenrola.<br><br>
',  5.0, 'Ação', 999,'https://m.media-amazon.com/images/I/81TmHlRleJL._SY385_.jpg', 4, 3),
('Attack on titan', 1, 'Attack on Titan (Shingeki no Kyojin) é um mangá japonês escrito e ilustrado por Hajime Isayama. Publicado na revista Bessatsu Shonen Magazine de 2009 a 2021, a história segue Eren Yeager e seus amigos enquanto lutam contra Titãs, gigantes humanoides que ameaçam a humanidade.','<h3>Premissa</h3>
Em um mundo onde a humanidade vive cercada por muralhas para se proteger dos Titãs, gigantes que devoram humanos sem razão aparente, Eren Yeager sonha em explorar o mundo além das muralhas. Quando sua cidade natal é atacada por Titãs, resultando na morte de sua mãe, Eren jura exterminar todos os Titãs e se junta ao Regimento de Exploração junto com seus amigos de infância, Mikasa Ackerman e Armin Arlert. <br><br>

<h3>Arco Inicial</h3>
A história começa com a Queda da Muralha Maria, onde os Titãs invadem a cidade de Shiganshina. Após a tragédia, Eren, Mikasa, e Armin se alistam no exército e passam pelo rigoroso treinamento militar. Eles se juntam ao Regimento de Exploração, um grupo dedicado a lutar contra os Titãs e descobrir seus segredos. <br><br>

<h3>Desenvolvimento</h3>
Conforme a série avança, Eren e seus amigos enfrentam batalhas intensas contra os Titãs e começam a desvendar mistérios sobre suas origens. Eles descobrem que Eren tem a habilidade de se transformar em um Titã, o que se torna uma arma crucial contra os inimigos. A história também explora a política interna dentro das muralhas e revela segredos obscuros sobre a verdadeira natureza dos Titãs e a história da humanidade. <br><br>

<h3>Arcos Principais</h3>
Attack on Titan se divide em várias sagas importantes, incluindo: <br>

Saga da Queda de Shiganshina: Introdução dos personagens principais e a invasão inicial dos Titãs.
Saga do Titã Fêmea: A batalha contra Annie Leonhart, uma guerreira que pode se transformar em um Titã.
Saga da Recuperação da Muralha Maria: A missão de Eren e seus aliados para retomar a Muralha Maria e descobrir os segredos escondidos no porão da casa de Eren.
Saga da Revolução: A luta contra o governo corrupto dentro das muralhas e a revelação das verdadeiras origens dos Titãs.
Saga da Guerra de Marley: O confronto entre os habitantes das muralhas e a nação de Marley, onde novos segredos são revelados e alianças são formadas.<br><br>

<h3>Conclusão</h3>
A série culmina em uma guerra total entre os Eldianos e os Marleyanos, com Eren assumindo um papel controverso ao ativar o "Rumbling", uma catastrófica marcha dos Titãs Colossais. A história explora temas de liberdade, vingança, e a luta pelo futuro da humanidade. No final, os sobreviventes devem lidar com as consequências das ações de Eren e buscar um caminho para a paz. <br><br>
', 4.9, 'Ação', 850,'https://i.pinimg.com/564x/bc/cc/79/bccc79e62951d16253a1cc7b61255863.jpg', 2, 2);

INSERT INTO `user` (`nome`, `email`, `senha`) VALUES
('Uryel','uryeljodelucca11@gmail.com', '0b14bf70574539485fe4c2ba202f47b8' ),
('Vitao', 'vitao@gmail.com', '31d356e7466ea208f517cd7afa1d75bd' ),
('Almir', 'almirzada@gmail.com', '0dcfa9276dffa58e19c0d6c8b31c16d8' );

INSERT INTO `user_manga` (`user_id`, `manga_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 4),
(3, 5),
(3, 1),
(2, 2),
(1, 2),
(3, 4),
(1, 5);

COMMIT;