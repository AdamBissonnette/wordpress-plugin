<?php
/*
Plugin Name: WordPressPlugin
Plugin URI: https://github.com/MManifesto/wordpress-plugin
Description: Simple Github backed plugin
Author: Adam Bissonnette
Version: 0.1.1
*/

class WordPressPlugin
{
    public static $attsKeyTemplate = "{%s}";

    function WordPressPlugin()
    {
        add_shortcode( 'HelloWorld', array(&$this, 'HelloWorld') );
    }

    function HelloWorld($atts, $content="")
    {
        return "Hello World";
    }
}

require_once( 'WPFDGitHubPluginUpdater.php' );
if ( is_admin() ) {
    new WPFDGitHubPluginUpdater( __FILE__, 'MManifesto', "wordpress-plugin" );
}

add_action( 'init', 'WordPressPlugin_init', 5 );
function WordPressPlugin_init()
{
    global $WordPressPlugin;
    $WordPressPlugin = new WordPressPlugin();
}