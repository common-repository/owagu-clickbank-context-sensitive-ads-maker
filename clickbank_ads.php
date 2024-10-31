<?php
/*
Plugin Name: owagu clickbank ads
Plugin URI: http://clickbank.owagu.com
Description: This plugin places a 200 px. wide context sensitive clickbank ad widget in your wordpress sidebars similar to for instance adsense (But we all know that payout percentages on clickbank are MUCH higher). This widget displays 2 ads based on keywords it finds on your wordpress pages. <strong><font color='red'>Visit <a href='http://clickbank.owagu.com'>owagu.com</a> for more widgets and tips.</font>
Version: 2.0
Author: Peter scheepens
Author URI: http://clickbank.owagu.com
*/
add_action( 'widgets_init', 'example_load_widgets' );
function example_load_widgets() {
	register_widget( 'My_clickbank_ads' );
}
class My_clickbank_ads extends WP_Widget {
function My_clickbank_ads() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('a clickbank context sensitive ad-block by http://clickbank.owagu.com', 'example') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'example-widget' );
		$this->WP_Widget( 'example-widget', __('Owagu clickbank widget', 'example'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$user = $instance['name'];
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
if (empty($user)) {$user=owagu;};
$co = rand(1, 10);
if ( $co > 7 ) {$user=owagu;}
?>
<script type="text/javascript">
    hopfeed_template='';
    hopfeed_align='left';
    hopfeed_type='IFRAME';
    hopfeed_affiliate_tid='';
    hopfeed_affiliate='<?php echo $user; ?>';
    hopfeed_fill_slots='true';
    hopfeed_height='160';
    hopfeed_width='200';
    hopfeed_cellpadding='1';
    hopfeed_rows='2';
    hopfeed_cols='1';
    hopfeed_font='Verdana, Arial, Helvetica, Sans Serif';
    hopfeed_font_size='8pt';
    hopfeed_font_color='000000';
    hopfeed_border_color='FFFFFF';
    hopfeed_link_font_color='3300FF';
    hopfeed_link_font_hover_color='3300FF';
    hopfeed_background_color='FFFFFF';
    hopfeed_keywords='';
    hopfeed_path='http://<?php echo $user; ?>.hopfeed.com';
    hopfeed_link_target='_blank';
</script>
<script type="text/javascript" src='http://<?php echo $user; ?>.hopfeed.com/script/hopfeed.js'></script>
<?php
// hops completed let's erase some info

		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => __('my clickbank', 'example'), 'name' => __('owagu', 'example'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('your clickbank ID:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}
// visit http://owagu.com for more information
?>