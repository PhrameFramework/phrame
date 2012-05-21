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
    /**
     * Validates form data
     *
     * @return  bool
     */
    public function is_valid()
    {
        $is_valid = $this->validator->is_valid($this->post_id, 'required|num', $this->app->lang->get('Post ID'));
        $is_valid = $this->validator->is_valid($this->comment_author, 'required', $this->app->lang->get('Name')) && $is_valid;
        $is_valid = $this->validator->is_valid($this->comment_text, 'required', $this->app->lang->get('Text')) && $is_valid;

        return $is_valid;
    }

}
