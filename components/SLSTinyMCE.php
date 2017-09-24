<?php


class SLSTinyMCE {


    public function __construct() {
        add_filter('mce_css', array($this, 'add_editor_style'));
        add_filter('tiny_mce_before_init', array($this, 'define_style_formats'));
        add_filter('mce_buttons', array($this, 'tinymce_editor_buttons')); //targets the first line
        add_filter('mce_buttons_2', array($this, 'tinymce_editor_buttons_second_row')); //targets the second line
    }

    public function add_editor_style($url) {
        if (!empty($url)) {
            $url .= ',';
        }

        $url .= trailingslashit(plugin_dir_url(__FILE__)).'../assets/editor-style.css';

        return $url;
    }

    public function define_style_formats($init_array) {
        $style_formats = array(
          array('title' => 'Lists', 'items' => array(
          array('title' => 'Dashed', 'selector' => 'ul', 'classes' => 'has--dash'),
          array('title' => 'Arrowed', 'selector' => 'ul', 'classes' => 'has--arrows'), ), ),
          array('title' => 'Headers',
                'items' => array(
                  array(
                    'title' => 'Jumbo',
                    'selector' => 'h1,h2,h3,h4,h5,h6',
                    'classes' => 'jumbo'
                  ),
                  array(
                    'title' => 'H1',
                    'format' => 'h1',
                  ),
                  array(
                    'title' => 'H2',
                    'format' => 'h2',
                  ),
                  array(
                    'title' => 'H3',
                    'format' => 'h3',
                  ),
                  array(
                    'title' => 'H4',
                    'format' => 'h4',
                  ),
                )
          ),
          array(
            'title' => 'Paragraph',
            'format' => 'p',
          ),
          array('title' => 'Links',
                'items' => array(
                  array(
                    'title' => 'underlined Link',
                    'selector' => 'a',
                    'classes' => 'is--underlined'
                  ),
                )
          )
        );

        $init_array['style_formats'] = json_encode($style_formats);
        return $init_array;
    }

    public function tinymce_editor_buttons($buttons) {
        return array('styleselect', 'undo', 'redo', 'separator', 'bold', 'italic', 'underline',
        //'strikethrough',
        //'separator',
        'bullist', 'numlist',
        //'separator',
        'blockquote',
        // 'justifyleft',
        // 'justifycenter',
        // 'justifyright',
        'link', 'unlink', 'spellchecker',
        // 'wp_fullscreen',
        'separator', );
    }

    public function tinymce_editor_buttons_second_row($buttons) {
        //return an empty array to remove this line
        return array(
        // 'underline',
        // 'justifyfull',
        // 'forecolor',
        // 'pastetext',
        // 'pasteword',
        // 'removeformat',
        // 'charmap',
        // 'outdent',
        // 'indent',
        // 'undo',
        // 'redo',
        // 'wp_help'
        );
    }

}
