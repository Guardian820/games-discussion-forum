<?php

namespace frontend\controllers;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return 
        [
            'verbs' => 
            [
                'class'     => VerbFilter::className(),
                'actions'   => 
                    [
                        'delete' => ['post'],
                    ],
            ],

            'access' => 
            // User+ can create post
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


             // User+ can only edit and delete their own post, unless they are moderator+
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $post_id
     * @return mixed
     */
    public function actionView($post_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($post_id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($thread_id)
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post())) 
        {
             $model->post_creator   = Yii::$app->user->identity->id; # Post Creator is the currently logged in id.
             $model->thread_id      = $thread_id;   # Set the corresponding thread_id

             // Manually parses the current datetime
             $model->created_at     = date("Y-m-d H:i:s");
             $model->updated_at     = date("Y-m-d H:i:s");

            if ($model->save()) 
            { 
                return $this->redirect(['thread/view', 'thread_id' => $thread_id]);
            }
        } 

        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $post_id
     * @return mixed
     */
    public function actionUpdate($post_id)
    {
        $model = $this->findModel($post_id);

        // Manually parses the current datetime
        $model->updated_at = date("Y-m-d H:i:s");

        if (\Yii::$app->user->can('editPost', ['post' => $model])) # RBAC rule validation, since we can't implement this in behavior.
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                return $this->redirect(['thread/view', 'thread_id' => $model->thread_id]);
            } 

            else 
            {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        else
        {
            Yii::$app->session->setFlash('error',Yii::t('user', 'Sorry, you cannot edit this post!'));
            return $this->redirect(['thread/view', 'thread_id' => $model->thread_id]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $post_id
     * @return mixed
     */
    public function actionDelete($post_id)
    {
        $model = $this->findModel($post_id);
        if (\Yii::$app->user->can('editPost', ['post' => $model])) # RBAC rule validation, since we can't implement this in behavior.
        {
            $this->findModel($post_id)->delete();
            return $this->redirect(['thread/view', 'thread_id' => $model->thread_id]);
        }
        else
        {
            Yii::$app->session->setFlash('error',Yii::t('user', 'Sorry, you cannot delete this post!'));
            return $this->redirect(['thread/view', 'thread_id' => $model->thread_id]);
        }
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $post_id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id)
    {
        if (($model = Post::findOne($post_id)) !== null) 
        {
            return $model;
        } 

        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
