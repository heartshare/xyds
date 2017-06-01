<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_role".
 *
 * @property string $id
 * @property string $userId
 * @property string $roleId
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'userId', 'roleId'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'roleId' => 'Role ID',
        ];
    }
}
