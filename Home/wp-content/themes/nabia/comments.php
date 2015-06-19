<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to nabia_comments() which is
 * located in the /functions/general.php file.
 *
 * @package WordPress
 * @subpackage  Nabia
 * @since Nabia 1.0
 */
?>

<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
?>
<div id="comments">
    <?php
    if (post_password_required()) :
        ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'nabia'); ?></p>
    </div>
    <?php
    return;
endif;
?>
<?php if (have_comments()) : ?>
    <header id="comments-title">
        <?php printf( '<strong>' . _n('One Comment', '%1$s Comments', get_comments_number(), 'nabia') . '</strong>', number_format_i18n(get_comments_number()) ); ?>
        <a href="<?php echo esc_url( get_permalink() . 'feed/' ); ?>"><i class="fa fa-rss-square"></i></a>
        <span class="showing-comments"><?php printf( __('Showing %s most recent', 'nabia'), get_option('comments_per_page') ); ?></span>
    </header>
    <ol id="commentlist" class="commentlist">
        <?php wp_list_comments( array( 'callback' => 'nabia_comments' ) ); ?>
    </ol>
    <?php if( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
        <nav id="comment-nav">
            <ul class="comments-pagination pagination pagination-sm">
                <li>
                    <?php paginate_comments_links( array('prev_text' => __('&lsaquo; Previous', 'nabia'), 'next_text' => __('Next &rsaquo;', 'nabia') ) ); ?>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="nocomments">
        <span class="glyphicon glyphicon-lock fa-3x"></span>
        <p><?php printf( __('Sorry, comments are closed for this %s.', 'nabia'), get_post_type() ); ?></p>
    </div>
<?php endif; ?>

<?php
$text_req = '';
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = $req_text = '';
if ($req) {
    $aria_req = " aria-required='true' required";
    $text_req = ' (' . __('Required', 'nabia') . ')';
}
$fields = array(
    // AUTHOR
    //'author' => '<label for="author">' . __('Name', 'nabia') . $text_req . '</label> ' .
    '<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="author" class="form-control" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . __('Name', 'nabia') . '" tabindex="1"' . $aria_req . ' /></div>',
    // EMAIL
    //'email' => '<label for="email">' . __('Email', 'nabia') . $text_req . '</label> ' .
    '<div class="input-group"><span class="input-group-addon"><i class="mail-icon fa fa-at"></i></span><input id="email" class="form-control" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . __('Email', 'nabia') . '" tabindex="2"' . $aria_req . ' /></div>',
    // URL
    //'url' => '<label for="url">' . __('Website', 'nabia') . '</label>' .
    '<div class="input-group"><span class="input-group-addon"><i class="fa fa-link"></i></span><input id="url" class="form-control" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . __('Website', 'nabia') . '" tabindex="3" /></div>',
);
$comment_form_args = array(
    'fields' => $fields,
    'title_reply' => '<i class="fa fa-pencil small-icon"></i>'. __('Leave a comment', 'nabia') .'',
    'comment_field' => '<textarea class="form-control comment-textarea" name="comment" id="comment" placeholder="' . __('Your message', 'nabia') . '&hellip;' . '" tabindex="4"></textarea>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'cancel_reply_link' => '<span class="comment-cancel-reply">' . __('Cancel Reply', 'nabia') . '</span>',
    'label_submit' => __('Submit', 'nabia'),
    'id_submit' => 'comment-button',
);
?>
<?php comment_form($comment_form_args); ?>
</div>
