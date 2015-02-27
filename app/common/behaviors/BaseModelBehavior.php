<?php

namespace common\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;



class BaseModelBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }

    public function beforeInsert()
    {
        $this->owner->created_at = $this->owner->updated_at = date('Y-m-d H:i:s');
    }

    public function beforeUpdate()
    {
        $this->owner->updated_at = date('Y-m-d H:i:s');
    }
}
