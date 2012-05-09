<?php

namespace Blog\Forms;

use Phrame\Core;

/**
 * Comment form
 *
 * @property  int     $post_id
 * @property  string  $comment_author
 * @property  string  $comment_text
 */
class Comment extends Core\Form
{
    public function valid()
    {
        $valid = $this->validator->validate($this->post_id, 'required|num', $this->app->lang->get('Post ID'));
        $valid = $this->validator->validate($this->comment_author, 'required', $this->app->lang->get('Name')) && $valid;
        $valid = $this->validator->validate($this->comment_text, 'required', $this->app->lang->get('Text')) && $valid;

        return $valid;
    }

}
