<?php
require_once("Rest.php");
require_once("config.php");

class API extends Rest {

	public $data = "";
	private $db = NULL;
	private $mysqli = NULL;
	public function __construct(){
		parent::__construct();				// Init parent contructor
		$this->dbConnect();					// Initiate Database connection
	}
	
	/*
	 *  Connect to Database
	*/
	private function dbConnect(){
		$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB);
	}
	
	/*
	 * Dynmically call the method based on the query string
	 */
	public function processApi(){
		$func = strtolower(trim(str_replace("/","",@$_REQUEST['x'])));
		if((int)method_exists($this,$func) > 0)
			$this->$func();
		else
			$this->response('',404); // If the method not exist with in this class "Page not found".
	}
	
	private function Quran(){
		//sleep(1)	
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
                
                $Suraid = (int)$this->_request['SuraID'];
		$Verseid = (int)$this->_request['VerseID'];
		
		$query="SELECT distinct s.surat_indonesia,q.AyahText,qi.AyahText as terjemahan from daftarsurat s"
                        . " left join Quran Q on Q.suraID = s.index"
                        . "  left join QuranIndonesia QI on QI.suraID = Q.SuraID"
                        . " and Q.VerseID=QI.VerseID "
                        . " where Q.suraID=$Suraid and Q.verseID=$Verseid "
                        . "  order by Q.SuraID,Q.VerseID ";
		$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

		if($r->num_rows > 0){
			$result = array();
			while($row = $r->fetch_assoc()){
				$result[] = $row;
			}
			$this->response($this->json($result), 200); // send user details
		}
		$this->response('',204);	// If no records "No Content" status
	}
	
	private function NamaSurat(){
		//sleep(1)	
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
                
                $Suraid = (int)$this->_request['SuraID'];
		
		$query="SELECT s.surat_indonesia from daftarsurat s"
                       . " where S.Index=$Suraid  ";
                $r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

		if($r->num_rows > 0){
			$result = array();
			while($row = $r->fetch_assoc()){
				$result[] = $row;
			}
			$this->response($this->json($result), 200); // send user details
		}
		$this->response('',204);	// If no records "No Content" status
	}
	
	
	private function customer(){	
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
		$id = (int)$this->_request['id'];
		if($id > 0){	
			$query="SELECT distinct c.id, c.name, c.email, c.address, c.city, c.state, c.zip, c.country FROM customers c where c.id=$id";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0) {
				$result = $r->fetch_assoc();	
				$this->response($this->json($result), 200); // send user details
			}
		}
		$this->response('',204);	// If no records "No Content" status
	}
	
	/*
	 *	Encode array into JSON
	*/
	private function json($data){
		if(is_array($data)){
			return json_encode($data);
		}
	}
}

// Initiiate Library

$api = new API;
$api->processApi();
?>