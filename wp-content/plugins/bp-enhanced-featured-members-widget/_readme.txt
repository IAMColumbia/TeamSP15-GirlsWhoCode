/*--------------------------------------------------------------
PLUGIN INFO
--------------------------------------------------------------*/

Name: Enhanced Featured Members Widget
Author: BuddyBoss.com
Tags: buddypress, featured members, widget
Requires at least: WordPress 3.6, BuddyPress 1.7
Tested up to: WordPress 3.8 BuddyPress 1.9.1

This BuddyPress plugin widget lets you choose one or more members to feature, and will display each member with an avatar and text link to their profile.

/*--------------------------------------------------------------
DESCRIPTION
--------------------------------------------------------------*/

The Enhanced Featured Members Widget is a simple BuddyPress plugin widget that allows you to indicate which BuddyPress members you want to feature (via their unique username). You can feature a single member or multiple members.

It uses core BuddyPress CSS selectors for output formatting. So, the output looks like other standard, core BP widgets. If you want to customize the formatting, you'll need to add your own CSS. You may need to do this if you're using a custom theme. If so, you should use the same CSS that positions the other widgets in your theme.

/*--------------------------------------------------------------
INSTALLATION
--------------------------------------------------------------*/

Like all WP widgets, this widget is managed via the WordPress admin panel. Just download, unzip, and place it in your /plugins folder. However, as this is a BuddyPress-specific widget, it must be activated like other BP plugins. Widget installation is handled this way so that if BuddyPress is not activated, then this plugin widget will not be loaded, which could cause issues with your WP site. The widget does an internal check to see if BuddyPress is activated, if so then it continues loading. If not, it stops loading and will not be visible in the widget gallery. The widget is automatically activated sitewide so your other members will not see it in their plugins section if you're running a multisite install.

1. Upload the 'bp-enhanced-featured-members-widget' folder to the '/wp-content/plugins/' directory

2. Visit the WordPress admin panel and activate the plugin by visiting the plugins menu and clicking the "Activate" link for the Enhanced Featured Members Widget plugin. It will automatically be activated sitewide. There is no need to click the Activate Site Wide link.

3. Navigate to "Appearance > Widgets" and drag the Enhanced Featured Members widget from the Available Widgets section to the Sidebar.

4. Click the widget's "Edit" button (the small grey triangle to the right of the widget's name) to set the available widget parameters.

5. You can change the widget's outputted title and add members to be featured by entering their unique username (the name with which they registered), not their display name.