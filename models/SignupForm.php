<?php
namespace app\models;
use yii\base\Model;
use app\models\User;
use Yii;
use yii\base\Exception;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $fullname;
    public $username;
    public $email;
    public $password;
    public $gender;
    public $address;
    public $phone_number;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Username ini telah digunakan.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email ini telah digunakan.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['fullname', 'gender','address','phone_number'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['fullname', 'address'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 20],

        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->fullname = $this->fullname;
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->gender = $this->gender;
        $user->status = ('Inactive'); 
        if ($user->save()) {
            return $user;
        }
        return null;
    }
}
