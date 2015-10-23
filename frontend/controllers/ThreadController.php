<?php

namespace frontend\controllers;

use Yii;
use app\models\Thread;
use app\models\ThreadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;



/**
 * ThreadController implements the CRUD actions for Thread model.
 */
class ThreadController extends Controller
{
    public function behaviors()
    {
        return 
        [
          'verbs' => 
          [
            'class'   => VerbFilter::className(),
            'actions' => 
            [
              'delete' => ['post'],
            ],
          ],

          'access' => 
          // User+ can create thread
          [
            'class' => \yii\filters\AccessControl::className(),
            'only'  => ['create'],
            'rules' => 
            [
              [
                  'allow' => true,
                  'roles' => ['moderator','user'],
              ],
            ],

          ],


           //User+ can only edit and delete their own thread, unless they are moderator+
          [
            'class' => \yii\filters\AccessControl::className(),
            'only'  => ['update','delete'],
            'rules' => 
            [
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['user'],
                ],
                // everything else is denied
            ]
          ],   
        ];          
    }

    /**
     * Lists all Thread models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ThreadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,

        ]);
    }

    /**
     * Displays a single Thread model.
     * @param integer $thread_id
     * @return mixed
     */
    /*public function actionView($thread_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($thread_id),
        ]);
    }*/

    /**
     * Creates a new Thread model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Thread();

        /*--------------------------------------------------------
        if ($model->load(Yii::$app->request->post())) {
          $model->created_at = time();
          $model->updated_at = time();
           if ($model->save()) {             
             return $this->redirect(['view', 'id' => $model->id]);             
           } 
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
        --------------------------------------------------------*/        
        
        if ($model->load(Yii::$app->request->post())) 
        {
          $model->thread_starter  = Yii::$app->user->identity->id; # Thread Starter is the currently logged in id.

          // Manually parses the current datetime
          $model->created_at      = date("Y-m-d H:i:s");
          $model->updated_at      = date("Y-m-d H:i:s");

          $uniqueName             = date("YmdHis"); #Same filename prevention
          $model->picture         = UploadedFile::getInstance($model, 'picture');

          if(UploadedFile::getInstance($model, 'picture') != null) # Only rename the file if there is something to rename at the first place
          {
            $model->picture->name = $uniqueName.$model->picture->name;  
          } 

          if ($model->save()) 
          {      

          if ($model->picture && $model->validate()) 
          {                
              $model->picture->saveAs('images/cover/' . $model->picture->baseName . '.' . $model->picture->extension);
          }       
          return $this->redirect(['view', 'thread_id' => $model->thread_id]);             
          } 
        } 

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Thread model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $thread_id
     * @return mixed
     */
    public function actionUpdate($thread_id)
    {
        
        $model = $this->findModel($thread_id);
        if (\Yii::$app->user->can('editThread', ['post' => $model])) # RBAC rule validation, since we can't implement this in behavior.
        {
          if ($model->load(Yii::$app->request->post())) 
          {
              // Manually parses the current datetime
              $model->updated_at      = date("Y-m-d H:i:s");
              $uniqueName             = date("YmdHis"); #Same filename prevention

              if(UploadedFile::getInstance($model, 'picture') != null) # Only rename the file if there is something to rename at the first place
              {
                $model->picture         = UploadedFile::getInstance($model, 'picture');
                $model->picture->name   = $uniqueName.$model->picture->name;  
              }
              else
              {
                $old_model      = $this->findModel($thread_id);
                $model->picture = $old_model->picture;
              }

              if ($model->save()) 
              { 
                  if ($model->picture && $model->validate()) 
                  {     
                    if(UploadedFile::getInstance($model, 'picture') != null)
                    { 
                      $model->picture->name = $model->picture->name;            
                      $model->picture->saveAs('images/cover/' . $model->picture->baseName . '.' . $model->picture->extension);
                    }     
                  } 
                  return $this->redirect(['view', 'thread_id' => $model->thread_id]);
              }
          }
            
                return $this->render('update', [
                    'model' => $model,
                ]);
        }
        else
        {
            Yii::$app->session->setFlash('error',Yii::t('user', 'Sorry, you cannot edit this thread'));
            return $this->redirect(['view', 'thread_id' => $model->thread_id]);
        }

        
    }

    /**
     * Deletes an existing Thread model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $thread_id
     * @return mixed
     */
    public function actionDelete($thread_id)
    {
        $model = $this->findModel($thread_id);
        if (\Yii::$app->user->can('editThread', ['post' => $model])) # RBAC rule validation, since we can't implement this in behavior.
        {
            $this->findModel($thread_id)->delete();
            return $this->redirect(['index']);
        }
        else
        {
            Yii::$app->session->setFlash('error',Yii::t('user', 'Sorry, you cannot delete this thread'));
            return $this->redirect(['view', 'thread_id' => $model->thread_id]);
        }
    }

    /**
     * Finds the Thread model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $thread_id
     * @return Thread the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($thread_id)
    {
        if (($model = Thread::findOne($thread_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionView($thread_id)
    {
        return $this->render('view', [
        'model' => $this->findModel($thread_id),
        ]);  

    }
}
