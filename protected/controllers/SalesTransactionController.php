<?php

class SalesTransactionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'index', 'view', 'deleteall', 'refund'),
                'users' => array('@')
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionRefund($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'refund';        
        if (isset($_POST['SalesTransaction'])) {
            $model->active = 'N';
            $model->description = $_POST['SalesTransaction']['description'];
            if ($model->validate()) {
                $model->save();
                $produk = Products::model()->findByPk($model->product_id);
                $produk->stock = $produk->stock + $model->qty;
                if ($produk->save()) {                    
                    Yii::app()->user->setFlash('success', 'Refund Berhasil');
                }
                else
                    Yii::app()->user->setFlash('danger', 'Refund Gagal');
            }
        }
        $this->render('refund', array(
            'model' => $model,
            'refund' => true            
        ));
    }

    public function actionDeleteall() {
        SalesTransaction::model()->deleteAll();
        $this->redirect(array('admin'));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SalesTransaction;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SalesTransaction'])) {
            $model->attributes = $_POST['SalesTransaction'];
            $model->subtotal = $model->sales_price * $model->sales_qty;
            $model->profit = $model->subtotal - ($model->sales_qty * (int) Products::model()->findByPk($model->product_id)->po_price);
            $model->sales_date = date('Y-m-d');
            $model->sales_time = date('H:i:s');
            $model->sales_stock = (int) (Products::model()->findByPk($model->product_id)->stock) - $model->sales_qty;
            $model->user_id = Yii::app()->user->id;
            if ($model->validate()) {
                //mengurangi stok para produk
                $model->save();
                $produk = Products::model()->findByPk($model->product_id);
                $produk->stock = $model->sales_stock;
                $produk->update();
                $this->redirect(array('view', 'id' => $model->trx_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'refund'=>FALSE
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SalesTransaction'])) {
            $model->attributes = $_POST['SalesTransaction'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->trx_id));
        }

        $this->render('update', array(
            'model' => $model,
            'refund'=>FALSE
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SalesTransaction');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SalesTransaction('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SalesTransaction']))
            $model->attributes = $_GET['SalesTransaction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SalesTransaction::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sales-transaction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
