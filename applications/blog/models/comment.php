<?php

namespace Blog\Models;

use Phrame\Activerecord;

class Comment extends Activerecord\Model
{
    static $belongs_to = array(
        array(
            'post',
            'foreign_key'  => 'post_id',
            'class_name'   => 'Blog\Models\Post'
        )
    );

}
