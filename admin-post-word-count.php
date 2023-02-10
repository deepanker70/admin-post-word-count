<?php
/**
 * Plugin Name: Admin Post Word Count
 * Plugin URI: https://wordpress.org/plugins/admin-post-word-count
 * Description: Counts the number of words in a post and displays the word count in the WordPress dashboard post section.
 * Version: 1.0
 * Author: Deepanker Verma
 * Author URI: https://deepankerverma.com
 **/

function post_word_count() {
  global $post;
  $content = $post->post_content;
  $word_count = str_word_count(strip_tags($content));
  return $word_count;
}

function post_word_count_column($columns) {
  $columns['word_count'] = 'Word Count';
  return $columns;
}

function post_word_count_column_row($column_name, $post_id) {
  if ($column_name == 'word_count') {
    $word_count = post_word_count();
    echo $word_count;
  }
}

add_filter('manage_posts_columns', 'post_word_count_column');
add_action('manage_posts_custom_column', 'post_word_count_column_row', 10, 2);
