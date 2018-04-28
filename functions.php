<?php

/**
 * Includes Google APIs Client Library from the local Composer installation.
 */
require_once 'vendor/autoload.php';

/**
 * Implements primary menu walker class.
 */
require_once 'includes/menus/class.primary-menu-walker.php';

/**
 * Implements bottom menu walker class.
 */
require_once 'includes/menus/class.bottom-menu-walker.php';

/**
 * Implements social widget class.
 */
require_once 'includes/widgets/class.social-widget.php';

/**
 * Implements contact widget class.
 */
require_once 'includes/widgets/class.contact-widget.php';

/**
 * Implements upcoming event widget class.
 */
require_once 'includes/widgets/class.upcoming-event-widget.php';

/**
 * Implements Mailchimp subscribe widget class.
 */
require_once 'includes/widgets/class.mailchimp-subscribe-widget.php';

/**
 * Implements Ecologie search widget class.
 *
 * @since 0.9.2
 */
require_once 'includes/widgets/class.search-widget.php';

/**
 * Registers widgets and widget areas.
 */
require_once 'includes/widgets/widgets.php';

/**
 * Registers and renders menus.
 */
require_once 'includes/menus/menus.php';

/**
 * Tackles features related to the blog.
 */
require_once 'includes/blog/blog.php';

/**
 * Introduces development mode on localhost.
 */
require_once 'includes/dev-env.php';

/**
 * Registers customiser sections, settings and options.
 */
require_once 'includes/options.php';

/**
 * Implements general functionality.
 */
require_once 'includes/general.php';

/**
 * Includes built-in PHPMailer class.
 *
 * @since 0.9
 */
require_once ABSPATH . WPINC . '/class-phpmailer.php';

/**
 * Handles Google authentication and communication with API.
 *
 * @since 0.9
 */
require_once 'includes/contact/gmail-auth.php';

/**
 * Implements contact shortcode.
 */
require_once 'includes/contact/contact.php';