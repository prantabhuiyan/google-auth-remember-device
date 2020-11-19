<?php
/**
 * Created by PhpStorm.
 * User: pranta
 * Date: 2/11/20
 * Time: 3:37 PM
 */

use common\helper\GoogleAuthenticator;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;


$user = Yii::$app->user->identity->username;
$secret = Yii::$app->user->identity->googlecode;

$googleAuth = new GoogleAuthenticator();
$qrCodeUrl = $googleAuth->getQRCodeGoogleUrl($user,  $secret, 'localhost');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-area register-from">
                <div class="form-content">
                    <h2>Google Two Factor Authentication</h2>
                    <p>Enter the verification code geneisEnabledrated by Google Authenticator app on your phone.</p>

                </div>
                <div class="form-input">
                    <h2>Enter Code</h2>
                    <div class="form-group">
                        <img src='<?php echo $qrCodeUrl; ?>'/>
                        <p>Or setup manually with the code: <code><b><?php echo $secret;  ?> </b></code> </p>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'google-authenticator-form']) ?>

                        <?= $form->field($model, 'code') ?>
                        <?= $form->field($model, 'remember_device')->checkbox() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
