<?php
/**
 * Description of Program
 *
 * @author Antoine Bourget
 * @copyright Exhalia (exhalia.fr)
 * @version 1.0
 * @desc Permet de trier les program pour les sortir en séquences
 */
class Program {

   // séquence 1
   private $seq1timeBegin;        // heure début (int)
   private $seq1timeEnd;          // heure fin (int)
   private $seq1intensity;        // intensité de diffusion (int)
   private $seq1timeOn;           // temps de diffusion (int)
   private $seq1timeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seq1days = array();   // jours de la semaine (array de int)

    // séquence 2
   private $seq2timeBegin;        // heure début (int)
   private $seq2timeEnd;          // heure fin (int)
   private $seq2intensity;        // intensité de diffusion (int)
   private $seq2timeOn;           // temps de diffusion (int)
   private $seq2timeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seq2days = array();   // jours de la semaine (array de int)

   // séquence 3
   private $seq3timeBegin;        // heure début (int)
   private $seq3timeEnd;          // heure fin (int)
   private $seq3intensity;        // intensité de diffusion (int)
   private $seq3timeOn;           // temps de diffusion (int)
   private $seq3timeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seq3days = array();   // jours de la semaine (array de int)

   // séquence 4
   private $seq4timeBegin;        // heure début (int)
   private $seq4timeEnd;          // heure fin (int)
   private $seq4intensity;        // intensité de diffusion (int)
   private $seq4timeOn;           // temps de diffusion (int)
   private $seq4timeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seq4days = array();   // jours de la semaine (array de int)

   // séquence 5
   private $seq5timeBegin;        // heure début (int)
   private $seq5timeEnd;          // heure fin (int)
   private $seq5intensity;        // intensité de diffusion (int)
   private $seq5timeOn;           // temps de diffusion (int)
   private $seq5timeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seq5days = array();   // jours de la semaine (array de int)


   // New séquence
   private $seqNtimeBegin;        // heure début (int)
   private $seqNtimeEnd;          // heure fin (int)
   private $seqNintensity;        // intensité de diffusion (int)
   private $seqNtimeOn;           // temps de diffusion (int)
   private $seqNtimeOff;          // temps de repos (entre 2 diffusions)(int)
   private $seqNdays = array();   // jours de la semaine (array de int)


   private $array;
  
