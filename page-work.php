<?php
/**
 * The template for displaying the work page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage EchosOratos
 * @since EchosOratos 0.1
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
            <article id="page-work post-<?php the_ID(); ?>" <?php post_class('category-preview no-header'); ?>>
<?php

$this_post_id = get_post()->ID;
$custom_fields = get_post_custom($this_post_id);
$nav_items = wp_get_nav_menu_items('Menu 1');
$categories = array();

# get menu item for current page/post
foreach($nav_items as $item) {
    if ($item->object_id == $this_post_id) {
        $this_post_nav_item = $item;
    }
}

# get every category which are sub-menu-items of current menu item
if (isset($this_post_nav_item)) {
    foreach($nav_items as $item) {
        if ($item->menu_item_parent == $this_post_nav_item->ID) {
            array_push($categories, array(get_category($item->object_id), $item->url));
        }
    }
}

# iterate over those categories
foreach($categories as $category) {

    # get custom field
    $image_id = $custom_fields['preview-' . $category[0]->slug][0];
    $name = $category[0]->name;
    $url = $category[1];

    # if custom field is set, print a link to the cat with set thumbnail
    if (isset($image_id)) {

        $image = wp_get_attachment_image_src($image_id, 'full');

?>
                <a href="<?php print($url); ?>">
                    <span class="name"><?php print($name); ?></span>
                    <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>">
                </a>
<?php
    }

}

?>
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
			</article>
		</div>
	</div>
<?php get_footer(); ?>
