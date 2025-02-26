<?php
/**
 * Restrict Direct Access
 */
defined( 'ABSPATH' ) or die( 'You\'re in the wrong way of access...' );
/**
* Main Class
*/
class ITMPluginSettings {
    public function __construct() {
            /**
            * Show the form
            */
            self::RenderForm();
    }
    public static function HandleForm() {
        /**
        * Verify user permission and access level
        */
        ITMPlugin::Authorize();
        /**
        * Verify nonce submitted within the form
        */
        if(! isset( $_POST['ITMPlugin_action'] ) || ! wp_verify_nonce( $_POST['ITMPlugin_action'], 'ITMPlugin_nonce' )) {
            ?>
            <span class="error notice is-dismissible">
                 <p>Sorry, your nonce was incorrect. Please try again.</p>
            </span>
            <?php
        }
        else {
            /**
            * Validate Post values
            */
            $image_caption = intval($_POST['image_caption']);
            $image_description = intval($_POST['image_description']);

            $preserved_char = intval($_POST['preserved_char']);
            $strip_numbers = intval($_POST['strip_numbers']);
            $use_post_title_as_default = intval($_POST['use_post_title_as_default']);
            $string_case = intval($_POST['string_case']);

            $data_saving=intval($_POST['data_saving']);
            $override_alt=intval($_POST['override_alt']);
            $override_title=intval($_POST['override_title']);

            $bar_separator = intval($_POST['bar_separator']);
            $add_post_title_to_alt = intval($_POST['add_post_title_to_alt']);
            $add_post_title_to_title = intval($_POST['add_post_title_to_title']);

            $string_trimmer = intval($_POST['string_trimmer']);
            $remove_from_alt = sanitize_text_field($_POST['remove_from_alt']);
            $remove_from_title = sanitize_text_field($_POST['remove_from_title']);

            $add_class = intval($_POST['add_class']);
            $default_class = sanitize_text_field($_POST['default_class']);
            $remove_srcset_sizes = intval($_POST['remove_srcset_sizes']);

            $js_filter = intval($_POST['js_filter']);
            $js_log = intval($_POST['js_log']);

            /**
            * Update Plugin Options
            */
            update_option( 'image_caption', $image_caption );
            update_option( 'image_description', $image_description );

            update_option( 'preserved_char', $preserved_char);
            update_option( 'strip_numbers', $strip_numbers );
            update_option( 'use_post_title_as_default', $use_post_title_as_default );
            update_option( 'string_case', $string_case );

            update_option( 'data_saving', $data_saving );
            update_option( 'override_alt', $override_alt );
            update_option( 'override_title', $override_title );

            update_option( 'bar_separator', $bar_separator);
            update_option( 'add_post_title_to_alt', $add_post_title_to_alt );
            update_option( 'add_post_title_to_title', $add_post_title_to_title );

            update_option( 'string_trimmer', $string_trimmer );
            update_option( 'remove_from_alt', $remove_from_alt );
            update_option( 'remove_from_title', $remove_from_title );

            update_option( 'add_class', $add_class );
            update_option( 'default_class', $default_class );
            update_option( 'remove_srcset_sizes', $remove_srcset_sizes );

            update_option( 'js_filter', $js_filter );
            update_option( 'js_log', $js_log );

            ?>
            <span class="success notice is-dismissible">
                    <p>Your plugin settings were saved!</p>
            </span>
            <?php
        }
    }

