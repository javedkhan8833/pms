<?php

namespace app\models;
use app\models\PaJunction;

use Yii;
use \app\models\base\Project as BaseProject;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    /**
     * @inheritdoc
     */

public function beforeSave($insert) {
        if($this->isNewRecord){
            $this->created_at = date("Y-m-d h:i");

            $datestart = date_create($this->start_time);
            $dateend = date_create($this->end_time);
            $diff = date_diff($datestart,$dateend);
            $diff->days;
            $diff = $diff->format('%d days');
            $this->duration = $diff;
            if($diff>0){
                $this->status = "Due";
            }else{
                $this->status = "overDue";
            }
        }

        $this->start_time = date("Y-m-d",strtotime($this->start_time));
        $this->end_time = date("Y-m-d",strtotime($this->end_time));
        $this->completion_time = date("Y-m-d",strtotime($this->completion_time));
        $this->updated_at = date("Y-m-d h:i");
        return parent::beforeSave($insert);
    }



    public function rules()
    {
        return array_replace_recursive(parent::rules(),
           [
            [['name', 'description', 'start_time', 'end_time', 'assign_to', 'budget', 'cost'], 'required'],
            [['start_time', 'end_time', 'completion_time'], 'safe'],
            [['budget', 'cost'], 'integer'],
            [['name', 'assign_to'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 20],
            [['completed'], 'string', 'max' => 5]
        ]);
    }

}
