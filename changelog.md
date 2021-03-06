# 0.9.2 ([Release date here])

* Contact widget: Spacing for email and phone
* Contact widget: Address is now shown in a block
* Upgraded to Font Awesome 5
* Sidebar button now shows as icon
* Sidebar button now has accessible/visible hover popups
* Veritically centered site logo
* Corrected some notices
* Enabled multi-level dropdowns in primary menu
* Introduced Search widget
* Introduced widget area in header

# 0.9.1 (25-2-2018)

* Social Widget: Added option to add link to site's primary RSS feed
* Default logo shown in case no logo is provided by user
* 404: Sidebar is now usable
* Customiser: Added options to show/hide site title and description in primary menu (title hidden by default)
* Customiser: Moved "Sidebar" section to newly added "General" section
* Customiser: Set lower limit for "Number of recent posts" to 1
* Front page: Bigger font for call-to-action block
* Custom search page
* Back to top button
* Contact Shortcode: Invisible reCAPTCHA replacing arithmetic captcha
* Contact Shortcode: Redirect URL field in Customiser
* Contact Shortcode: Upon authentication with Google, the link to authenticate is changed to text reading "Authenticated!"
* Contact Shortcode: Option to enable/disable captcha
* Comment navigation arrows
* Default buttons gone greenish
* Mailchimp Subscribe Widget: Fixed regression with interaction
* Contact Widget: Country codes now fetched through restcountries.eu
* Contact Widget: Calling codes now visible in dropdown options
* Navigation Menus: No bullets/separators if no menu is yet set for location
* Site title and description in header and footer are now limited to the first 40 and 120 characters respectively
* Shortened text shown in header for development mode to just " | Dev mode"
* Footer: Top part is hidden in case no widget area contains widgets
* Code cleanup and documentation changes

# 0.9 (27-12-2017)

* Header: Option to enable/disable
* Header: Option to enable/disable Manifesto link
* Blog: Pagination now reflecting specified number of blog posts per page
* Blog: Blog post listings' background changed to light green
* Sidebar: Option to enable/disable
* Sidebar: Clicking the toggling button no longer hashes the URL
* Contact Shortcode: Button to generate shortcode in editor
* Contact Shortcode: HTML required/aria-required being used for client-side validation
* Contact Shortcode: Simple arithmetic CAPTCHA
* Contact Shortcode: Throbber while awaiting response
* Contact Shortcode: Quite alerts replacing dialogs on success/error
* Contact Shortcode: Email validation
* Contact Shortcode: Secure Connection Mode is now a radio option rather than free text
* Contact Shortcode: Fixed issue where hidden fields are cleared on successfully sending feedback causing subsequent calls to be rejected
* Contact Shortcode: Organisation email is now stored in session rather than as a hidden field
* Contact Shortcode: Internal server errors (500) are now reported to the user
* Contact Shortcode: Integration with Google API
* Blog post comments: HTML required/aria-required being used for client-side validation
* Blog post comments: Indentation for replies up to level 5
* Blog post comments: Changed pagination style to numbered
* Footer: Changed copyright message
* Footer: Option to enable/disable copyright message
* Footer: Upper part's background changed to light green
* Widgets: Backend validation errors are now displayed
* Widgets: Backend fields now have the standard look and feel
* Social Buttons Widget: Added Github
* Social Buttons Widget: Added aria support
* Social Buttons Widget: Vertical spacing
* Social Buttons Widget: URL inputs on the backend swapped for username inputs
* Upcoming Event Widget: Fixed a lot of date/time issues
* Upcoming Event Widget: More info URL validation
* Contact Widget: Added address lines and phone country code fields at backend
* Contact Widget: Email validation
* Mailchimp Subscribe Widget: Option to enter User and Form ID via embed HTML
* AddThis sharing buttons: Profile ID setting in place of script URL setting
* Notice in menu header when Development Mode is enabled
* Notice for first-time visitors about cookie storage
* Customiser: Description for [nearly] every setting
* .form-control now has a green border
* General code cleanup, reorganisation, refactoring and documentation updates
* Development environment: localhost:(port) URLs are now detected
* Updated theme description

