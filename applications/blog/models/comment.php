<?php

namespace Blog\Models;

use Phrame\Activerecord;

/**
 * Comment model
 *
 * @property  int     $id
 * @property  int     $post_id
 * @property  string  $comment_date
 * @property  string  $comment_author
 * @property  string  $comment_text
 * @property  Post    $post
 */
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
