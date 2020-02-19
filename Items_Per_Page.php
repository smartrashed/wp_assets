<?php
/**
 * Created by PhpStorm.
 * User: mohammadmainuddin
 * Date: 2020-02-19
 * Time: 12:38
 *
 * This solution for items per page in wp list table while using hook for custom post type
 */


add_action('restrict_manage_posts','gwf_items_per_page_filtering');
function gwf_items_per_page_filtering($post_type){
    if('your_custom_post_name' !== $post_type){
        return; //filter post
    }
    if(isset($_GET['pageVal'])){
        $items_per_page = esc_sql($_GET['pageVal']);
    }else{
        $items_per_page = 5;
    }
    $paged = 1;
    query_posts(array( 'showposts'=> $items_per_page,
        'post_type' => 'your_custom_post_name',
        'posts_per_page' => $items_per_page,
        'paged' => get_query_var('paged')
    ));
    ?>
    <select class='page-select' name="pageVal">
        <option value='5'><?php echo __('Select','textdomain'); ?></option>
        <option value='5'><?php echo __('5 Items per page','gainforms'); ?></option>
        <option value='10'><?php echo __('10 Items per page','gainforms'); ?></option>
        <option value='15'><?php echo __('15 Items per page','gainforms'); ?></option>
        <option value='25'><?php echo __('25 Items per page','gainforms'); ?></option>
        <option value='50'><?php echo __('50 Items per page','gainforms'); ?></option>
    </select>
    <?php
}
