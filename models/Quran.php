<?php
 namespace app\models;
 use yii\db\ActiveRecord;
 
 class Quran extends ActiveRecord
 {
     public $Indo;
         
     public static function tableName() {
         return 'quran';
     }
     
     
 } 
