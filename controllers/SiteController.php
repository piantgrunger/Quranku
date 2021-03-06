<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DaftarSurat;
use yii\data\Pagination;
use app\models\Quran;


class SiteController extends Controller
{
    

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new DynamicModel(['Search']);
        $model->addRule(['Search'], 'required');
        
        
        
        if (($model->load(Yii::$app->request->post())) && ($model->validate()) )      
        {
            $q=$model->Search;
            
            $Reciter = 'Ali_Jaber_64kbps';
            
            $Query = Quran::find()
                ->select('quran.*,quranindonesia.AyahText as Indo,DaftarSurat.surat_indonesia')
                ->innerJoin('quranindonesia','quranindonesia.SuraID=quran.SuraID and quranindonesia.VerseID=quran.VerseID ')
                 ->innerjoin ('DaftarSurat','DaftarSurat.Index=quran.SuraID')   
                ->filterWhere(['Like','quranindonesia.AyahText',  $q]);
      
           $model1 = new DynamicModel(['Reciter']);
           $model1->addRule(['Reciter'], 'required');
           if (($model1->load(Yii::$app->request->post())) && ($model1->validate()) )      
            {
              $Reciter=$model1->Reciter;
            }
            $pagination =new Pagination(['defaultPageSize'=>20,'totalCount'=>$Query->count(),]);
            $DaftarAyat = $Query->orderBy('quran.verseID')->offset($pagination->offset)->limit($pagination->limit)->all();
            $ayat=$Query->count();
            return $this->render('surah',['Reciter'=>$Reciter ,'model1'=>$model1,'JumlahAyat'=>$ayat,'NamaSurat'=>"",'Criteria'=>$q,'DaftarAyat'=>$DaftarAyat,'pagination'=>$pagination,]);
          
            
        }
        else
        {     
            $Query = DaftarSurat::find();
            
            $pagination = new Pagination(['defaultPageSize'=>15,'totalCount'=>$Query->count(),]);
            $DaftarSurat = $Query->orderBy('index')->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('index',['model'=>$model,'DaftarSurat'=>$DaftarSurat,'pagination'=>$pagination]);
        }
      }
    
    
    public function  actionSurah($noSurah=1)
    {
      
        $Reciter = 'Ali_Jaber_64kbps';
        
        $Query = Quran::find()
                ->select('quran.*,quranindonesia.AyahText as Indo')
                ->innerJoin('quranindonesia','quranindonesia.SuraID=quran.SuraID and quranindonesia.VerseID=quran.VerseID ')
                ->where(['quran.SuraId' =>  $noSurah]);
        
        $Surat = DaftarSurat::findOne($noSurah);
        $NamaSurat = $Surat -> surat_indonesia;
        $ayat = $Surat -> jumlah_ayat;
        
        $model1 = new DynamicModel(['Reciter']);
         $model1->addRule(['Reciter'], 'required');
        if (($model1->load(Yii::$app->request->post())) && ($model1->validate()) )      
        {
              $Reciter=$model1->Reciter;
        } 
         
        $pagination =new Pagination(['defaultPageSize'=>20,'totalCount'=>$Query->count(),]);
        $DaftarAyat = $Query->orderBy('verseID')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('surah',['Reciter'=>$Reciter,'model1'=>$model1,'JumlahAyat'=>$ayat,'NamaSurat'=>$NamaSurat,'Criteria'=>"",'DaftarAyat'=>$DaftarAyat,'pagination'=>$pagination,]);
         
        
    }        

        public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
