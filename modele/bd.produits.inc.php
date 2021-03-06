<?php

/** 
 * Mission 3 : architecture MVC GsbParam
 
 * @file bd.produits.inc.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    2.0
 * @date juin 2021
 * @details contient les fonctions d'accès BD à la table produits
 */
include_once 'bd.inc.php';

	/**
	 * Retourne toutes les catégories sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des catégories 
	*/
	function getLesCategories()
	{
		try 
		{
        $monPdo = connexionPDO();
		$req = 'SELECT id, libelle from categorie';
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Retourne toutes les informations d'une catégorie passée en paramètre
	 *
	 * @param string $idCategorie l'id de la catégorie
	 * @return array $laLigne le tableau associatif des informations de la catégorie 
	*/
	function getLesInfosCategorie($idCategorie)
	{
		try 
		{
        $monPdo = connexionPDO();
		$req = 'SELECT id, libelle FROM categorie WHERE id="'.$idCategorie.'"';
		$res = $monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param string $idCategorie  l'id de la catégorie dont on veut les produits
 * @return array $lesLignes un tableau associatif  contenant les produits de la categ passée en paramètre
*/

	function getLesProduitsDeCategorie($idCategorie)
	{
		try 
		{
        $monPdo = connexionPDO();
	    $req='SELECT id, description, prix, image, idCategorie from produit where idCategorie ="'.$idCategorie.'"';
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param array $desIdProduit tableau d'idProduits
 * @return array $lesProduits un tableau associatif contenant les infos des produits dont les id ont été passé en paramètre
*/
	function getLesProduitsDuTableau($desIdProduit)
	{
		try 
		{
        $monPdo = connexionPDO();
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = 'SELECT id, description, prix, image, idCategorie from produit where id = "'.$unIdProduit.'"';
				$res = $monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Crée une commande 
	 *
	 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
	 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
	 * tableau d'idProduit passé en paramètre
	 * @param string $nom nom du client
	 * @param string $rue rue du client
	 * @param string $cp cp du client
	 * @param string $ville ville du client
	 * @param string $mail mail du client
	 * @param array $lesIdProduit tableau associatif contenant les id des produits commandés
	 
	*/
	function creerCommande($nom,$rue,$cp,$ville,$mail, $lesIdProduit )
	{
		try 
		{
        $monPdo = connexionPDO();
		// on récupère le dernier id de commande
		$req = 'SELECT max(id) as maxi from commande';
		$res = $monPdo->query($req);
		$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;// on place le dernier id de commande dans $maxi
		$idCommande = $maxi+1; // on augmente le dernier id de commande de 1 pour avoir le nouvel idCommande
		$date = date('Y/m/d'); // récupération de la date système
		$session = $_SESSION['login'];
		$req2 = "SELECT id from utilisateurs where email ='$session'";
		$res2 = $monPdo->query($req2);
		$ligne2 = $res2->fetch();
		$idUser = $ligne2[0];
		$req = "INSERT into commande (id, dateCommande, nomPrenomCLient, adresseRueClient, cpClient, villeClient, mailClient, id_utilisateurs) values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail','$idUser')";
		$res = $monPdo->exec($req);
		// insertion produits commandés
		foreach($lesIdProduit as $unIdProduit)
		{
			$req = "INSERT into contenir (idProduit, idCommande) VALUES ('$unIdProduit','$idCommande')";
			$res = $monPdo->exec($req);
		}
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Retourne les produits concernés par le tableau des idProduits passée en argument
	 *
	 * @param int $mois un numéro de mois entre 1 et 12
	 * @param int $an une année
	 * @return array $lesCommandes un tableau associatif contenant les infos des commandes du mois passé en paramètre
	*/
	function getLesCommandesDuMois($mois, $an)
	{
		try 
		{
        	$monPdo = connexionPDO();
			$req = 'SELECT id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande where YEAR(dateCommande)= '.$an.' AND MONTH(dateCommande)='.$mois;
			$res = $monPdo->query($req);
			$lesCommandes = $res->fetchAll();
			return $lesCommandes;
		}
		catch (PDOException $e) 
		{
        	print "Erreur !: " . $e->getMessage();
        	die();
		}
	}
	/**
	 * Retourne les liste de toutes les commandes en cour
	 * @return $allCommandes un tableau contenant toutes les commandes en cour
	 */
	function getCommandes () {
		try{
			$monPdo = connexionPDO();
			$req = "SELECT c.id, c.dateCommande, c.nomPrenomClient, c.adresseRueClient, c.cpClient, c.villeClient, c.mailClient, c.id_utilisateurs, statut.libelle as statut from commande c join statut on statut.id=c.id_statut where c.id_statut != 'L'";
			$res = $monPdo->query($req);
			$allCommandes = $res->fetchAll();
			return $allCommandes;
		}
		catch (PDOException $e) {
        	print "Erreur !: " . $e->getMessage();
        	die();
		}
		
	}

	/**
	 * Retourne les commandes terminées
	 * @return $commandesF : liste de toutes lsee commandes terminées
	 */
	function getCommandesF () {
		try{
			$monPdo = connexionPDO();
			$req = "SELECT c.id, c.dateCommande, c.nomPrenomClient, c.adresseRueClient, c.cpClient, c.villeClient, c.mailClient, c.id_utilisateurs, statut.libelle as statut from commande c join statut on statut.id=c.id_statut where c.id_statut = 'L'";
			$res = $monPdo->query($req);
			$commandesF = $res->fetchAll();
			return $commandesF;
		}
		catch (PDOException $e) {
        	print "Erreur !: " . $e->getMessage();
        	die();
		}
	}

	/**
	 * Retourne l'id et le statut de la commande pour l'update du statut
	 * @param $idCommande : l'id de la commande séléctionée 
	 * 
	 */
	function majCommande ($statut, $idCommande) {
		$monPdo = connexionPDO();
		$req = 'UPDATE commande SET id_statut = "'.$statut.'" WHERE id = "'.$idCommande.'"';
		$res = $monPdo->query($req);
	}

	/**
	 * Retourne une commande ne fonction de son id
	 * @param $id : id de la commande 
	 * @return $laCommande : la ligne complete de la commande selectionnée
	 */
	function getCommandeById ($idCommande) {
			$monPdo = connexionPDO();
			$req = 'SELECT c.id, c.dateCommande, c.nomPrenomClient, c.adresseRueClient, c.cpClient, c.villeClient, c.mailClient, c.id_utilisateurs, statut.libelle as statut from commande c join statut on statut.id=c.id_statut where '.$idCommande.'= c.id';
			$res = $monPdo->query($req);
			$laCommande = $res->fetchAll();
			return $laCommande;
	}
	/**
	 * Fonction qui retourne les commandes d'un utilisateur à partir de son id dans la bdd
	 * @param $idUser : l'id de la personne connectée 
	 * @return $commandeUser : la ou les commmandes faites par la personne connectée
	 */
	function getCommandeByUser ($idUser) {
		$monPdo = connexionPDO();
		$req = 'SELECT c.id, c.dateCommande, c.nomPrenomClient, c.adresseRueClient, c.cpClient, c.villeClient, c.mailClient, c.id_utilisateurs, statut.libelle as statut from commande c join statut on statut.id=c.id_statut where '.$idUser.'= c.id_utilisateurs';
		$res = $monPdo->query($req);
		$commandeUser = $res->fetchAll();
		return $commandeUser;
	}

	/**
	 * Fonction qui retourne l'id de la personne connectée à partir de so identifiant de connexion
	 * @param $mail : l'identifiant de connexion de la personne 
	 * @return $idUser : l'id dans la bdd de la personne connectée
	 */
	function getIdUser ($mail) {
		$monPdo = connexionPDO();
		$req = 'SELECT id from utilisateurs WHERE email = "'.$mail.'"';
		$res = $monPdo->query($req);
		$idUser = $res->fetch();
		return $idUser;
	}

	/**
	 * Fonction qui retourne tous les produits
	 * @return $produits : liste de tous les produits de la bdd
	 */
	function getProduits ($ordre) {
		$monPdo = connexionPDO();
		$req = 'SELECT id, description, prix, image FROM produit ORDER BY prix '.$ordre;
		$res = $monPdo->query($req);
		$produits = $res->fetchAll();
		return $produits;
	}
?>