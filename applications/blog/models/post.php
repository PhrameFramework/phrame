<?php

namespace Blog\Models;

use Phrame\Activerecord;

/**
 * Post model
 *
 * @property  int       $id
 * @property  string    $post_title
 * @property  string    $post_date
 * @property  string    $post_author
 * @property  string    $post_intro
 * @property  string    $post_text
 * @property  Comment   $comments
 */
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
