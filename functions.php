<?php

/**
 * Implements primary menu walker class.
 */
require 'includes/menus/primary-menu-walker.php';

/**
 * Implements bottom menu walker class.
 */
require 'includes/menus/bottom-menu-walker.php';

/**
 * Implements social widget class.
 */
require 'includes/widgets/social-widget.php';

/**
 * Implements contact widget class.
 */
require 'includes/widgets/contact-widget.php';

/**
 * Implements upcoming event widget class.
 */
require 'includes/widgets/upcoming-event-widget.php';

/**
 * Implements Mailchimp subscribe widget class.
 */
require 'includes/widgets/mailchimp-subscribe-widget.php';

/**
 * Registers widgets and widget areas.
 */
require 'includes/widgets/widgets.php';

/**
 * Registers and renders menus.
 */
require 'includes/menus/menus.php';

/**
 * Tackles features related to the blog.
 */
require 'includes/blog/blog.php';

/**
 * Introduces development mode on localhost.
 */
require 'includes/dev-env.php';

/**
 * Registers customiser sections, settings and options.
 */
require 'includes/options.php';

/**
 * Implements general functionality.
 */
require 'includes/general.php';

/**
 * Implements contact shortcode.
 */
require 'includes/contact.php';

/**
 * Registers TinyMCE style.
 */
require 'includes/tinymce-style.php';