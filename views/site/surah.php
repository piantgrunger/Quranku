<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\controllers\SiteController;

$this->title = 'Al Quran Online dan Terjemahannya';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Al Quran <?=$NamaSurat;?>( <?=$JumlahAyat;?> Ayat ) </h2>
    </div>  
        
        <h2>           
        <?php
        foreach($DaftarAyat as $Ayat ):
        
            ?>   
        <?php echo "<p align='Right'>$Ayat->VerseID  $Ayat->AyahText     </p>"; ?>
        <?php echo "<p align='Left'>$Ayat->VerseID  $Ayat->Indo     </p>"; ?>
        <br>
                    
        <?php
        endforeach;      
        ?>
        </h2>
        
        
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
      
          
        
</div>
