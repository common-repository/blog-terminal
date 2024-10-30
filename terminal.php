<?php
/**
 * @package Blog_Terminal
 * @version 0.2.1
 */
/*
Plugin Name: Blog Terminal
Plugin URI: https://radeksprta.eu/projects/terminal
Description: Terminal generates a box around your text to give it the appearance of a terminal such as xterm or cmd. Create terminal with <code>[terminal][/terminal]</code>.
Author: Radek Sprta
Version: 0.2.1
Author URI: https://radeksprta.eu
*/

#  This is free software; you can redistribute it and/or modify it under
#  the terms of the GNU General Public License as published by the Free
#  Software Foundation; either version 2 of the License, or (at your option)
#  any later version.
#
#  It is distributed in the hope that it will be useful, but WITHOUT ANY
#  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
#  FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
#  details.
#
#  You should have received a copy of the GNU General Public License along
#  with this software, if not, write to the Free Software Foundation, Inc.,
#  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
#

// Add [terminal] shortcode.
// Syntax [terminal user="user" computer="computer" cwd="null"]
add_shortcode( 'terminal', array( 'Terminal', 'handler' ) );

// Add styling.
add_action( 'wp_enqueue_scripts', array( 'Terminal', 'register_styles' ));

/**
 * Contain the Terminal plugin.
 */
class Terminal
{
    /**
     * Construct the prompt.
     *
     * @param array $atts Array of terminal attributes.
     *
     * @return string Terminal prompt.
     */
    public static function get_prompt( $atts )
    {
        if ( isset( $atts['cwd'] ) ) {
            return $atts['user'] . "@" . $atts['computer'] . ":" . $atts['cwd'] . "$ ";
        } else {
            return $atts['user'] . "@" . $atts['computer'] . "$ ";
        }
    }

    /**
     * Construct the terminal output.
     *
     * @param array $commands Array of command line output.
     * @param string $prompt Terminal prompts.
     *
     * @return date Formatted terminal.
     */
    public static function make_terminal($commands, $prompt)
    {
        $output = "\n<pre class=\"terminal\"><code>";
        foreach ( $commands as $command ) {
            $output .= rtrim( str_replace( "$ ", $prompt, $command ) );
        }
        $output .= "</code></pre>\n";
        return $output;
    }

    /**
     * Register style sheets.
     */
    public static function register_styles()
    {
        wp_register_style( 'terminal', plugins_url( 'blog-terminal/style/terminal.css' ) );
        wp_enqueue_style( 'terminal' );
    }

    /**
     * Split lines.
     *
     * @param string $code Terminal output.
     *
     * @return array Terminal output split into lines.
     */
    public static function split_lines( $code )
    {
        return explode( "\n|\r\n", $code );
    }

    /**
     * Handler for the [terminal] shorthand.
     *
     * @param array $atts Attributes of [terminal].
     * @param string $content Content of [terminal].
     *
     * @return string Formatted terminal output.
     */
    public static function handler( $atts, $content=null )
    {
        $a = shortcode_atts( array(
            'user' => 'user',
            'computer' => 'computer',
            'cwd' => null,
        ), $atts );

        $prompt = Terminal::get_prompt( $a );
        $commands = Terminal::split_lines( $content );

        return Terminal::make_terminal( $commands, $prompt );
    }
}
