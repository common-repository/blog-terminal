=== Blog Terminal ===
Contributors: rsprta
Donate link: http://radeksprta.eu
Tags: terminal, cmd, xterm, unix, console, command, linux
Requires at least: 2.5
Requires PHP: 5.4
Tested up to: 5.8
Stable tag: 0.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Blog Terminal provides a terminal-like box for embedding terminal commands within pages or posts.

== Description ==

Blog Terminal generates a terminal-like box that you can use to demonstrate terminal output or show the entry of terminal/console commands in a manner that is more demonstrative of actually using a Linux/Unix terminal or Windows cmd shell.

The code is a fork of Post Terminal, which is a fork of WP-Terminal which in turn is a modification of WP-Syntax, a source code highlighter plugin for Wordpress.

Unlike Post terminal, it uses `[terminal]` shorthand for the terminal box. It also shows prompt only on lines explitly set to do that.

= Basic Usage =

The most basic usage is to wrap your terminal blocks with `[terminal][/terminal]` tags. If no further options are defined within the tag a generic prompt is generated using  'user@computer' with no working directory shown. This is similar to exporting PS1="\u@\h:$ " in sh(1), setting prompt="%n@%m:$ " in csh(1), etc.
Other options available within the tag are user="user", computer="computer", and  cwd="/path/to/directory". These allow you to override the generic user@computer settings as well as provide a 'current working directory'.
The prompt is only shown on the lines starting with '$ '. So you can mix commands with simulated terminal output.

== Installation ==

1. Unzip the plugin .zip file and upload the directory to your /wp-content/plugins/.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Create a post/page that contains a code snippet following the proper usage syntax.

== Frequently Asked Questions ==
= What is the best way to ask questions or submit patches? =
The best way to reach me is always via email: <mail@radeksprta.eu>

== Screenshots ==
1. Basic display with no configuration.
2. Basic display with <code>user</code> and <code>computer</code> configuration.
3. Basic display with <code>user</code> and <code>computer</code> and <code>cwd</code>configuration.
4. A more thorough example showing demonstrative purposes

== Usage ==

Wrap terminal blocks with `[terminal user="username" computer="computername" cwd="/path/to/directory"]` and `[\terminal]`. They are all optional. "user" and "computer" will be shown if you don't provide them, cwd is purely optional.

**Example 1: No customized command**

    [terminal]
    $ ls -a
    [/terminal]


**Example 2: User and computer customizations**

    [terminal user="tux" computer="linux"]
    $ ls -a
    [/terminal]

**Example 3: Customizing just the user**

    [terminal user="dak"]
    $ ls -a
    [/terminal]

**Example 4: Customizing user, computer and displaying a working directory**

    [terminal user="root" computer="linuxserver" cwd="/usr/src/linux"]
    $ make mrproper
     ...
     ... 
    [/terminal]

== Changelog ==
= 0.2.1 =
* Add missing style file

= 0.2.0 =
* Make compatible with PHP 7

= 0.1.2 =
* Preserve terminal indentation

= 0.1.1 =
* Wrap long lines
* Wrap terminal in code tags
* Adhere to the latest Wordpress coding standards

= 0.1.0 = 
* Initial release

== Upgrade Notice ==
= 0.2.1 = 
* Add missing style file
