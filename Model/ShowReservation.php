<?php 
/**
* Vista modelo reservations
*/
class ShowReservations
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
			$listaReservations[]=new ShowReservations($reservations['name'],$reservations['image'],$reservations['realname'],
				$reservations['dayOfWeek'],$reservations['startTime'],$reservations['endTime']);
		}
		
		return $listaReservations;
	}
}

?>