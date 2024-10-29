<?php
/*
Plugin Name: Best Android apps for Social Networking
Plugin URI:  http://www.rawapps.com
Description: This plugin from RawApps.com displays the Best Android apps for Social Networking from the Android Market. All listings include the app thumbnail, application name, developer and category by default. The settings panel gives publishers additional options to show or hide app descriptions, app ratings, number of ratings and number of downloads through the settings panel.
Version: 0.5
Author: RawApps.com
Author URI: http://www.rawapps.com
*/

//  Adding Action
add_action('plugins_loaded','social_display_widget');

//  Display Widget
function social_display_widget() {
    register_sidebar_widget(__('Best Android apps for Social Networking Widget'),'social_rawapps_widget');
    register_widget_control('Best Android apps for Social Networking Widget','social_widget_options');

}
//  Creating RawApps  widget
function social_rawapps_widget($args) {
    extract($args);
    $options=get_option("social_rawapps_widget");
    if (!is_array($options)) {
	    $options=array(
		    'title'=>'Top Social Networking Android Apps',
		    'show_description'=>'1',
		    'show_credit'=>'1',
		    'show_ratings'=>'1',
		    'show_noratings'=>'1',
		    'show_star'=>'1',
		    'show_downloads'=>'1'
		    );

	}

    echo $before_widget;


    echo $before_title.$options['title'].$after_title;
    social_rawapps_widget_template();
    echo $after_widget;


}

   //   Widget template
    function social_rawapps_widget_template() {include_once(WP_PLUGIN_DIR."/best-android-apps-for-social-networking/rawapps_widget_template.php");}

   //   Widget Control Panel
    function social_widget_options()
    {

	$options=get_option("social_rawapps_widget");
	if (!is_array($options)) {
	    $options=array(
		    'title'=>'Top Social Networking Android Apps',
		    'show_description'=>'1',
		    'show_credit'=>'1',
		    'show_ratings'=>'1',
		    'show_noratings'=>'1',
		    'show_star'=>'1',
		    'show_downloads'=>'1'
		    );

	}
	if ($_POST['social-rawapps-widget-submit']) {
	    $options['title']=$_POST['widget_title'];

	    if (isset($_POST['widget_show_description'])){
		    $options['show_description']=true;
	    }
	    else
	    {
		    $options['show_description']=false;
	    }
	    if (isset($_POST['widget_show_ratings'])){
		    $options['show_ratings']=true;
	    }
	    else
	    {
		    $options['show_ratings']=false;
	    }
	    if (isset($_POST['widget_show_noratings'])){
		    $options['show_noratings']=true;
	    }
	    else
	    {
		    $options['show_noratings']=false;
	    }
	    if (isset($_POST['widget_show_downloads'])){
		    $options['show_downloads']=true;
	    }
	    else
	    {
		    $options['show_downloads']=false;
	    }
	    if (isset($_POST['widget_show_credit'])){
		    $options['show_credit']=true;
	    }
	    else
	    {
		    $options['show_credit']=false;
	    }
	    if (isset($_POST['widget_show_star'])){
		    $options['show_star']=true;
	    }
	    else
	    {
		    $options['show_star']=false;
	    }



	    update_option("social_rawapps_widget",$options);
	}
	//Form
	echo "<label for='rawapps_widget_title'> "._e('Title') .": </label>";
	echo "<input type='text' name='widget_title' value='".$options['title']."' /><br/>";


	$is_checked = "";
	if ($options['show_description']){
		$is_checked = "checked";
	}
	echo "<input type='checkbox' name='widget_show_description' value='1' ".$is_checked."/> Description  ";

		$showdownloads = "";
	if ($options['show_downloads']){
		$showdownloads = "checked";
	}
	echo "<input style='margin-left:20px'  type='checkbox' name='widget_show_downloads' value='1' ".$showdownloads."/> No. Downloads<br/> ";


	$showratings = "";
	if ($options['show_ratings']){
		$showratings = "checked";
	}
	echo "<input type='checkbox' name='widget_show_ratings' value='1' ".$showratings."/> <label style='padding-right:22px'>Ratings</label>  ";

	$shownoratings = "";
	if ($options['show_noratings']){
		$shownoratings = "checked";
	}
	echo "<input style='margin-left:20px'  type='checkbox' name='widget_show_noratings' value='1' ".$shownoratings."/> No. Ratings <br/>";

	$showstar = "";
	if ($options['show_star']){
		$showstar = "checked";
	}
	echo "<input type='checkbox' name='widget_show_star' value='1' ".$showstar."/> <label style='padding-right:22px'> Stars</label>  ";



	$showcredit = "";
	if ($options['show_credit']){
		$showcredit = "checked";
	}
	echo "<input style='margin-left:32px'  type='checkbox' name='widget_show_credit' value='1' ".$showcredit."/> <label>Credits</label>  ";






	echo "<input type='hidden' id='social-rawapps-widget-submit' name='social-rawapps-widget-submit' value='1' />";




    }



?>
