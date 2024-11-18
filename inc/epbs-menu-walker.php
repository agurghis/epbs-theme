<?php

// Custom walker class for wp_list_pages
class WPBS_Page_Walker extends Walker_Page {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='sub-menu'>\n";
    }

    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( $depth ) {
            $indent = str_repeat( "\t", $depth );
        } else {
            $indent = '';
        }

        $css_class = array( 'menu-item', 'page_item', 'page-item-' . $page->ID );

        if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
            $css_class[] = 'menu-item-has-children';
        }

        if ( ! empty( $current_page ) ) {
            $_current_page = get_post( $current_page );
            if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
                $css_class[] = 'current-menu-ancestor';
            }
            if ( $page->ID == $current_page ) {
                $css_class[] = 'current-menu-item';
            } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
                $css_class[] = 'current-menu-parent';
            }
        }

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        $output .= $indent . '<li class="' . $css_class . '">';

        $output .= sprintf(
            '<a href="%s">%s</a>',
            get_permalink( $page->ID ),
            apply_filters( 'the_title', $page->post_title, $page->ID )
        );
    }
}