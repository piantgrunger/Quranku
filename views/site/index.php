<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;

use yii\widgets\LinkPager;
use app\controllers\SiteController;

$this->title = 'Al Quran Online dan Terjemahannya';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang Di Quranku</h1>

        <p class="lead">Al Quran Online dan Terjemahannya</p>

        <p class="media-heading">Daftar Surat : </p>
          
        <?php
        $no=1;
        foreach($DaftarSurat as $Surah ):
        
            ?>   
        <?php 
        echo Nav::widget([
        'items' => [
            ['label' => "$Surah->surat_indonesia - ' $Surah->arti ' ($Surah->jumlah_ayat Ayat)", 'url' => ['site/surah','noSurah'=>$Surah->index]],
            
        ]]);
        ?>
                   
        <?php
        $no++;
        endforeach;      
        ?>
        
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        
    </div>
</div>