## Known Issues

* Due to a conflict with Bootstrap.js & jQuery, the Mailchimp script has been removed resulting in no front-end interaction

# 0.8.4

* Supplied default header image
* 404 makeover
* Updated Bootstrap.js to 3.3.7
* Call to Action Block: Renamed options
* Menu logo inline style is now applied in original Bootstrap LESS
* Renamed some LESS files to a more standard way
* Widget following social buttons widget in same widget-area no longer starts in same line
* Removed Blogroll and Recent Posts widgets
* jQuery conflict resolved
* Contact form: `` From: `` label included in message body
* Contact form: script localization
* Contact form: more configurable SMTP connection
* Contact form: right modal is shown when email is sent successfully
* Contact form: SMTP debug respects theme development/production mode

# 0.8.3

* Customizer - postMessage refresh of recent posts
* Customizer - postMessage refresh of blog posts per page
* Updated screenshot
* Header image enabled
* New development mode - Development JavaScript files are served in localhost with option to serve production script
* Restructured copyright notice
* Fixed bug in pagination where the number of posts per page was not being reflected
* AddThis script is now only output for posts and blog page
* Noscript warning now takes full screen width
* Experimental non-functional [contact-us] shortcode

# 0.8.2.1

* Resolved regression - base-js not loading if mailchimp in front-end
* Upcoming Event Widget - Some further checks to make sure date is in the future
* Comments - Form is now checked through JavaScript
* Comments - Form placeholders

# 0.8.2

* Posts without a featured image are assigned the post's first image
* Option to add text to Copyright notice
* Code readability - LESS nesting review and other minor changes
* Performance - Mailchimp script only served if Mailchimp widget detected in front-end
* AddThis script no longer async
* JS Customizer refresh for copyright text and call-to-action block settings
* Social icons circular appearance
* Upcoming Event Widget - HTML5 date input replaced by traditional HTML4 inputs
* Upcoming Event Widget - Date format changed in front-end
* Upcoming Event Widget - HTML5 time input replaced by traditional HTML4 inputs

# 0.8.1

* Recent posts section is now still displayed when there are no posts, stating blog is empty
* Implemented options to regulate number of recent posts and posts displayed per page
* Fixed image scaling problem
* Site title now turns white on hover
* Minor code cleanup

# 0.8

* Upcoming Event Widget
* Blogroll now implemented as a widget
* Social widget form is now checked for errors of URL placement
* Social widget form controls now all occur in a new line
* Code reorganisation
* Bootstrap-based pagination
* Clicking "Sidebar" button no longer resets vertical scrollbar position
* Custom logo support
* Rebranded to "Ecologie"
* Updated screenshot
* Front-page call-to-action block
* Styled image captions
* Customizer settings for home call-to-action block, AddThis script URL and AddThis enabled checkbox
* Excluded files not needed in production including this changelog

# 0.7.4

* Documentation update
* Removed bullet next to "Blogroll"
* Applied :hover to links in footer and sidebar
* Sidebar is now wider
* Sidebar is now opened through a button in menu
* Code cleanup
* More space between widgets in sidebar

# 0.7.3

* Navbar link color scheme reversed apart from logo text
* Blogroll through old WP Links Manager
* "Lock Sidebar" button reads "UnLock Sidebar" when activated
* Documentation update

# 0.7.2

* Last bottom link is no longer followed by a pipe
* Sidebar lock is now called as such (simple renaming)
* Added fork of WP's Recent Posts widget
* Links in sidebar are now white

# 0.7.1

* Code cleanup
* Sidebar and Bootstrap scripts now load in same tag
* Sidebar improvements
* Ability to share blog posts via AddThis

# 0.7

* Bottom menu is now customisable
* Added Youtube support in social buttons widget
* Sidebar now lockable
