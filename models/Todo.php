<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "todo".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $timestamp
 *
 * @property Category $category
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Todo item name',
            'category_id' => 'Category',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * This function is used to get all categories from 
     * database and return them as an array
     */
    public function getAllCategories()
    {
        return ArrayHelper::Map(Category::find()->all(), 'id', 'name');
    }
}
