<?php

namespace frontend\models;

use floor12\phone\PhoneValidator;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $direction;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
            [['direction', 'message'], 'string'],
            [['name'], 'match', 'pattern' => '/[А-Яа-яёЁ]*/i', 'message' => \Yii::t('frontend', 'Name can only contain russian letters')],
            [['phone'], PhoneValidator::class],
            [['phone'], 'validateCountry'],
            [['email'], 'email'],
        ];
    }

    function validateCountry($attribute, $params)
    {
        if (!preg_match('/7|8[\d]{10}/i', $this->$attribute)) {
            $this->addError($attribute, \Yii::t('frontend', 'Wrong country'));
        }
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose('contact-us', [
                'model' => $this
            ])
            ->setTo(\Yii::$app->params['companyEmail'])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject($this->direction ?? "Заявка с сайта")
            ->setTextBody($this->message)
            ->send();
    }
}
