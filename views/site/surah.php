<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\controllers\SiteController;
use yii\widgets\ActiveForm;


$Playlist = "";
$AyatSource="";
$this->title = 'Al Quran Online dan Terjemahannya';

?>

  <div class="col-lg-3">
      <?php $form = ActiveForm::begin(['id' => 'Reciter-form']);?> 
          
      <table class="table-striped" >
            <tr>
                <td >
         <?=$form->field($model1, 'Reciter')->label('')->dropdownList(
                 ['AbdulSamad_64kbps_QuranExplorer.Com'=>'AbdulSamad_64kbps_QuranExplorer.Com',
                     'Abdul_Basit_Mujawwad_128kbps'=>'Abdul_Basit_Mujawwad_128kbps',
                     'Abdul_Basit_Murattal_192kbps'=>'Abdul_Basit_Murattal_192kbps',
                     'Abdul_Basit_Murattal_64kbps'=>'Abdul_Basit_Murattal_64kbps',
                     'Abdullaah_3awwaad_Al-Juhaynee_128kbps'=>'Abdullaah_3awwaad_Al-Juhaynee_128kbps',
                     'Abdullah_Basfar_192kbps'=>'Abdullah_Basfar_192kbps',
                     'Abdullah_Basfar_32kbps'=>'Abdullah_Basfar_32kbps',
                     'Abdullah_Basfar_64kbps'=>'Abdullah_Basfar_64kbps',
                     'Abdullah_Matroud_128kbps'=>'Abdullah_Matroud_128kbps'
                     ,'Abdurrahmaan_As-Sudais_192kbps'=>'Abdurrahmaan_As-Sudais_192kbps'
                     ,'Abdurrahmaan_As-Sudais_64kbps'=>'Abdurrahmaan_As-Sudais_64kbps'
                     ,'Abu_Bakr_Ash-Shaatree_128kbps'=>'Abu_Bakr_Ash-Shaatree_128kbps'
                     ,'Abu_Bakr_Ash-Shaatree_64kbps'=>'Abu_Bakr_Ash-Shaatree_64kbps',
                     'Ahmed_Neana_128kbps'=>'Ahmed_Neana_128kbps',
                     'Ahmed_ibn_Ali_al-Ajamy_128kbps_ketaballah.net'=>'Ahmed_ibn_Ali_al-Ajamy_128kbps_ketaballah.net','Ahmed_ibn_Ali_al-Ajamy_64kbps_QuranExplorer.Com'=>'Ahmed_ibn_Ali_al-Ajamy_64kbps_QuranExplorer.Com','Akram_AlAlaqimy_128kbps'=>'Akram_AlAlaqimy_128kbps','Alafasy_128kbps'=>'Alafasy_128kbps','Alafasy_64kbps'=>'Alafasy_64kbps','Ali_Hajjaj_AlSuesy_128kbps'=>'Ali_Hajjaj_AlSuesy_128kbps','Ali_Jaber_64kbps'=>'Ali_Jaber_64kbps','English/Sahih_Intnl_Ibrahim_Walk_192kbps'=>'English/Sahih_Intnl_Ibrahim_Walk_192kbps','Fares_Abbad_64kbps'=>'Fares_Abbad_64kbps','Ghamadi_40kbps'=>'Ghamadi_40kbps','Hani_Rifai_192kbps'=>'Hani_Rifai_192kbps','Hani_Rifai_64kbps'=>'Hani_Rifai_64kbps','Hudhaify_128kbps'=>'Hudhaify_128kbps','Hudhaify_32kbps'=>'Hudhaify_32kbps','Hudhaify_64kbps'=>'Hudhaify_64kbps','Husary_128kbps'=>'Husary_128kbps','Husary_128kbps_Mujawwad'=>'Husary_128kbps_Mujawwad','Husary_64kbps'=>'Husary_64kbps','Husary_Muallim_128kbps'=>'Husary_Muallim_128kbps','Husary_Mujawwad_64kbps'=>'Husary_Mujawwad_64kbps','Ibrahim_Akhdar_32kbps'=>'Ibrahim_Akhdar_32kbps','Ibrahim_Akhdar_64kbps'=>'Ibrahim_Akhdar_64kbps','Karim_Mansoori_40kbps'=>'Karim_Mansoori_40kbps','Khaalid_Abdullaah_al-Qahtaanee_192kbps'=>'Khaalid_Abdullaah_al-Qahtaanee_192kbps','MaherAlMuaiqly128kbps'=>'MaherAlMuaiqly128kbps','Maher_AlMuaiqly_64kbps'=>'Maher_AlMuaiqly_64kbps','Menshawi_16kbps'=>'Menshawi_16kbps','Menshawi_32kbps'=>'Menshawi_32kbps','Minshawy_Mujawwad_192kbps'=>'Minshawy_Mujawwad_192kbps','Minshawy_Mujawwad_64kbps'=>'Minshawy_Mujawwad_64kbps','Minshawy_Murattal_128kbps'=>'Minshawy_Murattal_128kbps','Mohammad_al_Tablaway_128kbps'=>'Mohammad_al_Tablaway_128kbps','Mohammad_al_Tablaway_64kbps'=>'Mohammad_al_Tablaway_64kbps','Muhammad_AbdulKareem_128kbps'=>'Muhammad_AbdulKareem_128kbps','Muhammad_Ayyoub_128kbps'=>'Muhammad_Ayyoub_128kbps','Muhammad_Ayyoub_32kbps'=>'Muhammad_Ayyoub_32kbps','Muhammad_Ayyoub_64kbps'=>'Muhammad_Ayyoub_64kbps','Muhammad_Jibreel_128kbps'=>'Muhammad_Jibreel_128kbps','Muhammad_Jibreel_64kbps'=>'Muhammad_Jibreel_64kbps','Muhsin_Al_Qasim_192kbps'=>'Muhsin_Al_Qasim_192kbps','MultiLanguage/Basfar_Walk_192kbps'=>'MultiLanguage/Basfar_Walk_192kbps','Mustafa_Ismail_48kbps'=>'Mustafa_Ismail_48kbps','Nasser_Alqatami_128kbps'=>'Nasser_Alqatami_128kbps','Parhizgar_48kbps'=>'Parhizgar_48kbps','Sahl_Yassin_128kbps'=>'Sahl_Yassin_128kbps','Salaah_AbdulRahman_Bukhatir_128kbps'=>'Salaah_AbdulRahman_Bukhatir_128kbps','Salah_Al_Budair_128kbps'=>'Salah_Al_Budair_128kbps','Saood_ash-Shuraym_128kbps'=>'Saood_ash-Shuraym_128kbps','Saood_ash-Shuraym_64kbps'=>'Saood_ash-Shuraym_64kbps','Yaser_Salamah_128kbps'=>'Yaser_Salamah_128kbps','Yasser_Ad-Dussary_128kbps'=>'Yasser_Ad-Dussary_128kbps','ahmed_ibn_ali_al_ajamy_128kbps'=>'ahmed_ibn_ali_al_ajamy_128kbps','aziz_alili_128kbps'=>'aziz_alili_128kbps','khalefa_al_tunaiji_64kbps'=>'khalefa_al_tunaiji_64kbps','mahmoud_ali_al_banna_32kbps'=>'mahmoud_ali_al_banna_32kbps','translations/Fooladvand_Hedayatfar_40Kbps'=>'translations/Fooladvand_Hedayatfar_40Kbps','translations/Makarem_Kabiri_16Kbps'=>'translations/Makarem_Kabiri_16Kbps','translations/azerbaijani/balayev'=>'translations/azerbaijani/balayev','translations/besim_korkut_ajet_po_ajet'=>'translations/besim_korkut_ajet_po_ajet','translations/urdu_farhat_hashmi'=>'translations/urdu_farhat_hashmi','translations/urdu_shamshad_ali_khan_46kbps'=>'translations/urdu_shamshad_ali_khan_46kbps','warsh/warsh_Abdul_Basit_128kbps'=>'warsh/warsh_Abdul_Basit_128kbps','warsh/warsh_ibrahim_aldosary_128kbps'=>'warsh/warsh_ibrahim_aldosary_128kbps','warsh/warsh_yassin_al_jazaery_64kbps'=>'warsh/warsh_yassin_al_jazaery_64kbps'],['prompt'=>'Ali_Jaber_64kbps']); ?>
                </td>
            </tr><tr>
                <td>     <?= Html::submitButton('Ubah Reciter', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?> </td>
             
            </tr>
        </table>
        <?php ActiveForm::end(); ?>
  </div>

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
        <?php echo "<p align='Right'> ".$Ayat->VerseArab()."   $Ayat->AyahText  </p>     ";
        $AyatSource = 'http://www.everyayah.com/data/'.$Reciter.'/'. $Ayat->GetSurahCode().'.mp3';
        $Playlist .= '<source src="'.$AyatSource.'" type="audio/mpeg">';
        ?>
            </h3>
    
<audio controls>
    <source src="<?=$AyatSource; ?>" type="audio/mpeg">
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
       
    <p align="center"><B>Play All Recitation : </b></p>
    <P align="center"><audio controls>
       <?=$Playlist;?> 
       Your browser does not support the audio element.
            
        </audio></p>           
        
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
      
          
        
</div>