    public static function RenderForm() {
        ?>
        <nav><h3>Plugin Settings</h3><a href="?page=<?php echo ITM_PLUGIN; ?>&view=plugin-settings" class="active">Plugin Settings</a><a href="?page=<?php echo ITM_PLUGIN; ?>&view=how-it-works">How it works</a><a href="?page=<?php echo ITM_PLUGIN; ?>&view=support">Support</a></nav>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right">
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="QX8K5XTVBGV42" />
        <input type="image" src="<?php echo ITM_ABSPATH;?>admin/img/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_PH/i/scr/pixel.gif" width="1" height="1" />
        </form>
        <?php
            /**
            * Check for post action
            */
            if ( ! empty( $_POST ) && isset( $_POST['ITMPlugin_action'] ) ) {
                self::HandleForm();
            }
        ?>
        <form id="settings" class="itm-wrap" method="POST">
                    <?php wp_nonce_field( 'ITMPlugin_nonce', 'ITMPlugin_action' ); ?>
                    <input type="hidden" name="ITMPlugin_nonce" value=1 />
                    <strong>Basic Settings <small>( Global ) </small></strong>
                    <!--Start Basic Settings-->
                    <br/><br/>
                        <small>On upload image file</small>
                        <span class="formgroup inline">
                            <label for="image_alt">Set Image Alt <small>( Default )</small></label>
                            <input onClick="return false;" disabled name="image_alt" id="image_alt" type="checkbox" value=1 class="" checked/>
                        </span>
                        <span class="formgroup inline">
                            <label for="image_title">Set Image Title <small>( Default )</small></label>
                            <input onClick="return false;" disabled only name="image_title" id="image_title" type="checkbox" value=1 class="" checked/>
                        </span>
                        <span class="formgroup inline">
                            <label for="image_caption">Set Image Caption <small>( Optional )</small></label>
                            <input name="image_caption" id="image_caption" type="checkbox" value=1 class="" <?php echo (boolval(get_option('image_caption'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="image_description">Set Image Description <small>( Optional )</small></label>
                            <input name="image_description" id="image_description" type="checkbox" value=1 class="" <?php echo (boolval(get_option('image_description'))) ? 'checked' : ''; ?>/>
                        </span>
                        <small>Override Settings</small>
                        <span class="formgroup inline">
                            <label for="override_alt">Override Alt<small> ( Overrides the current/existing alt attributes of the image )</small></label>
                            <input name="override_alt" id="override_alt" type="checkbox" value=1 class="" <?php echo (boolval(get_option('override_alt'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="override_title">Override Title<small> ( Overrides the current/existing title attributes of the image )</small></label>
                            <input name="override_title" id="override_title" type="checkbox" value=1 class="" <?php echo (boolval(get_option('override_title'))) ? 'checked' : ''; ?>/>
                        </span>
                    <!--End Basic Settings-->
                    <br/>
                    <strong>Name/Title Settings <small>( Global ) </small></strong>
                    <!--Start Name/Title Settings-->
                    <br/><br/>
                    <small> Special/Nonword Character Preservations </small>
                        <span class="formgroup inline">
                            <label for="clean_all">Clean All<small> ( Remove any nonword characters in the entire string of the Alt/Title Attributes )</small></label>
                            <input name="preserved_char" id="clean_all" type="radio" value=0 class="" <?php echo (intval(get_option('preserved_char'))==0) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="preserved_all">Preserved All<small> ( Preserved the entire string characters in the Alt/Title Attributes special or nonword characters including numbers)</small></label>
                            <input name="preserved_char" id="preserved_all" type="radio" value=1 class="" <?php echo (intval(get_option('preserved_char'))==1) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="preserved_special">Preserved Special<small> ( Preserved special or nonword characters and make stripping numbers optional in the Alt/Title Attributes )</small></label>
                            <input name="preserved_char" id="preserved_special" type="radio" value=2 class="" <?php echo (intval(get_option('preserved_char'))==2) ? 'checked' : ''; ?>/>
                        </span>
                        <small> Number Character Preservations </small>
                        <span class="formgroup inline">
                            <label for="strip_numbers">Strip Numbers<small> ( Remove numbers in the filename: "filename 300x450.jpg" becomes "filename" )</small></label>
                            <input name="strip_numbers" id="strip_numbers" type="checkbox" value=1 class="" <?php echo (boolval(get_option('strip_numbers'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="use_post_title_as_default">Use Post/Page title as fallback to image attributes<small> ( For randomly generated filenames like 1127.jpg or with less than 3 letters and image is not attached in a post)</small></label>
                            <input name="use_post_title_as_default" id="use_post_title_as_default" type="checkbox" value=1 class="" <?php echo (boolval(get_option('use_post_title_as_default'))) ? 'checked' : ''; ?>/>
                        </span>
                        <small> Applicable inside the entry post content or page articles only </small><br/>
                        <small> Alt/Title Separator with Post/Page Title If you checked the two preceeding options, the default separator is hypen ( - )</small>
                        <span class="formgroup inline">
                            <label for="bar_separator">Use bar ( | ) instead of hypen ( - )<small></small></label>
                            <input name="bar_separator" id="bar_separator" type="checkbox" value=1 class="" <?php echo (boolval(get_option('bar_separator'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="add_post_title_to_alt">Add Post/Page title to image alt attributes<small> ( Ex: Image Alt - Post Title )</small></label>
                            <input name="add_post_title_to_alt" id="add_post_title_to_alt" type="checkbox" value=1 class="" <?php echo (boolval(get_option('add_post_title_to_alt'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="add_post_title_to_title">Add Post/Page title to image title attributes<small> ( Ex: Image Title - Post Title )</small></label>
                            <input name="add_post_title_to_title" id="add_post_title_to_title" type="checkbox" value=1 class="" <?php echo (boolval(get_option('add_post_title_to_title'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="string_trimmer">Enable String Trimmer<small> ( This allows you to trim/remove any part of the string from the alt or title attributes )</small></label>
                            <input name="string_trimmer" id="string_trimmer" type="checkbox" value=1 class="" <?php echo (boolval(get_option('string_trimmer'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup" <?php echo (get_option('string_trimmer')) ? 'style="display:none;"' : ''; ?> >
                            <label for="remove_from_alt">Remove or trim this words if found from the alt attributes <small> ( Separated by comma )</small></label>
                            <input placeholder="banner, image, logo, icon" size="25" name="remove_from_alt" id="remove_from_alt" type="text" value="<?php echo (get_option('remove_from_alt')!==false) ? get_option('remove_from_alt') : ''; ?>" class=""/>
                        </span>
                        <span class="formgroup" <?php echo (get_option('string_trimmer')) ? 'style="display:none;"' : ''; ?> >
                            <label for="remove_from_title">Remove or trim this words if found from the title attributes  <small> ( Separated by comma )</small></label>
                            <input placeholder="banner, image, logo, icon" size="25" name="remove_from_title" id="remove_from_title" type="text" value="<?php echo (get_option('remove_from_title')!==false) ? get_option('remove_from_title') : ''; ?>" class=""/>
                        </span>
                        <small> String Case </small>
                        <span class="formgroup inline">
                            <label for="leave_case">Leave Unchanged</label>
                            <input name="string_case" id="leave_case" type="radio" value=0 class="" <?php echo (intval(get_option('string_case'))==0) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="lowercase">Lowercase<small> ( Alt/Title Attributes will be converted to lowercase )</small></label>
                            <input name="string_case" id="lowercase" type="radio" value=1 class="" <?php echo (intval(get_option('string_case'))==1) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="uppercase">Uppercase<small> ( Alt/Title Attributes will be converted to uppercase )</small></label>
                            <input name="string_case" id="uppercase" type="radio" value=2 class="" <?php echo (intval(get_option('string_case'))==2) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="capitalized">Capitalized<small> ( Alt/Title Attributes will be capitalized each word )</small></label>
                            <input name="string_case" id="capitalized" type="radio" value=3 class="" <?php echo (intval(get_option('string_case'))==3) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="sentence">Sentence Case<small> ( Alt/Title Attributes will transform the first letter of the first word only )</small></label>
                            <input name="string_case" id="sentence" type="radio" value=4 class="" <?php echo (intval(get_option('string_case'))==4) ? 'checked' : ''; ?>/>
                        </span>
                    <!--End Name/Title Settings-->
                    <br/>
                    <strong class="" style="display:block;">Extra Settings</strong>
                    <small> Applicable inside the entry post content or page articles only </small>
                    <!--Start Extra Settings-->
                        <span class="formgroup inline">
                            <label for="add_class">Add default class<small> ( class="your-default-class" )</small></label>
                            <input name="add_class" id="add_class" type="checkbox" value=1 class="" <?php echo (boolval(get_option('add_class'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup" <?php echo (get_option('add_class')) ? 'style="display:none;"' : ''; ?> >
                            <label for="default_class">Default Class <small> ( Separated by single space )</small></label>
                            <input placeholder="your-class" size="25" name="default_class" id="default_class" type="text" value="<?php echo (get_option('default_class')!==false) ? get_option('default_class') : ''; ?>" class=""/>
                        </span>
                        <span class="formgroup inline">
                            <label for="remove_srcset_sizes">Remove srcset & sizes attribute<small> ( Get rid of srcset="" sizes="" attribute )</small></label>
                            <input name="remove_srcset_sizes" id="remove_srcset_sizes" type="checkbox" value=1 class="" <?php echo (boolval(get_option('remove_srcset_sizes'))) ? 'checked' : ''; ?>/>
                        </span>
                    <!--End Extra Settings-->
                    <br/>
                    <strong class="" style="display:block;">Advance Settings <small>( Global )</small></strong>
                    <!--Start Advance Settings-->
                        <small>Applicable only on the post content generated by wordpress. The hardcoded image can't be save in the database.</small>
                        <span class="formgroup inline">
                            <label for="data_saving">Use data saving attributes<small> ( This will be saved along with the post content and can work even when the plugin was removed. )</small></label>
                            <input name="data_saving" id="data_saving" type="checkbox" value=1 class="" <?php echo (boolval(get_option('data_saving'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="js_filter">Enable JS filter<small> ( This will cover the images which can't be updated thru the wordpress filter hook which is limited at post content area. )</small></label>
                            <input name="js_filter" id="js_filter" type="checkbox" value=1 class="" <?php echo (boolval(get_option('js_filter'))) ? 'checked' : ''; ?>/>
                        </span>
                        <span class="formgroup inline">
                            <label for="js_log">Enable JS log<small> ( This show log at the console window of the images affected by the js filter. )</small></label>
                            <input name="js_log" id="js_log" type="checkbox" value=1 class="" <?php echo (boolval(get_option('js_log'))) ? 'checked' : ''; ?>/>
                        </span>
                    <!--End Advance Settings-->
                    <p class="t-submit">
                        <input type="submit" name="settings-submit" id="settings-submit" class="button button-primary" value="Save Settings">
                    </p>
        </form>
        <?php
    }
}
/**
* Initialized
*/
$ITMPluginSettings = new ITMPluginSettings();
