<?php

class Beleptet_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "select id, csaladi_nev, utonev, jogosultsag from felhasznalok where bejelentkezes='".$vars['login']."' and jelszo='".sha1($vars['password'])."'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
			switch(count($felhasznalo)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Sikertelen belépési";
					break;
                case 1:
                    $retData['eredmeny'] = "OK";  // <-- Corrected variable name
                    $retData['uzenet'] = "Üdv: ".$felhasznalo[0]['utonev'].", böngéssz az udvaraink között!";
                    $_SESSION['userid'] =  $felhasznalo[0]['id'];
                    $_SESSION['userlastname'] =  $felhasznalo[0]['csaladi_nev'];
                    $_SESSION['userfirstname'] =  $felhasznalo[0]['utonev'];
                    $_SESSION['userlevel'] = $felhasznalo[0]['jogosultsag'];
                    Menu::setMenu();
                    break;

                default:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Nem azonosítható!";
			}
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>



