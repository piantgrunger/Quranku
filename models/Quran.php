<?php
 namespace app\models;
 use yii\db\ActiveRecord;
 
 class Quran extends ActiveRecord
 {
     public $Indo;
     public  $surat_indonesia;
     
     
       
     public static function tableName() {
         return 'quran';
     }
     
     
   public  function VerseArab(){           
     $arabic_number = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
     $jum_karakter = strlen($this->VerseID);
     $temp = "";
     for($i = 0; $i < $jum_karakter; $i++){
        $char = substr($this->VerseID, $i, 1);
        $temp .= $arabic_number[$char];
    }
     return '<span class="arabic_number">'.$temp.'</span>';
    }

   public  function GetSurahCode(){           
     $jum_karakter = strlen($this->VerseID);
     $jum_karakter1 = strlen($this->SuraID);
     $char = "";
     for($i = 0; $i < 3-$jum_karakter; $i++){
        $char .= '0';
    }
    $char1 = "";
     for($i = 0; $i < 3-$jum_karakter1; $i++){
        $char1 .= '0';
    }
     return $char1.$this->SuraID.$char.$this->VerseID;
    }

 } 