   public function CutProgramString($programString) {
     // ######### découpage et mise en array de la chaine ##########
     
            
      $i = 0;
      for($day = 0; $day <= 6; $day++)    // pour chaque jour
      {
         for($sequence = 0; $sequence <= 4; $sequence++) // pour chaque séquence
         {
            $Prog[$day][$sequence]["begin"] = $this->formatNumber(substr($programString, $i, 4), 2);
            $Prog[$day][$sequence]["end"] = $this->formatNumber(substr($programString, $i+4, 4), 2);
            $Prog[$day][$sequence]["int"] = $this->formatNumber(substr($programString, $i+8, 2));
            $Prog[$day][$sequence]["on"] = $this->formatNumber(substr($programString, $i+10, 2));
            $Prog[$day][$sequence]["off"] = $this->formatNumber(substr($programString, $i+12, 2));
            $i+=14;
         }
      }
		//echo "<br /><br />";

      // ######### Fin découpage de la chaine ##########

      $temp_sequence = 0;

      //on parcour chaque séquences de chaque jours et si une séquence correspond à celle recherché on rajoute le jour
      for($day=0; $day<=6; $day++)
      {
         for($sequence=0; $sequence<=4; $sequence++)
         {
            if($Prog[$day][$sequence]["begin"] != "0000" && $Prog[$day][$sequence]["end"] != "0000" && $Prog[$day][$sequence]["int"] != "00")
            {
            	//echo "before : ".$temp_sequence." @@ ".$Prog[$day][$sequence]["begin"]." /// ".$Prog[$day][$sequence]["end"]." /// ".$Prog[$day][$sequence]["int"]." /// ".$Prog[$day][$sequence]["on"]." /// ".$Prog[$day][$sequence]["off"]."<br />";

               // si valeur non vide
               if($temp_sequence == 0)
               {
               	//echo "sequence created !<br />";
                  $temp_sequence++;
                  $this->seq1timeBegin = $Prog[$day][$sequence]["begin"];
                  $this->seq1timeEnd = $Prog[$day][$sequence]["end"];
                  $this->seq1intensity = $Prog[$day][$sequence]["int"];
                  $this->seq1timeOn = $Prog[$day][$sequence]["on"];
                  $this->seq1timeOff = $Prog[$day][$sequence]["off"];
               }
              		
               // si valeur non vide et différente des autres, on la détermine comme séquence
               elseif( $temp_sequence == 1 
               		   && (( count(@array_diff($Prog[$day][$sequence], $Prog[$day][$sequence-1])) == 0 && $temp_sequence == $sequence) 
               		   || ($this->seq1timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq1timeEnd != $Prog[$day][$sequence]["end"] || $this->seq1intensity != $Prog[$day][$sequence]["int"] || $this->seq1timeOn != $Prog[$day][$sequence]["on"] || $this->seq1timeOff != $Prog[$day][$sequence]["off"])))
               {
                  //echo "sequence 2";
                  //echo "sequence created !<br />";
                  $temp_sequence++;
                  $this->seq2timeBegin = $Prog[$day][$sequence]["begin"];
                  $this->seq2timeEnd = $Prog[$day][$sequence]["end"];
                  $this->seq2intensity = $Prog[$day][$sequence]["int"];
                  $this->seq2timeOn = $Prog[$day][$sequence]["on"];
                  $this->seq2timeOff = $Prog[$day][$sequence]["off"];
               }
               // si valeur non vide et différente des autres, on la détermine comme séquence
               elseif($temp_sequence == 2 
               		   && (( count(@array_diff($Prog[$day][$sequence], $Prog[$day][$sequence-1])) == 0 && $temp_sequence == $sequence ) 
               		   || ($this->seq1timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq1timeEnd != $Prog[$day][$sequence]["end"] || $this->seq1intensity != $Prog[$day][$sequence]["int"]|| $this->seq1timeOn != $Prog[$day][$sequence]["on"] || $this->seq1timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq2timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq2timeEnd != $Prog[$day][$sequence]["end"] || $this->seq2intensity != $Prog[$day][$sequence]["int"]|| $this->seq2timeOn != $Prog[$day][$sequence]["on"] || $this->seq2timeOff != $Prog[$day][$sequence]["off"])))
               {
               	  //echo "sequence 3";
                  //echo "sequence created !<br />";
                  $temp_sequence++;
                  $this->seq3timeBegin = $Prog[$day][$sequence]["begin"];
                  $this->seq3timeEnd = $Prog[$day][$sequence]["end"];
                  $this->seq3intensity = $Prog[$day][$sequence]["int"];
                  $this->seq3timeOn = $Prog[$day][$sequence]["on"];
                  $this->seq3timeOff = $Prog[$day][$sequence]["off"];
               }
               // si valeur non vide et différente des autres, on la détermine comme séquence
               elseif($temp_sequence == 3 
                       && (( count(@array_diff($Prog[$day][$sequence], $Prog[$day][$sequence-1])) == 0 && $temp_sequence == $sequence ) 
               		   || ($this->seq1timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq1timeEnd != $Prog[$day][$sequence]["end"] || $this->seq1intensity != $Prog[$day][$sequence]["int"]|| $this->seq1timeOn != $Prog[$day][$sequence]["on"] || $this->seq1timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq2timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq2timeEnd != $Prog[$day][$sequence]["end"] || $this->seq2intensity != $Prog[$day][$sequence]["int"]|| $this->seq2timeOn != $Prog[$day][$sequence]["on"] || $this->seq2timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq3timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq3timeEnd != $Prog[$day][$sequence]["end"] || $this->seq3intensity != $Prog[$day][$sequence]["int"]|| $this->seq3timeOn != $Prog[$day][$sequence]["on"] || $this->seq3timeOff != $Prog[$day][$sequence]["off"])))
               {
                  //echo "sequence 4";
                  //echo "sequence created !<br />";
                  $temp_sequence++;
                  $this->seq4timeBegin = $Prog[$day][$sequence]["begin"];
                  $this->seq4timeEnd = $Prog[$day][$sequence]["end"];
                  $this->seq4intensity = $Prog[$day][$sequence]["int"];
                  $this->seq4timeOn = $Prog[$day][$sequence]["on"];
                  $this->seq4timeOff = $Prog[$day][$sequence]["off"];
               }
               // si valeur non vide et différente des autres, on la détermine comme séquence
               elseif($temp_sequence == 4 
                       && (( count(@array_diff($Prog[$day][$sequence], $Prog[$day][$sequence-1])) == 0 && $temp_sequence == $sequence) 
               		   ||($this->seq1timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq1timeEnd != $Prog[$day][$sequence]["end"] || $this->seq1intensity != $Prog[$day][$sequence]["int"]|| $this->seq1timeOn != $Prog[$day][$sequence]["on"] || $this->seq1timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq2timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq2timeEnd != $Prog[$day][$sequence]["end"] || $this->seq2intensity != $Prog[$day][$sequence]["int"]|| $this->seq2timeOn != $Prog[$day][$sequence]["on"] || $this->seq2timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq3timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq3timeEnd != $Prog[$day][$sequence]["end"] || $this->seq3intensity != $Prog[$day][$sequence]["int"]|| $this->seq3timeOn != $Prog[$day][$sequence]["on"] || $this->seq3timeOff != $Prog[$day][$sequence]["off"])
                       && ($this->seq4timeBegin != $Prog[$day][$sequence]["begin"] || $this->seq4timeEnd != $Prog[$day][$sequence]["end"] || $this->seq4intensity != $Prog[$day][$sequence]["int"]|| $this->seq4timeOn != $Prog[$day][$sequence]["on"] || $this->seq4timeOff != $Prog[$day][$sequence]["off"])))
               {
                  //echo "sequence 5";
                  //echo "sequence created !<br />";
                  $temp_sequence++;
                  $this->seq5timeBegin = $Prog[$day][$sequence]["begin"];
                  $this->seq5timeEnd = $Prog[$day][$sequence]["end"];
                  $this->seq5intensity = $Prog[$day][$sequence]["int"];
                  $this->seq5timeOn = $Prog[$day][$sequence]["on"];
                  $this->seq5timeOff = $Prog[$day][$sequence]["off"];
               }
            }
         }
      }
      
      
      for($day=0; $day<=6; $day++)
      {
         for($sequence=0; $sequence<=4; $sequence++)
         {
         	if($this->seq1timeBegin == $Prog[$day][$sequence]["begin"] &&
         	   $this->seq1timeEnd == $Prog[$day][$sequence]["end"] && 
         	   $this->seq1intensity == $Prog[$day][$sequence]["int"] && 
         	   $this->seq1timeOn == $Prog[$day][$sequence]["on"] && 
         	   $this->seq1timeOff == $Prog[$day][$sequence]["off"]){
         	   	
   	          if(in_array($day+1, $this->seq1days) == false){
                   $this->seq1days[] = $day+1;
                   
                  $Prog[$day][$sequence]["begin"] = "#";
                  $Prog[$day][$sequence]["end"] =  "#";
                  $Prog[$day][$sequence]["int"] = "#";
                  $Prog[$day][$sequence]["on"] = "#";
                  $Prog[$day][$sequence]["off"] = "#";
                }
             }  

             if($this->seq2timeBegin == $Prog[$day][$sequence]["begin"] &&  
	            $this->seq2timeEnd == $Prog[$day][$sequence]["end"] && 
	            $this->seq2intensity == $Prog[$day][$sequence]["int"] && 
	            $this->seq2timeOn == $Prog[$day][$sequence]["on"] && 
	            $this->seq2timeOff == $Prog[$day][$sequence]["off"]){
	            	
             	  if(in_array($day+1, $this->seq2days) == false){
                   $this->seq2days[] = $day+1;
                   
                  $Prog[$day][$sequence]["begin"] = "#";
                  $Prog[$day][$sequence]["end"] =  "#";
                  $Prog[$day][$sequence]["int"] = "#";
                  $Prog[$day][$sequence]["on"] = "#";
                  $Prog[$day][$sequence]["off"] = "#";
                }
             }

             if($this->seq3timeBegin == $Prog[$day][$sequence]["begin"] &&  
             	$this->seq3timeEnd == $Prog[$day][$sequence]["end"] && 
             	$this->seq3intensity == $Prog[$day][$sequence]["int"]&& 
             	$this->seq3timeOn == $Prog[$day][$sequence]["on"] && 
             	$this->seq3timeOff == $Prog[$day][$sequence]["off"]){
             		
                if(in_array($day+1, $this->seq3days) == false){
                   $this->seq3days[] = $day+1;
                   
                  $Prog[$day][$sequence]["begin"] = "#";
                  $Prog[$day][$sequence]["end"] =  "#";
                  $Prog[$day][$sequence]["int"] = "#";
                  $Prog[$day][$sequence]["on"] = "#";
                  $Prog[$day][$sequence]["off"] = "#";
                }
             }

             if($this->seq4timeBegin == $Prog[$day][$sequence]["begin"] &&  
             	$this->seq4timeEnd == $Prog[$day][$sequence]["end"] && 
             	$this->seq4intensity == $Prog[$day][$sequence]["int"]&& 
             	$this->seq4timeOn == $Prog[$day][$sequence]["on"] && 
             	$this->seq4timeOff == $Prog[$day][$sequence]["off"]){
             		
                if(in_array($day+1, $this->seq4days) == false){
                   $this->seq4days[] = $day+1;
                   
                  $Prog[$day][$sequence]["begin"] = "#";
                  $Prog[$day][$sequence]["end"] =  "#";
                  $Prog[$day][$sequence]["int"] = "#";
                  $Prog[$day][$sequence]["on"] = "#";
                  $Prog[$day][$sequence]["off"] = "#";
                }
             }

             if($this->seq5timeBegin == $Prog[$day][$sequence]["begin"] &&  
              	$this->seq5timeEnd == $Prog[$day][$sequence]["end"] && 
              	$this->seq5intensity == $Prog[$day][$sequence]["int"]&& 
              	$this->seq5timeOn == $Prog[$day][$sequence]["on"] && 
              	$this->seq5timeOff == $Prog[$day][$sequence]["off"]){
              		
                if(in_array($day+1, $this->seq5days) == false){
                   $this->seq5days[] = $day+1;
                   
                  $Prog[$day][$sequence]["begin"]  = "#";
                  $Prog[$day][$sequence]["end"] =   "#";
                  $Prog[$day][$sequence]["int"] =  "#";
                  $Prog[$day][$sequence]["on"] = "#";
                  $Prog[$day][$sequence]["off"] =  "#";
                }
             }
         }
      }
      $this->array = $Prog;
      return $Prog;
   }

