<?php
/**
 * Created by PhpStorm.
 * User: pranta
 * Date: 2/11/20
 * Time: 4:49 PM
 */

namespace frontend\models;


use common\helper\EncryptionHelper;
use common\helper\GoogleAuthenticator;
use common\helper\RandomAlphanumericGeneratorHelper;
use common\models\DeviceInformation;
use Yii;
use yii\base\Model;

class GoogleAuthenticatorForm extends Model
{
    public $code;
    public $remember_device;

    public function rules(){
        return [
          ['code', 'trim'],
          ['code', 'required'],
          ['code', 'string', 'max' => 6],

            ['remember_device', 'boolean'],

        ];
    }

    /**
     *  Google Authenticator
     */
    public function authenticator()
    {
        $checkResult = "";
        $validcode = false;
        $code = $this->code;
        $user = Yii::$app->user->identity;
        $device_info = new DeviceInformation();
        $remember_device = $this->remember_device ? $this->remember_device : null;


        if($remember_device){

            $USER_REMEMBER_DEVICE = GoogleAuthenticator::generateUniqueCookieCode();

            $device_info->cookie_name = $USER_REMEMBER_DEVICE;
            $device_info->user_id = $user->getId();
            $device_info->user_agent = $_SERVER['HTTP_USER_AGENT'];
            $device_info->save();

            setcookie($USER_REMEMBER_DEVICE, true, time() + (86400 * 30), "/");
        }

        $secret = $user->googlecode;
        $ga = new GoogleAuthenticator();
        $checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

        $codes = (array)json_decode($user->codes);

        if($codes){
            foreach ($codes as $key => $c){
                if($code == $c){
                    $validcode = true;
                    unset($codes[$key]);

                }
            }
            $user->codes =  json_encode((object)$codes);
            $user->save();
        }


        if($checkResult || $validcode){
            return true;
        }else{
            Yii::$app->session->setFlash('warning', 'Wrong Authenticator code!');
        }

    }

}