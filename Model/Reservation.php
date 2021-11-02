<?php 
/**
* Vista modelo reservations
*/
class Reservations
{
	private $idResource;
	private $idUser;
	private $idTimeSlot;

	//Constructor de reservations
	function __construct($idResource, $idUser, $idTimeSlot)
	{
		$this->setIdResource($idResource);
		$this->setIdUser($idUser);
		$this->setIdTimeSlot($idTimeSlot);
				
	}

	//Getters y setters de reservations
	public function getIdResource()
	{
		return $this->idResource;
	}

	public function setIdResource($idResource)
	{
		$this->idResource = $idResource;
	}

	public function getIdUser()
	{
		return $this->idUser;
	}

	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
	}

	public function getIdTimeSlot()
	{
		return $this->idTimeSlot;
	}

	public function setIdTimeSlot($idTimeSlot)
	{
		$this->idTimeSlot = $idTimeSlot;
	}

	// Inserta valores nuevos a la tabla reservations	 
	public static function save($reservations)
	{
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO reservations VALUES (:idResource,:idUser,:idTimeSlot)');
		
		$insert->bindValue('idResource',$reservations->getIdResource());
		$insert->bindValue('idUser',$reservations->getIdUser());
		$insert->bindValue('idTimeSlot',$reservations->getIdTimeSlot());	
		$insert->execute();
	}
}
?>