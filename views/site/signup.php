<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

$this->title = 'Register';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-briefcase form-control-feedback'></span>"
];

$fieldOptions4 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-home form-control-feedback'></span>"
];
$fieldOptions5 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-earphone form-control-feedback'></span>"
];

$fieldOptions6 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>

<?php
if(Yii::$app->session->hasFlash('userStatus'))
    echo \yii\bootstrap\Alert::widget([
        'options' => ['class' => 'alert-warning'],
        'body' => Yii::$app->session->getFlash('userStatus'),
    ]);
?>

<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>IoT CENTER</b></a>
    </div>

    <div class="register-box-body">
        <!--        <p class="login-box-msg">Silahkan Sign-in</p>-->
        <div class="col-md-6">
        <?php $form = ActiveForm::begin(['id' => 'form-signup', 'enableClientValidation' => false]); ?>
        
        <p style="text-align:center;font-size:20px">Account Information</p>
        <hr>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

             <?= $form
            ->field($model, 'email', $fieldOptions6)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        
           
    </div>
    
    <div class="col-md-6">
        <p style="text-align:center;font-size:20px">Personal Information</p>
        <hr>
        
        <?= $form
                ->field($model, 'fullname')
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('fullname')]) ?>

        <?= $form
                ->field($model, 'address')
                ->label(false)
                ->textarea(['rows' => 3,'placeholder' => $model->getAttributeLabel('address')]) ?>

        <?= $form
                ->field($model, 'phone_number')
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('phone_number')]) ?>

        <?= $form->field($model, 'gender')->radioList(
            array('Female'=>'Female','Male'=>'Male')
        ); ?>

         <div class="pull-right">
                <div class="form-group field-loginform-rememberme">
                    <div class="checkbox">
                        <label for="loginform-rememberme">
                        <?= Html::a('Already have an account', ['/site/login']) ?>
                    </div>
                </div>
        </div>
    </div>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'submit-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

              
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
