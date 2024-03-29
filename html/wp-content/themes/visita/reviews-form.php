<!doctype html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
  <meta name="robots" content="noindex, nofollow">
</head>
<body>
<?php
  if ( comments_open() || get_comments_number() ) :
    $user_comment_ID = get_user_post_comment_ID( );
    comment_form(array(
      'logged_in_as'      => '',
      'title_reply_to'    => __( '%s review', 'visita' ),
      'cancel_reply_link' => __( 'Cancel Review', 'visita' ),
      'title_reply'       => sprintf( __( '%s review', 'visita' ) , get_the_title() ),
      'must_log_in'       => sprintf( '<p class="must-log-in">%s</p>', sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'visita' ),
                          wp_login_url( get_permalink( $post_id ) ) ) ),
      'comment_field'     => sprintf( '<p class="comment-form-comment"><label for="comment">%s</label>
        <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">%s</textarea></p>',
        esc_html( _x( 'Comment', 'noun' ) ),
        esc_textarea( get_user_post_comment()->comment_content )
      ),
      'submit_button'     => sprintf('
        <input name="submit" type="submit" id="submit" class="submit button" value="%s" />
        <input name="delete" type="submit" id="submit" class="button secondary %s" value="%s" />',
        ( $user_comment_ID ) ?  esc_attr__( 'Update Review', 'visita' ) : esc_attr__( 'Post Review', 'visita' ),
        ( $user_comment_ID ) ?  '' : 'hide',
         esc_attr__( 'Delete', 'visita' )
      ),
    ) );
  endif;
?>
</body>
</html>
