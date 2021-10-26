<?php 
/**
* Vista modelo usuario
*/
class Users {

	private $id;
	private $username;	
	private $password;
	private $realname;
	private $type;

	//Constructor del usuario
	function __construct($id, $username, $password, $realname, $type) {
		$this->setIdUsers($id);
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setRealname($realname);	
		$this->setType($type);		
	}

	//Getters y setters de usuario
	public function getIdUsers() {
		return $this->id;
	}

	public function setIdUsers($id) {
		$this->id = $id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		$pass = $_POST['password'];    
		$passHash = password_hash($pass, PASSWORD_BCRYPT);
		return $passHash;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getRealname() {
		return $this->realname;
	}

	public function setRealname($realname) {
		$this->realname = $realname;
	}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}


	// Inserta valores nuevos a la tabla usuario 
	public static function save($users) {
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO users VALUES (NULL,:username,:password,:realname,:type)');

		$insert->bindValue('username',$users->getUsername());
		$insert->bindValue('password',$users->getPassword());		
		$insert->bindValue('realname',$users->getRealname());
		$insert->bindValue('type',$users->getType());			
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos del usuario
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaUsers=[];

		$select=$db->query('SELECT * 
							FROM users 
							ORDER BY id');

		foreach($select->fetchAll() as $users){
			$listaUsers[]=new Users($users['id'],$users['username'],$users['password'],$users['realname'],
				$users['type']);
		}
		
		return $listaUsers;
	}

	//Hace búsquedas por el nombre del usuario
	public static function searchByName($username){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM users
							  WHERE username=:username');
		$select->bindValue('username',$username);
		$select->execute();

		$usersDb=$select->fetch();

		$users = new Users ($usersDb['id'],$usersDb['username'], $usersDb['password'], 
							  $usersDb['realname'],$usersDb['type']);
	
		return $users;

	}

	//Hace búsquedas por el id
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM users 
							  WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$usersDb=$select->fetch();


		$users = new Users ($usersDb['id'],$usersDb['username'], $usersDb['password'], 
							  $usersDb['realname'],$usersDb['type']);
							  
		return $users;
	}

	//Actualiza los valores de la tabla usuario
	public static function update($users){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE users SET username=:username, password=:password,
			realname=:realname,type=:type WHERE id=:id');
		$update->bindValue('id',$users->getIdUsers());
		$update->bindValue('username', $users->getUsername());
		$update->bindValue('password',$users->getPassword());
		$update->bindValue('realname',$users->getRealname());
		$update->bindValue('type',$users->getType());
		$update->execute();
	}

	//Borra un usuario por su id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM users WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>