   public function insertNewSequence(){
      $temp_program = "";
      $temp_sequence = 0;
      
      for($day=1; $day<=7; $day++)
      {
      	 $temp_day = "";
         if(in_array($day, $this->seq1days)){
            $temp_day .= $this->convertDecimalToHexa($this->seq1timeBegin, 2) . $this->convertDecimalToHexa($this->seq1timeEnd, 2) . $this->convertDecimalToHexa($this->seq1intensity) . $this->convertDecimalToHexa($this->seq1timeOn) . $this->convertDecimalToHexa($this->seq1timeOff);
         }
         if(in_array($day, $this->seq2days)){
            $temp_day .= $this->convertDecimalToHexa($this->seq2timeBegin, 2) . $this->convertDecimalToHexa($this->seq2timeEnd, 2) . $this->convertDecimalToHexa($this->seq2intensity) . $this->convertDecimalToHexa($this->seq2timeOn) . $this->convertDecimalToHexa($this->seq2timeOff);
         }
         if(in_array($day, $this->seq3days)){
            $temp_day .= $this->convertDecimalToHexa($this->seq3timeBegin, 2) . $this->convertDecimalToHexa($this->seq3timeEnd, 2) . $this->convertDecimalToHexa($this->seq3intensity) . $this->convertDecimalToHexa($this->seq3timeOn) . $this->convertDecimalToHexa($this->seq3timeOff);
         }
         if(in_array($day, $this->seq4days)){
            $temp_day .= $this->convertDecimalToHexa($this->seq4timeBegin, 2) . $this->convertDecimalToHexa($this->seq4timeEnd, 2) . $this->convertDecimalToHexa($this->seq4intensity) . $this->convertDecimalToHexa($this->seq4timeOn) . $this->convertDecimalToHexa($this->seq4timeOff);
         }
         if(in_array($day, $this->seq5days)){
            $temp_day .= $this->convertDecimalToHexa($this->seq5timeBegin, 2) . $this->convertDecimalToHexa($this->seq5timeEnd, 2) . $this->convertDecimalToHexa($this->seq5intensity) . $this->convertDecimalToHexa($this->seq5timeOn) . $this->convertDecimalToHexa($this->seq5timeOff);
         } 
         if(in_array($day, $this->seqNdays)){
         	$temp_day .= $this->convertDecimalToHexa($this->seqNtimeBegin, 2) . $this->convertDecimalToHexa($this->seqNtimeEnd, 2) . $this->convertDecimalToHexa($this->seqNintensity) . $this->convertDecimalToHexa($this->seqNtimeOn) . $this->convertDecimalToHexa($this->seqNtimeOff);
         }

         while(strlen($temp_day) <  70){
            $temp_day .= "00";
         }

         $temp_program .= $temp_day;
      }
		//echo $temp_program;
      return $temp_program;
   }

