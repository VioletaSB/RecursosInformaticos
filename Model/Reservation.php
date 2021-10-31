<?php 
/**
* Vista modelo reservations REVISAR
*/
class Reservations
{
	private $name;
	private $image;
	private $realname;
    private $dayofweek;
	private $starttime;
	private $endtime;
    

	//Constructor de reservations
	function __construct($name, $image, $realname, $dayofweek, $starttime, $endtime)
	{
		$this->setName($name);
		$this->setImage($image);
		$this->setRealname($realname);
		$this->setDayOfWeek($dayofweek);
		$this->setStartTime($starttime);
        $this->setEndTime($endtime);		
	}

	//Getters y setters de reservations
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

    public function getRealname(){
		return $this->realname;
	}

	public function setRealname($realname){
		$this->realname = $realname;
	}

	public function getDayOfWeek(){
		return $this->dayOfWeek;
	}

	public function setDayOfWeek($dayOfWeek){
		$this->dayOfWeek = $dayOfWeek;
	}

	public function getStartTime(){
		return $this->startTime;
	}

	public function setStartTime($startTime){
		$this->startTime = $startTime;
	}

    public function getEndTime(){
		return $this->endTime;
	}

	public function setEndTime($endTime){
		$this->endTime = $endTime;
	}

	// Inserta valores nuevos a la tabla reservations	 
	public static function save($reservations){
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO reservations VALUES (NULL, :name,:description,:location,
			:image)');

		$insert->bindValue('name',$resources->getName());
		$insert->bindValue('description',$resources->getDescription());
		$insert->bindValue('location',$resources->getLocation());
		$insert->bindValue('image',$resources->getImage());		
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos de reservations */
	public static function all()
    {
		$db=Db::getConnect();
		$listaReservations=[];

		$select=$db->query('SELECT resources.name, resources.image, users.realname, timeslots.dayOfWeek, timeslots.startTime, timeslots.endTime 
                            FROM reservations
                            INNER JOIN timeslots ON reservations.idTimeSlot = timeslots.id
                            INNER JOIN users ON reservations.idUser = users.id
                            INNER JOIN resources ON reservations.idResource = resources.id
                            ORDER BY users.realname;');

		foreach($select->fetchAll() as $reservations){
			$listaReservations[]=new Reservations($reservations['name'],$reservations['image'],$reservations['realname'],
				$reservations['dayOfWeek'],$reservations['startTime'],$reservations['endTime']);
		}
		
		return $listaReservations;
	}

	//Hace búsquedas por el id
	public static function searchById($id){
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
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM reservations WHERE idResource=:idResource');
        $delete=$db->prepare('DELETE  FROM reservations WHERE idUser=:idUser');
        $delete=$db->prepare('DELETE  FROM reservations WHERE idTimeSlot=:idTimeSlot');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>