<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\controllers\SiteController;


$this->title = 'Al Quran Online dan Terjemahannya';

function format_arabic_number($number){
    $arabic_number = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
    $jum_karakter = strlen($number);
    $temp = "";
    for($i = 0; $i < $jum_karakter; $i++){
        $char = substr($number, $i, 1);
        $temp .= $arabic_number[$char];
    }
    return '<span class="arabic_number">'.$temp.'</span>';
}
?>
<div class="site-index">

    <div class="jumbotron">
       <?php if ($NamaSurat!=""){  ?>
        <h2>Al Quran <?=$NamaSurat;?>( <?=$JumlahAyat;?> Ayat ) </h2>
       <?php } else {   ?>
         <h2> Pencarian : <?=$Criteria;?> </h2>
        
       <?php } ?>
    </div>  
        
        <h2>           
        <?php
        foreach($DaftarAyat as $Ayat ):
        
            ?>   
            <h3 class="arabic">
        <?php echo "<p align='Right'> ".format_arabic_number($Ayat->VerseID)."  $Ayat->AyahText  </p>     "; ?>
            </h3>
        <?php echo "<p align='Left'>  $Ayat->VerseID   ".str_replace($Criteria, "<B>$Criteria</B>",$Ayat->Indo)."    ";
                       if ($Ayat->surat_indonesia!=""){
                           echo "(  $Ayat->surat_indonesia    :  $Ayat->VerseID    )";
                           
                       }
            
               echo "</p>";
                
                ; ?>
        <br>
                
        <?php
        endforeach;      
        ?>
        </h2>
        
        
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
      
          
        
</div>