   private function convertDecimalToHexa($value, $octets =1){
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
   private function formatNumber($value, $octets =1){
      //$value = hexdec($value);

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
   private function convertHoursToMinutes($hours, $minutes){
      $minutes += $hours*60;
      while(strlen($minutes) < 4){
         $minutes = "0".$minutes;
      }
      return $minutes;
   }
   private function convertMinutesToHours($minutes){
   	  $hour = $minutes/60;		
   	  $array = explode(".", $hour);
      $hour = $array[0];
      
      $minutes = $minutes%60;

      if(strlen($hour) < 2){
         $hour = "0".$hour;
      }

      if(strlen($minutes) < 2){
         $minutes = "0".$minutes;
      }
      return $hour.":".$minutes;
   }

   public function ValidateNewSequence($type = ""){
	  if(strstr($diff->Type, "MINI")){
		  return true;
	  }
   	  foreach ($this->seqNdays as $day) {
       		
         if((array_search($day, $this->seq1days) > 0) &&
               (($this->seq1timeBegin < $this->seqNtimeBegin && $this->seqNtimeBegin < $this->seq1timeEnd) ||
               ($this->seq1timeBegin < $this->seqNtimeEnd && $this->seqNtimeEnd < $this->seq1timeEnd))
           ){return false;}

         if((array_search($day, $this->seq2days) > 0) &&
               (($this->seq2timeBegin < $this->seqNtimeBegin && $this->seqNtimeBegin < $this->seq2timeEnd) ||
               ($this->seq2timeBegin < $this->seqNtimeEnd && $this->seqNtimeEnd < $this->seq2timeEnd))
           ){return false;}

         if((array_search($day, $this->seq3days) > 0) &&
               (($this->seq3timeBegin < $this->seqNtimeBegin && $this->seqNtimeBegin < $this->seq3timeEnd) ||
               ($this->seq3timeBegin < $this->seqNtimeEnd && $this->seqNtimeEnd < $this->seq3timeEnd))
           ){return false;}

         if((array_search($day, $this->seq4days) > 0) &&
               (($this->seq4timeBegin < $this->seqNtimeBegin && $this->seqNtimeBegin < $this->seq4timeEnd) ||
               ($this->seq4timeBegin < $this->seqNtimeEnd && $this->seqNtimeEnd < $this->seq4timeEnd))
           ){return false;}

         if((array_search($day, $this->seq5days) > 0) &&
               (($this->seq5timeBegin < $this->seqNtimeBegin && $this->seqNtimeBegin < $this->seq5timeEnd) ||
               ($this->seq5timeBegin < $this->seqNtimeEnd && $this->seqNtimeEnd < $this->seq5timeEnd))
           ){return false;}
      }
   	  return true;
   }


   // TEMP : getter temporaire
   public function getArray(){
      return $this->array;
   }

   // GETTER array des jours
   public function seq1days(){
      return $this->seq1days;
   }
   public function seq2days(){
      return $this->seq2days;
   }
   public function seq3days(){
      return $this->seq3days;
   }
   public function seq4days(){
      return $this->seq4days;
   }
   public function seq5days(){
      return $this->seq5days;
   }
   public function getseqNdays(){
      return $this->seqNdays;
   }

   // GETTER Valeur : Heure de début
   public function seq1timeBegin(){
      return $this->convertMinutesToHours($this->seq1timeBegin);
   }
   public function seq2timeBegin(){
      return $this->convertMinutesToHours($this->seq2timeBegin);
   }
   public function seq3timeBegin(){
      return $this->convertMinutesToHours($this->seq3timeBegin);
   }
   public function seq4timeBegin(){
      return $this->convertMinutesToHours($this->seq4timeBegin);
   }
   public function seq5timeBegin(){
      return $this->convertMinutesToHours($this->seq5timeBegin);
   }
   public function getseqNtimeBegin(){
      return $this->convertMinutesToHours($this->seqNtimeBegin);
   }

   //GETTER Valeur : Heure de fin
   public function seq1timeEnd(){
      return $this->convertMinutesToHours($this->seq1timeEnd);
   }
   public function seq2timeEnd(){
      return $this->convertMinutesToHours($this->seq2timeEnd);
   }
   public function seq3timeEnd(){
      return $this->convertMinutesToHours($this->seq3timeEnd);
   }
   public function seq4timeEnd(){
      return $this->convertMinutesToHours($this->seq4timeEnd);
   }
   public function seq5timeEnd(){
      return $this->convertMinutesToHours($this->seq5timeEnd);
   }
   public function getseqNtimeEnd(){
      return $this->convertMinutesToHours($this->seqNtimeEnd);
   }

   //GETTER Valeur : Intensité de diffusion
   public function seq1intensity(){
      return $this->seq1intensity;
   }
   public function seq2intensity(){
      return $this->seq2intensity;
   }
   public function seq3intensity(){
      return $this->seq3intensity;
   }
   public function seq4intensity(){
      return $this->seq4intensity;
   }
   public function seq5intensity(){
      return $this->seq5intensity;
   }
   public function getseqNintensity(){
      return $this->seqNintensity;
   }

   //GETTER Valeur : Temps de diffusion
   public function seq1timeOn(){
      return $this->formatNumber($this->seq1timeOn);
   }
   public function seq2timeOn(){
      return $this->formatNumber($this->seq2timeOn);
   }
   public function seq3timeOn(){
      return $this->formatNumber($this->seq3timeOn);
   }
   public function seq4timeOn(){
      return $this->formatNumber($this->seq4timeOn);
   }
   public function seq5timeOn(){
      return $this->formatNumber($this->seq5timeOn);
   }
   public function getseqNtimeOn(){
      return $this->formatNumber($this->seqNtimeOn);
   }

   //GETTER Valeur  : Temps d'attente entre deux diffusions
   public function seq1timeOff(){
      return $this->formatNumber($this->seq1timeOff);
   }
   public function seq2timeOff(){
      return $this->formatNumber($this->seq2timeOff);
   }
   public function seq3timeOff(){
      return $this->formatNumber($this->seq3timeOff);
   }
   public function seq4timeOff(){
      return $this->formatNumber($this->seq4timeOff);
   }
   public function seq5timeOff(){
      return $this->formatNumber($this->seq5timeOff);
   }
   public function getseqNtimeOff(){
      return $this->formatNumber($this->seqNtimeOff);
   }

   //SETTER : Nouvelle séquence
   public function seqNtimeBegin($value){
      $temp_array = explode(":", $value);
      $this->seqNtimeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function seqNtimeEnd($value){
      $temp_array = explode(":", $value);
      $this->seqNtimeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function seqNintensity($value){
      $this->seqNintensity = $value;
   }
   public function seqNtimeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seqNtimeOn = $value;
   }
   public function seqNtimeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seqNtimeOff = $value;
   }
   
   public function seqNdays($value){
   		
        $this->seqNdays = $value;
   }

   //SETTER : Séquence 1
   public function setseq1timeBegin($value){
      $temp_array = explode(":", $value);
      $this->seq1timeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq1timeEnd($value){
      $temp_array = explode(":", $value);
      $this->seq1timeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq1intensity($value){
      $this->seq1intensity = $value;
   }
   public function setseq1timeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seq1timeOn = $value;
   }
   public function setseq1timeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seq1timeOff = $value;
   }
   
   public function setseq1days($value){
   		
        $this->seq1days = $value;
   }

   //SETTER : Séquence 2
   public function setseq2timeBegin($value){
      $temp_array = explode(":", $value);
      $this->seq2timeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq2timeEnd($value){
      $temp_array = explode(":", $value);
      $this->seq2timeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq2intensity($value){
      $this->seq2intensity = $value;
   }
   public function setseq2timeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seq2timeOn = $value;
   }
   public function setseq2timeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seq2timeOff = $value;
   }
   
   public function setseq2days($value){
   		
        $this->seq2days = $value;
   }

   //SETTER : Séquence 3
   public function setseq3timeBegin($value){
      $temp_array = explode(":", $value);
      $this->seq3timeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq3timeEnd($value){
      $temp_array = explode(":", $value);
      $this->seq3timeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq3intensity($value){
      $this->seq3intensity = $value;
   }
   public function setseq3timeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seq3timeOn = $value;
   }
   public function setseq3timeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seq3timeOff = $value;
   }
   
   public function setseq3days($value){
   		
        $this->seq3days = $value;
   }

   //SETTER : Séquence 4
   public function setseq4timeBegin($value){
      $temp_array = explode(":", $value);
      $this->seq4timeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq4timeEnd($value){
      $temp_array = explode(":", $value);
      $this->seq4timeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq4intensity($value){
      $this->seq4intensity = $value;
   }
   public function setseq4timeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seq4timeOn = $value;
   }
   public function setseq4timeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seq4timeOff = $value;
   }
   
   public function setseq4days($value){
   		
        $this->seq4days = $value;
   }

   //SETTER : Séquence 5
   public function setseq5timeBegin($value){
      $temp_array = explode(":", $value);
      $this->seq5timeBegin = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq5timeEnd($value){
      $temp_array = explode(":", $value);
      $this->seq5timeEnd = $this->convertHoursToMinutes($temp_array[0], $temp_array[1]);
   }
   public function setseq5intensity($value){
      $this->seq5intensity = $value;
   }
   public function setseq5timeOn($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOn = dechex($value);
      $this->seq5timeOn = $value;
   }
   public function setseq5timeOff($value){
      $value = explode("'", $value);
      if((int)$value[0] > 0)
      	$value = (int)$value[0];
      else
      	$value = (int)$value[1];
      //$this->seqNtimeOff = dechex($value);
      $this->seq5timeOff = $value;
   }
   
   public function setseq5days($value){
   		
        $this->seq5days = $value;
   }
}
?>