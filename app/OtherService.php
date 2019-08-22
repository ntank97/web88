<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherService extends Model
{
    protected $table = 'other_service';
    protected  $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-default'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->active,'[N\A]');
    }
}
