#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------

CREATE TABLE utilisateurs(
        id    Int NOT NULL ,
        email Varchar (50) NOT NULL ,
        mdp   Varchar (50) NOT NULL
        ,CONSTRAINT utilisateurs_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: administrateur
#------------------------------------------------------------

CREATE TABLE administrateur(
        id  Int NOT NULL ,
        nom Char (32) NOT NULL ,
        mdp Char (100) NOT NULL
	,CONSTRAINT administrateur_PK PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO `administrateur` (`id`, `nom`, `mdp`) VALUES
(1, 'admin', 'mdpadmin'),
(2, 'user1', 'mdp2');

#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id      Char (32) NOT NULL ,
        libelle Char (32)
	,CONSTRAINT categorie_PK PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO `categorie` (`id`, `libelle`) VALUES
('CH', 'Cheveux'),
('FO', 'Forme'),
('PS', 'Protection Solaire');

#------------------------------------------------------------
# Table: commande
#------------------------------------------------------------

CREATE TABLE commande(
        id               Char (32) NOT NULL ,
        dateCommande     Date ,
        nomPrenomClient  Char (32) ,
        adresseRueClient Char (32) ,
        cpClient         Char (5) ,
        villeClient      Char (32) ,
        mailClient       Char (50) ,
        id_utilisateurs  Int (11)
        ,CONSTRAINT commande_PK PRIMARY KEY (id)

        ,CONSTRAINT commande_utilisateurs_FK FOREIGN KEY (id_utilisateurs) REFERENCES utilisateurs(id)
)ENGINE=InnoDB;
INSERT INTO `commande` (`id`, `dateCommande`, `nomPrenomClient`, `adresseRueClient`, `cpClient`, `villeClient`, `mailClient`) VALUES
('1101461660', '2011-07-12', 'Dupont Jacques', '12, rue haute', '75001', 'Paris', 'dupont@wanadoo.fr'),
('1101461665', '2011-07-20', 'Durant Yves', '23, rue des ombres', '75012', 'Paris', 'durant@free.fr');


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------


CREATE TABLE produit(
        id           Char (32) NOT NULL ,
        description  Char (50) ,
        prix         Decimal (10) ,
        image        Char (100) ,
        idCategorie Char (32) NOT NULL
	,CONSTRAINT produit_PK PRIMARY KEY (id)

	,CONSTRAINT produit_categorie_FK FOREIGN KEY (idCategorie) REFERENCES categorie(id)
)ENGINE=InnoDB;
INSERT INTO `produit` (`id`, `description`, `prix`, `image`, `idCategorie`) VALUES
('c01', 'Laino Shampooing Douche au Thé Vert BIO', '4.00', 'images/laino-shampooing-douche-au-the-vert-bio-200ml.png', 'CH'),
('c02', 'Klorane fibres de lin baume après shampooing', '10.80', 'images/klorane-fibres-de-lin-baume-apres-shampooing-150-ml.jpg', 'CH'),
('c03', 'Weleda Kids 2in1 Shower & Shampoo Orange fruitée', '4.00', 'images/weleda-kids-2in1-shower-shampoo-orange-fruitee-150-ml.jpg', 'CH'),
('c04', 'Weleda Kids 2in1 Shower & Shampoo vanille douce', '4.00', 'images/weleda-kids-2in1-shower-shampoo-vanille-douce-150-ml.jpg', 'CH'),
('c05', 'Klorane Shampooing sec à l\'extrait d\'ortie', '6.10', 'images/klorane-shampooing-sec-a-l-extrait-d-ortie-spray-150ml.png', 'CH'),
('c06', 'Phytopulp mousse volume intense', '18.00', 'images/phytopulp-mousse-volume-intense-200ml.jpg', 'CH'),
('c07', 'Bio Beaute by Nuxe Shampooing nutritif', '8.00', 'images/bio-beaute-by-nuxe-shampooing-nutritif-200ml.png', 'CH'),
('f01', 'Nuxe Men Contour des Yeux Multi-Fonctions', '12.05', 'images/nuxe-men-contour-des-yeux-multi-fonctions-15ml.png', 'FO'),
('f02', 'Tisane romon nature sommirel bio sachet 20', '5.50', 'images/tisane-romon-nature-sommirel-bio-sachet-20.jpg', 'FO'),
('f03', 'La Roche Posay Cicaplast crème pansement', '11.00', 'images/la-roche-posay-cicaplast-creme-pansement-40ml.jpg', 'FO'),
('f04', 'Futuro sport stabilisateur pour cheville', '26.50', 'images/futuro-sport-stabilisateur-pour-cheville-deluxe-attelle-cheville.png', 'FO'),
('f05', 'Microlife pèse-personne électronique weegschaal', '63.00', 'images/microlife-pese-personne-electronique-weegschaal-ws80.jpg', 'FO'),
('f06', 'Melapi Miel Thym Liquide 500g', '6.50', 'images/melapi-miel-thym-liquide-500g.jpg', 'FO'),
('f07', 'Meli Meliflor Pollen 200g', '8.60', 'images/melapi-pollen-250g.jpg', 'FO'),
('p01', 'Avène solaire Spray très haute protection', '22.00', 'images/avene-solaire-spray-tres-haute-protection-spf50200ml.png', 'PS'),
('p02', 'Mustela Solaire Lait très haute Protection', '17.50', 'images/mustela-solaire-lait-tres-haute-protection-spf50-100ml.jpg', 'PS'),
('p03', 'Isdin Eryfotona aAK fluid', '29.00', 'images/isdin-eryfotona-aak-fluid-100-50ml.jpg', 'PS'),
('p04', 'La Roche Posay Anthélios 50+ Brume Visage', '8.75', 'images/la-roche-posay-anthelios-50-brume-visage-toucher-sec-75ml.png', 'PS'),
('p05', 'Nuxe Sun Huile Lactée Capillaire Protectrice', '15.00', 'images/nuxe-sun-huile-lactee-capillaire-protectrice-100ml.png', 'PS'),
('p06', 'Uriage Bariésun stick lèvres SPF30 4g', '5.65', 'images/uriage-bariesun-stick-levres-spf30-4g.jpg', 'PS'),
('p07', 'Bioderma Cicabio creme SPF50+ 30ml', '13.70', 'images/bioderma-cicabio-creme-spf50-30ml.png', 'PS');

#------------------------------------------------------------
# Table: contenir
#------------------------------------------------------------

CREATE TABLE contenir(
        idProduit   Char (32) NOT NULL ,
        idCommande Char (32) NOT NULL
        ,CONSTRAINT contenir_PK PRIMARY KEY (idProduit,idCommande)

        ,CONSTRAINT contenir_produit_FK FOREIGN KEY (idProduit) REFERENCES produit(id)
        ,CONSTRAINT contenir_commande0_FK FOREIGN KEY (idCommande) REFERENCES commande(id)
)ENGINE=InnoDB;
INSERT INTO `contenir` (`idCommande`, `idProduit`) VALUES
('1101461660', 'f03'),
('1101461660', 'p01'),
('1101461665', 'f05'),
('1101461665', 'p06');





