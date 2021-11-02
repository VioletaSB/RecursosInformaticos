<?php 
/**
* Vista modelo resources
*/
class Resources
{
	private $id;
	private $name;
	private $description;
	private $location;
	private $image;

	//Constructor de resources
	function __construct($id, $name, $description, $location, $image)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setDescription($description);
		$this->setLocation($location);
		$this->setImage($image);		
	}

	//Getters y setters de resources
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getLocation(){
		return $this->location;
	}

	public function setLocation($location){
		$this->location = $location;
	}

	public function getImage(){
			$dir_subida = '../RecursosInformaticos/images/';
            $imagenRuta = $dir_subida . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];

            //COMPROBACIÓN ELIMINAR
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagenRuta)) {
				require_once('Views/Errors/uploadSuccess.php');
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
		return $image;
	}

	public function obtenerImagen() {
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

	// Inserta valores nuevos a la tabla resources	 
	public static function save($resources){
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO resources VALUES (NULL, :name,:description,:location,
			:image)');

		$insert->bindValue('name',$resources->getName());
		$insert->bindValue('description',$resources->getDescription());
		$insert->bindValue('location',$resources->getLocation());
		$insert->bindValue('image',$resources->getImage());		
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos de resources
	 * y ordenándolos por su id
	 */
	public static function all()
	{
		$db=Db::getConnect();
		$listaResources=[];

		$select=$db->query('SELECT * 
							FROM resources 
							ORDER BY id');

		foreach($select->fetchAll() as $resources){
			$listaResources[]=new Resources($resources['id'],$resources['name'],$resources['description'],
				$resources['location'],$resources['image']);
		}
		
		return $listaResources;
	}

	//Hace búsquedas por el nombre
	public static function searchByName($name){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM resources
							  WHERE name=:name');
		$select->bindValue('name',$name);
		$select->execute();

		$resourcesDb=$select->fetch();

		$resources = new Resources ($resourcesDb['id'],$resourcesDb['name'], $resourcesDb['description'], 
							  $resourcesDb['location'], $resourcesDb['image']);
	
		return $resources;

	}

	//Hace búsquedas por el id
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM resources 
							  WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$resourcesDb=$select->fetch();


		$resources = new Resources ($resourcesDb['id'],$resourcesDb['name'], $resourcesDb['description'], 
							  $resourcesDb['location'], $resourcesDb['image']);
							  
		return $resources;

	}

	//Actualiza los valores de la tabla resources
	public static function update($resources){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE resources SET name=:name, description=:description,
			location=:location, image=:image WHERE id=:id');
		$update->bindValue('name', $resources->getName());
		$update->bindValue('description',$resources->getDescription());
		$update->bindValue('location',$resources->getLocation());
		$update->bindValue('image',$resources->obtenerImagen());
		$update->bindValue('id',$resources->getId());
		$update->execute();
	}

	//Borra a un resources por su id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM resources WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>