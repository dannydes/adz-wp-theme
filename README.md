# Ecologie
Theme inspired by Green politics - the political ideology built around peace, the environment, labour and civil rights.

Originally designed for ADZ - Alternattiva Demokratika Żgħażagħ.

## Content
* [Menus](#menus "Menus")
  - [Primary Menu](#primary-menu "Primary Menu")
  - [Footer Bottom Menu](#footer-bottom-menu "Footer Bottom Menu")
* [Custom Header Image](#custom-header-image "Custom Header Image")
* [Custom Logo](#custom-logo "Custom Logo")
* [Customiser Settings](#customiser-settings "Customiser Settings")
  - [Home Call to Action Block](#home-call-to-action-block "Home Call to Action Block")
    - [Call to Action Text](#call-to-action-text "Call to Action Text")
    - [Call to Action Button Text](#call-to-action-button-text "Call to Action Button Text")
    - [Call to Action Button URL](#call-to-action-button-url "Call to Action Button URL")
  - [AddThis Social Sharing Tool](#addthis-social-sharing-tool "AddThis Social Sharing Tool")
    - [AddThis Profile ID](#addthis-profile-id "AddThis Profile ID")
    - [Enable AddThis sharing buttons](#enable-addthis-sharing-buttons "Enable AddThis sharing buttons")
  - [Blog](#blog "Blog")
    
  - [Header](#header "Header")
        Enable header
        Enable header image text
        Header image text
        Header image Electoral Manifesto URL
  - [Footer](#footer "Footer")
        Text to add to copyright notice
        Enable copyright notice
  - [Contact Shortcode](#contact-shortcode "Contact Shortcode")
        Contact Email Connection Method
        SMTP Host
        SMTP Secure Connection Method
        SMTP Port
        SMTP Username
        SMTP Password
        Authenticate with Gmail.
  - [Sidebar](#sidebar "Sidebar")
        Enable sidebar
  - [Production Mode](#production-mode "Production Mode")
        Enable Production Mode

* [Widgets](#widgets "Widgets")
  - [Contact](#contact "Contact")
  - [Mailchimp Subscribe](#mailchimp-subscribe "Mailchimp Subscribe")
  - [Social Buttons](#social-buttons "Social Buttons")
  - [Upcoming Event](#upcoming-event "Upcoming Event")
* [Widget Areas](#widget-areas "Widget Areas")
* [Shortcodes](#shortcodes "Shortcodes")
  - [Contact Us](#contact-us "Contact Us")
* [Links (Blogroll)](#links-blogroll "Links (Blogroll)")

## Menus
The theme provides two customisable menu locations, one on top and another beneat the footer. Remember to assign the 
appropriate menu location to your menu.

### Primary Menu
The menu at the top. This will stay visible as the user scrolls through the page. A **Sidebar** toggling button is 
automatically added to right of this menu.

![Primary Menu](https://github.com/dannydes/ecologie/raw/master/screenshots/menus/primary-menu.png "Primary Menu")

### Footer Bottom Menu
The menu at the bottom. Only accepts a single-level menu.

![Footer Menu](https://github.com/dannydes/ecologie/raw/master/screenshots/menus/footer-menu.png "Footer Menu")

## Custom Header Image
The header image is customisable through the standard Wordpress UI. In order to change it, click 
`` Apperance > Header `` and follow instructions.

## Custom Logo
The site logo is customisable through the standard Wordpress UI. In order to change it, click 
`` Appearance > Customizer > Site Identity `` and follow instructions in the logo section.

## Customiser Settings
These settings may be accessed by clicking `` Appearance > Customize > Ecologie Settings ``.

## Home Call to Action Block
This section contains settings related to the call-to-action in the front page.

### Call to Action Text
Paragraph to display in the call-to-action.

## Call to Action Button Text
Call-to-action button caption.

## Call to Action Button URL
Call-to-action button link URL.

## AddThis Social Sharing Tool
This section contains settings related to AddThis social sharing in blog posts.

### AddThis Profile ID
Profile ID of AddThis account to integrate.

### Enable AddThis sharing buttons
Enable/disable AddThis sharing.

## Blog
This section contains settings related to the blog.

### Number of recent posts
Number of recent posts to display on front page.

## Header
This section contains settings related to the header.

### Enable header
Enable/disable header.

### Enable header image text
Show/hide text to display on header image.

### Header image text
Paragraph to be displayed upon header image.

### Header image Electoral Manifesto URL
URL for the Electoral Manifesto link displayed upon header image.

## Footer
This section contains settings related to the footer.

### Text to add to copyright notice
Text to be displayed near the copyright notice in the footer.

### Enable copyright notice
Show/hide copyright notice.

## Contact Shortcode
This section contains settings related to the Contact shortcode.

### Contact Email Connection Method
Whether you would like emails to be send through SMTP or the Gmail API. In case you'll be attaching a Gmail account, the latter 
is recommended.

### SMTP Host
Internet address of your SMTP host of choice.

### SMTP Secure Connection Method
Secure connection method of your preference or provided by your SMTP host of choice.

### SMTP Port
Port accessible at your SMTP host of choice.

### SMTP Username
SMTP username for your organisation's email account.

### SMTP Password
SMTP password for your organisation's email account.

### Authenticate with Gmail.
Link to Google authentication for your contact forms.

## Sidebar
This section contains settings related to the sidebar.

### Enable sidebar
Enable/disable sidebar.

## Production Mode
This section only shows up in `` localhost `` environments and contains settings to ease theme development. If you see this on 
your site's backend, then it's probably a bug.

### Enable Production Mode
Toggle between production mode (when enabled) and development mode (when disabled). When disabled and consequently development 
mode is on, you should see a notice in the front-end menu header. When development mode is on, you should be able to debug 
the theme's development JavaScript files and view debug information about contact form shortcode requests from your browser's 
dev tools network panel.

## Widgets
### Contact
From the backend, the widget allows the administrator to input 4 address lines, the country code, phone number and email address for 
their organisation.

![Contact widget backend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/contact-backend.png "Contact widget backend")

On the frontend, the user will see the organisation's address if provided, phone number if provided and/or email address if provided.

![Contact widget frontend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/contact-frontend.png "Contact widget frontend")

### Mailchimp Subscribe
From the backend, the widget allows the administrator to input either the form's original HTML for user ID and form ID to be extracted or directly input the organisation's 
user ID and form ID (both required for the form to work).

The first option is the most straight-forward since it consists of merely copying the form's HTML. In order to access the HTML for the Mailchimp form you would like to 
embed, kindly log in to your **Mailchimp** account, click **Lists**, locate the list to link to the form, click the down arrow beside it and then select **Signup Forms**. 
Finally, click **Embedded forms** and copy the form's HTML to clipboard. On switching to your site's backend, paste the markup to a **Mailchimp Subscribe** widget 
instance. Upon clicking **Save**, you should notice that the **User ID** and **Form ID** fields are populated.

![Mailchimp get form HTML](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/mailchimp-get-form-html.png "Mailchimp get form HTML")

On the other hand, in case Mailchimp change their markup and the extraction mechanism fails, you would need to manually st the **User ID** and **Form ID**.

![Mailchimp Subscribe widget backend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/mailchimp-backend.png "Mailchimp Subscribe widget backend")

![Mailchimp Subscribe widget frontend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/mailchimp-frontend.png "Mailchimp Subscribe widget frontend")

### Social Buttons
From the backend, the widget allows the administrator to input the URLs for the organisation's media accounts. The URLs are validated to contain the service URL.

![Social Buttons widget backend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/social-backend.png "Social Buttons widget backend")

On the frontend, the user will see links for the provided social networks. Clicking upon the link, opens the profile for that social network in a new tab.

![Social Buttons widget frontend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/social-frontend.png "Social Buttons widget frontend")

### Upcoming Event
The Upcoming Event widget is aimed at improving event exposure for visitors of the website.

From the backend, the widget allows the administrator to input the event's title, time, date, venue, description and URL for event page.

![Upcoming Event widget backend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/upcoming-event-backend.png "Upcoming Event widget backend")

On the frontend, the user will see the event's title if provided, time if provided, date if provided, venue if provided, description if provided and the **More info...** 
button will be linked to the appropriate URL if provided.

![Upcoming Event widget frontend](https://github.com/dannydes/ecologie/raw/master/screenshots/widgets/upcoming-event-frontend.png "Upcoming Event widget frontend")

## Widget Areas
Now, lets talk about areas where widgets may be dropped. Ecologie provides the following:
* Sidebar
* Footer Column 1
* Footer Column 2
* Footer Column 3
* Footer Column 4

![Sidebar](https://github.com/dannydes/ecologie/raw/master/screenshots/widget-areas/sidebar.png "Sidebar")

![Footer](https://github.com/dannydes/ecologie/raw/master/screenshots/widget-areas/footer.png "Footer")

## Shortcodes
### Contact Us
This shortcode builds a contact form and has the following syntax: 
`` [contact-us at="<email-to-send-to>" at-name="<name-to-send-to>"] ``

It may also be inserted through the **Contact Us** editor button.

![Contact Us button](https://github.com/dannydes/ecologie/raw/master/screenshots/shortcodes/contact-us-btn.png "Contact Us button")

Once you click the button, the following dialog is shown:

![Contact Us dialog](https://github.com/dannydes/ecologie/raw/master/screenshots/shortcodes/contact-us-dialog.png "Contact Us dialog")

Kindly enter your email and name into the designated fields. In case your email is left out, you will get the following dialog:

![Contact Us email missing dialog](https://github.com/dannydes/ecologie/raw/master/screenshots/shortcodes/contact-us-email-missing.png "Contact Us email missing dialog")

Please note, that currently only a single **Contact Us** form per page may be activated. However, that is subject to change in the near future.

## Links (Blogroll)
The theme enables Wordpress's Links feature. For information about how to utilise it, [read here.](https://codex.wordpress.org/Links_Manager "Links (Blogroll)")
