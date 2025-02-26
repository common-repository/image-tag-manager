=== Image Tag Manager ===
Contributors: bradleydalina
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QX8K5XTVBGV42&source=url
Tags: image, image-tag-manager, image tag manager, image-title, image-alt, img-tag, media, tag, seo-optimize,seo,  seo-image,  title, alt, alternative text
Requires at least: 4.6
Tested up to: 5.7.2
Stable tag: 1.5
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to dynamically generates (alt, title, caption and description) in any images of your site for SEO enhancement.

== Description ==

Image Tag Manager is a WordPress plugin that allows to dynamically generates (alt, title, caption and description) in images (except iframes content) for SEO enhancement.
It also fixed the filenames before saving, removing unnecessary characters to transform into more meaningful and SEO friendly filename.

"This plugin is limited with its available settings. Before writing a review, please *mention that you read the whole description* and clearly understand the limit and usage of the plugin."

NOTE: Please always read the changelog for the plugin updates.

**Plugin Options**

**Basic**
* On upload image file
  * Set image alt (Default)
  * Set image title (Default)
  * Set image caption (optional)
  * Set image description (optional)

**Alt/Title**
* Override Settings
  * Override Alt ( Overrides the current/existing alt attributes of the image )
  * Override Title ( Overrides the current/existing title attributes of the image )
* Additional String in Attributes, Applicable inside the entry post content or page articles only
  * Use bar ( | ) instead of hypen ( - )
  * Add Post/Page title to image alt attributes ( Ex: Image Alt - Post Title )
  * Add Post/Page title to image title attributes ( Ex: Image Title - Post Title )
  * Add Post/Page first category to image alt attributes ( Ex: Image Alt - Category )
  * Add Post/Page first category to image title attributes ( Ex: Image Title - Category )
* Character or String Removal in Attributes (Global)
  * Enable String Trimmer ( This allows you to trim/remove any part of the string from the alt or title attributes )
  * Remove or trim this words if found from the alt attributes ( Separated by comma )
  * Remove or trim this words if found from the title attributes ( Separated by comma )

**Word Settings**
* Special/Nonword Character Preservations
  * Clean All ( Remove any nonword characters in the entire string of the Alt/Title Attributes )
  * Preserved All ( Preserved the entire string characters in the Alt/Title Attributes special or nonword characters including numbers)
  * Preserved Special ( Preserved special or nonword characters and make stripping numbers optional in the Alt/Title Attributes )
* Numerical Character Preservations
  * Strip Numbers ( Remove numbers in the filename: "filename 300x450.jpg" becomes "filename" )
  * Use Post/Page title as fallback to image attributes ( For randomly generated filenames like 1127.jpg or with less than 3 letters and image is not attached in a post)
* String Case Manipulation
  * Leave Unchanged
  * Lowercase ( Alt/Title Attributes will be converted to lowercase )
  * Uppercase ( Alt/Title Attributes will be converted to uppercase )
  * Capitalized ( Alt/Title Attributes will be capitalized each word )
  * Sentence Case ( Alt/Title Attributes will transform the first letter of the first word only )

**Extra**
* Add default class ( class="your-default-class" )
  * Global (Throughout the site )
  * Entry Post Section ( Applies in the entry post section only )
  * Default Class ( Separated by single space )
* Disable Srcset and sizes
  * Remove srcset & sizes attribute ( Get rid of srcset="" sizes="" attribute )

**advance**
* Applicable only on the post content generated by wordpress from content editor. The hardcoded image can't be save in the database.
  * Use data saving attributes ( This will be saved along with the post content and can work even when the plugin was removed. )

== Installation ==

This section describes how to install the plugin and get it working.

e.g.
1. Upload the entire `image-tag-manager` folder to the `/wp-content/plugins/` directory or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Media->Image Tag Manager screen to configure the plugin

== Frequently Asked Questions ==

= What will happen when I remove this plugin? =

This plugin has an options, the `data_saving` which can be found in the under > Media> Image Tag manager > plugin settings.

* The **Data Saving** option applies on before saving of any post type e.g( pages, post ) so the the attributes will be saved along with the content in the database, and when you remove this plugin the (title) attribute will remain. However Gutenberg content editor does not recognized title as a valid attribute in an image tag.
* While setting this option to false, it only filters the content before it renders the page using wordpress filter hooks. So this does not affects your database or modify the original content of your post. But when you remove this plugin the title attributes will no longer take effect unless you do it manually or use another plugin.

= Does it applies in * all images in the website? =

Yes! It captures all images that can be scanned within the page. So your logo's, footer badges can also have the alt's and title attributes. Please also note that there are some filters which are not applicable globally like adding the category of the post, it is only applicable in the post content images.

= What happens to the image `old or original` attributes? =

This plugin has an override option if you want to override the old/original/current alt's and title attributes of the image. If set to false the plugin will skip the image will has already alt and title attributes.


== Screenshots ==

1. screenshot-1.jpg
1. screenshot-2.jpg
1. screenshot-3.jpg
1. screenshot-4.jpg
1. screenshot-5.jpg

== Changelog ==

= 1.0 =
* Initial release
= 1.1 =
* Added Character Preservation Options (Clean All, Preserved All, Preserved Special)
* Added String Separator
* Added String Case Option (Unchange, Lowercase, Uppercase, Capitalized and Sentence Case)
* Make JS filter optional with logs
* Make the image post title as the primary source for alt and title attribute and make the image filename as fallback.
  (This is based on wordpress meta data generated from image exif info.)
= 1.2 =
* Updated and fixed register_activation_hook (initialized option values)
* Updated and fixed register_uninstall_hook (delete option values)
= 1.3 =
* UI Design updated
* Added Network Multisite Support
* Added Post Category options
= 1.4 =
* Fix parent post
= 1.4 =
* Dashboard udpate

== Upgrade Notice ==

Please read the **Change Log** before upgrading, so that you will know what changes have been applied.

Languages: English
