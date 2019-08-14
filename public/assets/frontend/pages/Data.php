<?php
class Data{
	
   private $firmware;
   private $serial;
   private $hours;
   private $UTC;
   private $logs;

   /**
    * Découpe la chaine DataString au format souhaité. Valeurs retourné dans les 
    **/
   public function cutDataString($dataString)
   {
      $this->firmware = substr($dataString, 1, 1); // 1 octet
      $this->serial = substr($dataString, 2, 8);   // 4 octets
      $this->hours = substr($dataString, 10, 4);   // 2 octets
      $this->UTC = substr($dataString, 14, 2);     // 1 octet
      $this->logs = substr($dataString, 16, 4);    // 2 octets
      
      /*$data_type = array(1, 4, 2, 1, 2);
      $array = array($this->firmware, $this->serial, $this->hours, $this->UTC, $this->logs);

      $y = 0;

      for($i = 0; i<10 ; $i++)
      {
         $array[$i] = substr($dataString, $y, $data_type[$i]);
         $y += $data_type[$i];
      }*/
      return true;
   }
 
   public function getString()
   {
      return $this->format_byte($this->firmware).$this->format_byte($this->serial).
              $this->format_byte($this->hours).$this->format_byte($this->UTC).$this->format_byte($this->logs);
   }

   public function firmware(){
   	
       return (int)$this->firmware.".0";
   }
   public function serial(){
      return substr($this->serial, 0, 2)." ".substr($this->serial, 2, 2)." ".substr($this->serial, 4, 4);
   }
   public function hours(){
      return $this->hours;
   }

   //TODO trouver une bonne solution pour stocker la valeur négative en base de donnée
   public function UTC(){
      $value = $this->UTC - 12;
      return $value;
   }
   public function logs(){
      return $this->logs;
   }
   
   public function setUTC($value){
      $this->UTC = $value + 12;
   }
   
   public function setSerial($value){
   		$this->serial = $value;
   }

   private function format_byte($value, $octets =1){
      //$value = dechex($value);
      if($octets == 1 && strlen($value) < 2){
         $value = "0".$value;
      }
      if($octets == 2 && strlen($value) < 4){
         while (strlen($value)<4){
            $value = "0".$value;
         }
      }
      if($octets == 4 && strlen($value) < 8){
         while (strlen($value)<8){
            $value = "0".$value;
         }
      }

      return $value;
   }
//################################################################################################	

   function Insert($DiffuserId, $data, $program)
   {
      $db = new mod_db();

      $DiffuserId = $db->quote_smart($DiffuserId);
      $data = $db->quote_smart($data);
      $program = $db->quote_smart($program);
      $db->insert("isens_Program", "Diffuser_Id, Data, Program", $db->format_Args($DiffuserId, $data, $program));
      $result = $db->objects("SELECT * FROM isens_Program WHERE Diffuser_Id = $DiffuserId");
      return $result;
   }

   function Select($Id)
   {
      $db = new mod_db();
      $Id = $db->quote_smart($Id);
      $result = $db->objects("SELECT * FROM isens_Program WHERE Id = $Id");
      return $result;
   }

   function Update($Id, $DiffuserId, $data, $program)
   {
      $db = new mod_db();

      $Id = $db->quote_smart($Id);
      $DiffuserId = $db->quote_smart($DiffuserId);
      $data = $db->quote_smart($data);
      $program = $db->quote_smart($program);

      $result = $db->update("isens_Program", "Diffuser_Id = $DiffuserId, Data = $data, Program = $program", "Id = $Id");
      return $result;
   }

   function Delete($Id)
   {
      $db = new mod_db();
      $Id = $db->quote_smart($Id);
      $result = $db->del("isens_Program", "id = $Id");
      return $result;
   }
}
?>