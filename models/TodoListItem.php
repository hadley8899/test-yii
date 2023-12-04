<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "todo".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 */
class TodoListItem extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'todo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function fields()
    {
        $fields = parent::fields();

        // Customize the format of created_at and updated_at
        $fields['created_at'] = static function ($model) {
            return Yii::$app->formatter->asDatetime($model->created_at, 'php:Y-m-d H:i');
        };
        $fields['updated_at'] = static function ($model) {
            return Yii::$app->formatter->asDatetime($model->updated_at, 'php:Y-m-d H:i');
        };

        unset($fields['status']);

        return $fields;
    }
}
