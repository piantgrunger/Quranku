<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\controllers\SiteController;


$this->title = 'Al Quran Online dan Terjemahannya';

?>
<div class="site-index">

    <div class="jumbotron">
       <?php if ($NamaSurat!=""){  ?>
        <h2>Al Quran <?=$NamaSurat;?>( <?=$JumlahAyat;?> Ayat ) </h2>
       <?php } else {   ?>
         <h2> Pencarian : <?=$Criteria;?> ditemukan (<?=$JumlahAyat;?> ayat) </h2>
        
       <?php } ?>
    </div>  
        
        <h2>           
        <?php
        foreach($DaftarAyat as $Ayat ):
        
            ?>   
            <h3 class="arabic">
        <?php echo "<p align='Right'> ".$Ayat->VerseArab()."   $Ayat->AyahText  </p>     "; ?>
            </h3>
    
<audio controls>
    <source src="http://www.everyayah.com/data/Ali_Jaber_64kbps/<?php 
    echo $Ayat->GetSurahCode().".mp3";
    ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
            
        <?php echo "<p align='Left'>  $Ayat->VerseID   ".str_replace($Criteria, "<B>$Criteria</B>",$Ayat->Indo)."    ";
                       if ($Ayat->surat_indonesia!=""){
                           echo "(  $Ayat->surat_indonesia    :  $Ayat->VerseID    )";
                       }
         echo "</p>";?>
        <br>
                
        <?php
        endforeach;      
        ?>
        </h2>
        
        
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
      
          
        
</div>
