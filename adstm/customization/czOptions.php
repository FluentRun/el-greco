<?php

namespace ads\customization;

class czOptions {
    /**
     * Return rendered template content from defaults_template directory.
     *
     * @param string $field Template name without extension.
     * @return string
     */
    public static function getTemplateField( $field ) {
        $template_file = __DIR__ . '/defaults_template/' . $field . '.php';

        if ( ! file_exists( $template_file ) ) {
            return '';
        }

        ob_start();
        include $template_file;

        return trim( ob_get_clean() );
    }
}
