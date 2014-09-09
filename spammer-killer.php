<?php

/**
* Plugin Name: Spammer Killer
* Plugin URI: http://github.com/aaronjamesyoung/spammer-killer
* Description: Fights WordPress comment spam with a honeypot trap.
* Version: 100000
* Author: Aaron James Young
* Author URI: http://ajy.co
* License: GPL3
*/

// Add the honeypot to the comment form
add_action( 'comment_form_logged_in_after', 'ajy_spam_field' );
add_action( 'comment_form_after_fields', 'ajy_spam_field' );
function ajy_spam_field()
{
    ?>
    <p class="ajy-extra-field">
        <label for="ajy_extra_field">Leave this field empty to prove you are human</label>
        <input type="text" name="ajy_extra_field" id="ajy_extra_field" />
    </p>
    <style>
      .ajy-extra-field { display: none !important; visibility: hidden !important; height: 0 !important; width: 0 !important; overflow: hidden !important; }
    </style>
    <?php
}

// Kill the submission if the bot filled out the honeypot
function ajy_new_comment($commentdata) {
  if($_POST['ajy_extra_field'] != "") {
    die('You are spam');
  }
  return $commentdata;
}
add_filter('preprocess_comment', 'ajy_new_comment');
