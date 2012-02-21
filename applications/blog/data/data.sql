CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(200) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_intro` text NOT NULL,
  `post_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `posts` (`id`, `post_title`, `post_date`, `post_author`, `post_intro`, `post_text`) VALUES
(1, 'The First Post', '2012-02-09 12:00:00', 'Phrame', 'Well, this is the first post.', 'Just the first post.');

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `comments` (`id`, `post_id`, `comment_date`, `comment_author`, `comment_text`) VALUES
(1, 1, '2012-02-09 12:30:00', 'Phrame', 'And this is the first comment.');
