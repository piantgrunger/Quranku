<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\widgets\ActiveForm;

use yii\widgets\LinkPager;
use yii\widgets\Listview;
use app\controllers\SiteController;

$this->title = 'Al Quran Online dan Terjemahannya';
?>

    <div class="col-lg-3">
        <table class="table-striped" >
            <tr>
                <td >
        <?php $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
        // more ActiveForm options
    ]);?> 
         <?=$form->field($model, 'Search')->label(''); ?>
                </td>
           <td<?="  "?>      </td>
                <td>
             <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                </td>
                
            </tr>
        </table>
        <?php ActiveForm::end(); ?>
    </div







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
            ['label' => "$Surah->index . $Surah->surat_indonesia ($Surah->arti) ($Surah->jumlah_ayat Ayat)", 'url' => ['site/surah','noSurah'=>$Surah->index]],
            
        ]]);
        ?>
                   
        <?php
      
        $no++;
        endforeach;      
        ?>
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
    
           
    
    </div>
</div>
