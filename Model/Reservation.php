<?php 
/**
* Vista modelo reservations REVISAR
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

	//Hace búsquedas por el id
	public static function searchById($id)
	{
		$db=Db::getConnect();
		$select=$db->prepare('SELECT resources.name, users.realname, timeslots.dayOfWeek, timeslots.startTime, timeslots.endTime 
                              FROM reservations
                              INNER JOIN timeslots ON reservations.idTimeSlot = timeslots.id
                              INNER JOIN users ON reservations.idUser = users.id
                              INNER JOIN resources ON reservations.idResource = resources.id
							  WHERE idTimeslots=:idTimeslots;');
		$select->bindValue('id',$id);
		$select->execute();

		$reservationsDb=$select->fetch();


		$reservations=new Reservations($reservations['name'],$reservations['image'],$reservations['realname'],
				$reservations['dayofweek'],$reservations['starttime'],$reservations['endtime']);
							  
		return $reservations;

	}

	//Borra a un reservations por su id
	public static function delete($id)
	{
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM reservations WHERE idResource=:idResource');
        $delete=$db->prepare('DELETE  FROM reservations WHERE idUser=:idUser');
        $delete=$db->prepare('DELETE  FROM reservations WHERE idTimeSlot=:idTimeSlot');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>