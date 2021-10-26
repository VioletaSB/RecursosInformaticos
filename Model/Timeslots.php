<?php 
/**
* Vista modelo tramos horarios
*/
class Time
{
	private $id;
	private $dayOfWeek;
	private $startTime;
	private $endTime;

	//Constructor de los tramos horarios
	function __construct($id, $dayOfWeek, $startTime, $endTime) {
		$this->setId($id);
		$this->setDayOfWeek($dayOfWeek);
		$this->setStartTime($startTime);
		$this->setEndTime($endTime);			
	}

	//Getters y setters del tramo horario
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getDayOfWeek() {
		return $this->dayOfWeek;
	}

	public function setDayOfWeek($dayOfWeek) {
		$this->dayOfWeek = $dayOfWeek;
	}

	public function getStartTime() {
		return $this->startTime;
	}

	public function setStartTime($startTime) {
		$this->startTime = $startTime;
	}

	public function getEndTime() {
		return $this->endTime;
	}

	public function setEndTime($endTime) {
		$this->endTime = $endTime;
	}


	// Inserta valores nuevos a la tabla timeslots
	public static function save($time) {
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO timeslots VALUES (NULL,:dayOfWeek,:startTime,:endTime)');

		$insert->bindValue('dayOfWeek',$time->getDayOfWeek());
		$insert->bindValue('startTime',$time->getStartTime());		
		$insert->bindValue('endTime',$time->getEndTime());
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos de los tramos horarios
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaTime=[];

		$select=$db->query('SELECT * 
							FROM timeslots
							ORDER BY id');

		foreach($select->fetchAll() as $time){
			$listaTime[]=new Time($time['id'],$time['dayOfWeek'],$time['startTime'],
				$time['endTime']);
		}
		
		return $listaTime;
	}

	//Hace búsquedas por el id
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM timeslots 
							  WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$timeDb=$select->fetch();


		$time = new Time ($timeDb['id'],$timeDb['dayOfWeek'], $timeDb['startTime'], 
							  $timeDb['endTime']);
							  
		return $time;

	}

	//Actualiza los valores de la tabla tienda
	public static function update($time){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE timeslots SET dayOfWeek=:dayOfWeek, startTime=:startTime,
			endTime=:endTime WHERE id=:id');

		$update->bindValue('id', $time->getId());
		$update->bindValue('dayOfWeek', $time->getDayOfWeek());
		$update->bindValue('startTime',$time->getStartTime());
		$update->bindValue('endTime',$time->getEndTime());
		$update->execute();
	}

	//Borra un tramo horario por su id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM timeslots WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>