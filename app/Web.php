<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table = 'web';
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

    public function category()
    {
        return $this->belongsTo(CateWeb::class,'cate_id');
    }
}
