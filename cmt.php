<?php 
require('disqus/disqus.php');

$user_api_key = 'ZisgrKQuuMX8PRq2rW4EweT6JKLxTZk9JKGTomXL3UIMvOlbwcxvz6RBxlfabNo0';
$forum_api_key = 'i4FezVMB0izbG3iajFvcQVeCL7dwf2BXHrRjSsTrFYnw1sWZ95RscUCMNOTRJECo';
$forum_id = '471007';

$action = $_GET['action'];
$identifier = $_GET['identifier'];
$title = $_GET['title'];

$dsq = new DisqusAPI($user_api_key, $forum_api_key);

if( ($username = $dsq->get_user_name() ) === false) {
    throw new Exception($dsq->get_last_error());
}

//echo $username;

if( $action == 'get_thread_posts'){
    $thread = $dsq->thread_by_identifier($identifier, $title);
    $thread_id = $thread->thread->id;
    $posts = $dsq->get_thread_posts($thread_id);
    foreach ($posts as $post) {
        if ( $post->status == 'approved' ){
            echo $post->message;
        }
    }
    echo serialize($posts);
}
?>
