<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\ProductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

                      //2//
//--------------------start--------------------//
//        Yii::$app->response->format = yii\web\Response::FORMAT_JSON; // xozirgi xolatimizda console ga json data qaytarsin
//        if (Yii::$app->request->isAjax) {
//            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->product]);
//            }
//            return $this->renderAjax('_form', ['model' => $model]); // ajax kelganda faqat _form ning ichidagi data kelsin xolos
//        }
//--------------------end--------------------//

                      /////
//--------------------start--------------------//

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;                        // response (javob) type json qildik
        if (Yii::$app->request->isAjax) {                                                   // kelayotkan request ajax orqali kelayotkan bolsa bolsa
            $result['status'] = false;                                                      // $result['status'] = false olsin
            if ($model->load(Yii::$app->request->post()) && $model->save()) {               // postdan malumot kelib, validatsiyadan otib save bolsa
                $result['status'] = true;                                                   // $result['status'] = true bo'lsin
                return $result;                                                             //  $result ni json return qilsin
            }

            $result['content'] = $this->renderAjax('_form', ['model' => $model]);      // post kelmasa,  renderAjax orqali _form bilan birga
                                                                                            // model contentni olib ['content'] uzgaruvchiga return qiladi
            return $result;                                                                 // hosil bolgan arrayni jsonda return qiladi
        }
//--------------------end--------------------//


                      //1/original/
//--------------------start--------------------//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['index', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//--------------------end--------------------//

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;               // response (javob) type json qildik
        if (Yii::$app->request->isAjax) {                                          // kelayotkan request ajax orqali kelayotkan bolsa bolsa
            $result['status'] = false;                                             // kelayotkan request ajax orqali kelayotkan bolsa bolsa
            if ($model->load(Yii::$app->request->post()) && $model->save()) {      // postdan malumot kelib, validatsiyadan otib save bolsa
                $result['status'] = true;                                          // $result['status'] = true bo'lsin
                return $result;                                                    //  $result ni json return qilsin
            }

            $result['content'] = $this->renderAjax('_form', ['model' => $model]); // post kelmasa,  renderAjax orqali _form bilan birga
                                                                                       // model contentni olib ['content'] uzgaruvchiga return qiladi
            return $result;                                                            // hosil bolgan arrayni jsonda return qiladi
        }

                  //1/original/
//--------------------start--------------------//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//--------------------start--------------------//

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
