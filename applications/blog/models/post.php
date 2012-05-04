<?php

namespace Blog\Models;

use Phrame\Activerecord;

class Post extends Activerecord\Model
{
    static $has_many = array(
        array(
            'comments',
            'foreign_key'  => 'post_id',
            'class_name'   => 'Blog\Models\Comment',
            'order'        => 'comment_date asc',
        )
    );

}
