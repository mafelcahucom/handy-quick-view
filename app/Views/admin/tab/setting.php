<?php
/**
 * App > Views > Admin > Tab > Setting.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

use HQFW\Admin\Inc\Helper;
use HQFW\Admin\Inc\Component;
use HQFW\Admin\Inc\Field;
use HQFW\Api\SettingApi;

defined( 'ABSPATH' ) || exit;

// Get the setting current value.
$settings = SettingApi::get_current_settings();

/**
 * Header
 */
echo Component::get_header();

/**
 * Tab Navigation.
 */
echo Component::get_tab_navigation(array(
    'class' => 'hd-mb-30',
    'tabs'  => array(
        array(
            'title' => __( 'General', 'handy-quick-view' ),
            'panel' => '#general',
        ),
        array(
            'title' => __( 'Quick View Button', 'handy-quick-view' ),
            'panel' => '#quick-view-button',
        ),
        array(
            'title' => __( 'Modal', 'handy-quick-view' ),
            'panel' => '#modal',
        ),
        array(
            'title' => __( 'Product Thumbnail', 'handy-quick-view' ),
            'panel' => '#product-thumbnail',
        ),
        array(
            'title' => __( 'Product Summary', 'handy-quick-view' ),
            'panel' => '#product-summary',
        ),
        array(
            'title' => __( 'Advanced', 'handy-quick-view' ),
            'panel' => '#advanced',
        ),
    ),
));

/**
 * General Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'general',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'general_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'General', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Quick View', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_enable',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_enable'],
                            'description' => __( 'Enable this option to activate handy quick view functionalities in the front-end.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Quick View Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'block',
                    'fields' => array(
                        Field::get_note_field(array(
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', 'handy-quick-view' ),
                            'content' => __( 'You can manually use or add a quick view button by using the shortcode <code>[handy-quick-view-button id="product_id"]</code>. Note do not forget to provide the product id.', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Button Position', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'gn_qv_btn_position',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_qv_btn_position'],
                            'description' => __( 'Select the quick view button position in the product loop thumbnail.', 'handy-quick-view' ),
                            'options' => array(
                                array(
                                    'value' => 1,
                                    'label' => __( 'Before Add To Cart Button', 'handy-quick-view' ),
                                ),
                                array(
                                    'value' => 2,
                                    'label' => __( 'After Add To Cart Button', 'handy-quick-view' ),
                                ),
                                array(
                                    'value' => 3,
                                    'label' => __( 'Manually Position Using Shortcode', 'handy-quick-view' ),
                                ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Modal', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Product Slider', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_md_enable_slider',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_md_enable_slider'],
                            'description' => __( 'Enable this option to use a slider option on the quick view product to easily navigate or preview the previous and next product without closing the modal.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Close Button', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_md_show_close_btn',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_md_show_close_btn'],
                            'description' => __( 'Show this to display the close button in the modal.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Thumbnail', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Slider', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_enable_slider',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_slider'],
                            'description' => __( 'Enable this option to use the image slider feature in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Zoom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_enable_zoom',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_zoom'],
                            'description' => __( 'Enable this option to zoom-in the image when hovered or focused in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Lightbox', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_enable_lightbox',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_lightbox'],
                            'description' => __( 'Enable this option to use image lightbox feature in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Image Collections', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_show_collection',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_collection'],
                            'description' => __( 'Show this to display the image collection or gallery shortcut in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Slider Bullets', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_show_bullet',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_bullet'],
                            'description' => __( 'Show this to display the slider bullets shortcut in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Flash Sale Badge', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_pt_show_flash_sale',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_flash_sale'],
                            'description' => __( 'Show this to display product flash sale badge in the product thumbnail.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Summary', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Title', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_title',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_title'],
                            'description' => __( 'Show this to display product title in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Rating', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_rating',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_rating'],
                            'description' => __( 'Show this to display product rating in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Price', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_price',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_price'],
                            'description' => __( 'Show this to display product price in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Excerpt', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_exerpt',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_exerpt'],
                            'description' => __( 'Show this to display product excerpt in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Add To Cart Button', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_add_to_cart',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_add_to_cart'],
                            'description' => __( 'Show this to display product add to cart button in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Meta', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'gn_ps_show_meta',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_meta'],
                            'description' => __( 'Show this to display product meta in the product summary.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Show', 'handy-quick-view' ),
                                'off' => __( 'Hide', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'general_setting_group',
            ),
        )),
    ),
));

/**
 * Quick View Button Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'quick-view-button',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'quick_view_button_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'block',
                    'fields' => array(
                        Field::get_note_field(array(
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', 'handy-quick-view' ),
                            'content' => __( 'You can manually use or add a quick view button by using the shortcode <code>[handy-quick-view-button id="product_id"]</code>. Note do not forget to provide the product id.', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Style', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'qv_btn_style',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_style'],
                            'description' => __( 'Select your preferred button style.', 'handy-quick-view' ),
                            'options' => array(
                                array(
                                    'value' => 'text',
                                    'label' => __( 'Text', 'handy-quick-view' ),
                                ),
                                array(
                                    'value' => 'icon',
                                    'label' => __( 'Icon', 'handy-quick-view' ),
                                ),
                                array(
                                    'value' => 'text-icon',
                                    'label' => __( 'Text & Icon', 'handy-quick-view' ),
                                ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_icon_picker_field(array(
                            'name'  => 'qv_btn_icon',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon'],
                            'description' => __( 'Select your preferred icon to use in button.', 'handy-quick-view' ),
                            'icons' => array(
                                'bs-eye',
'bs-eye-fill',
'bs-search',
                                'bs-expand',
'bs-fullscreen',
'bs-arrow-fullscreen',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon Properties', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_icon_wd',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_icon_ht',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_icon_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_icon_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Label', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_text',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_text'],
                            'placeholder' => __( 'Label', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_fs',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'qv_btn_fw',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_wd',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_ht',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_bg_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_bg_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Padding', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_pt',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pt'],
                            'label' => __( 'Top', 'handy-quick-view' ),
                            'placeholder' => __( 'Top', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_pb',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pb'],
                            'label' => __( 'Bottom', 'handy-quick-view' ),
                            'placeholder' => __( 'Bottom', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_pl',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pl'],
                            'label' => __( 'Left', 'handy-quick-view' ),
                            'placeholder' => __( 'Left', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_pr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pr'],
                            'label' => __( 'Right', 'handy-quick-view' ),
                            'placeholder' => __( 'Right', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'qv_btn_bs',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_bw',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_b_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                         Field::get_color_picker_field(array(
                            'name'  => 'qv_btn_hv_b_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'qv_btn_br',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_br'],
                            'label' => __( 'Border Radius', 'handy-quick-view' ),
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'quick_view_button_setting_group',
            ),
        )),
    ),
));

/**
 * Modal Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'modal',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'modal_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Modal', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'md_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_bg_clr'],
                            'label' => __( 'Panel', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_overlay_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_overlay_bg_clr'],
                            'label' => __( 'Overlay', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_br'],
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Close Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_icon_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_icon_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_icon_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_icon_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_bg_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'md_close_btn_bs',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_bw',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                         Field::get_color_picker_field(array(
                            'name'  => 'md_close_btn_hv_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_close_btn_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_br'],
                            'label' => __( 'Border Radius', 'handy-quick-view' ),
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Slider Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Previous Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_icon_picker_field(array(
                            'name'  => 'md_sldr_btn_icon_prev',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_prev'],
                            'description' => __( 'Select your preferred icon to use in the previous product slider button.', 'handy-quick-view' ),
                            'icons' => array(
                                'bs-chevron-left',
'bs-arrow-left',
'bs-arrow-left-circle',
'bs-arrow-left-circle-fill',
                                'bs-arrow-left-square',
'bs-arrow-left-square-fill',
'bs-caret-left',
'bs-caret-left-fill',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Next Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_icon_picker_field(array(
                            'name'  => 'md_sldr_btn_icon_next',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_next'],
                            'description' => __( 'Select your preferred icon to use in the next product slider button.', 'handy-quick-view' ),
                            'icons' => array(
                                'bs-chevron-right',
'bs-arrow-right',
'bs-arrow-right-circle',
'bs-arrow-right-circle-fill',
                                'bs-arrow-right-square',
'bs-arrow-right-square-fill',
'bs-caret-right',
'bs-caret-right-fill',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_icon_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_icon_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_icon_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_icon_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_bg_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'md_sldr_btn_bs',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_bw',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                         Field::get_color_picker_field(array(
                            'name'  => 'md_sldr_btn_hv_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_sldr_btn_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_br'],
                            'label' => __( 'Border Radius', 'handy-quick-view' ),
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Loader', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Select Loader Style', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_loader_picker_field(array(
                            'name'  => 'md_loader_style',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_style'],
                            'description' => __( 'Select your preferred loader style to use in the modal.', 'handy-quick-view' ),
                            'choices' => array(
                                'spinner-1',
'spinner-2',
'spinner-3',
                                'spinner-4',
'spinner-5',
'spinner-6',
                                'spinner-7',
'spinner-8',
'spinner-9',
                                'pulse-1',
'pulse-2',
'pulse-3',
'pulse-4',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'md_loader_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_loader_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'md_loader_stroke_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_stroke_wd'],
                            'label' => __( 'Stroke Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Stroke Width', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'md_loader_clr_1',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_clr_1'],
                            'label' => __( 'Primary Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'md_loader_clr_2',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_clr_2'],
                            'label' => __( 'Secondary Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'modal_setting_group',
            ),
        )),
    ),
));

/**
 * Product Thumbnail Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'product-thumbnail',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'product_thumbnail_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Panel', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Padding', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_panel_pt',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pt'],
                            'label' => __( 'Top', 'handy-quick-view' ),
                            'placeholder' => __( 'Top', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_panel_pb',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pb'],
                            'label' => __( 'Bottom', 'handy-quick-view' ),
                            'placeholder' => __( 'Bottom', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_panel_pl',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pl'],
                            'label' => __( 'Left', 'handy-quick-view' ),
                            'placeholder' => __( 'Left', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_panel_pr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pr'],
                            'label' => __( 'Right', 'handy-quick-view' ),
                            'placeholder' => __( 'Right', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Image Slider Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Previous Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_icon_picker_field(array(
                            'name'  => 'pt_sldr_btn_icon_prev',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_prev'],
                            'description' => __( 'Select your preferred icon to use in the previous image slider button.', 'handy-quick-view' ),
                            'icons' => array(
                                'bs-chevron-left',
'bs-arrow-left',
'bs-arrow-left-circle',
'bs-arrow-left-circle-fill',
                                'bs-arrow-left-square',
'bs-arrow-left-square-fill',
'bs-caret-left',
'bs-caret-left-fill',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Next Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_icon_picker_field(array(
                            'name'  => 'pt_sldr_btn_icon_next',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_next'],
                            'description' => __( 'Select your preferred icon to use in the next image slider button.', 'handy-quick-view' ),
                            'icons' => array(
                                'bs-chevron-right',
'bs-arrow-right',
'bs-arrow-right-circle',
'bs-arrow-right-circle-fill',
                                'bs-arrow-right-square',
'bs-arrow-right-square-fill',
'bs-caret-right',
'bs-caret-right-fill',
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_icon_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_icon_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_icon_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_icon_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_bg_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'pt_sldr_btn_bs',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_bw',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                         Field::get_color_picker_field(array(
                            'name'  => 'pt_sldr_btn_hv_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_sldr_btn_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_br'],
                            'label' => __( 'Border Radius', 'handy-quick-view' ),
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Zoom Button', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Icon', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_icon_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_icon_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_icon_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_icon_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_bg_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'pt_zoom_btn_bs',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_bw',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                         Field::get_color_picker_field(array(
                            'name'  => 'pt_zoom_btn_hv_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_zoom_btn_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_br'],
                            'label' => __( 'Border Radius', 'handy-quick-view' ),
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Slider Bullets Shortcut', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Size', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_bul_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_wd'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'pt_bul_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_ht'],
                            'label' => __( 'Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_bul_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_bg_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'pt_bul_bg_ac_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_bg_ac_clr'],
                            'label' => __( 'Hover & Active Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Gap', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_bul_gap',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_gap'],
                            'placeholder' => __( 'Gap', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_bul_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_br'],
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Image Collections Shortcut', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Maximum Width', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_col_mx_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_mx_wd'],
                            'placeholder' => __( 'Maximum Width', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Gap', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_col_gap',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_gap'],
                            'placeholder' => __( 'Gap', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'pt_col_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_br'],
                            'placeholder' => __( 'Border Radius', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'product_thumbnail_setting_group',
            ),
        )),
    ),
));

/**
 * Product Summary Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'product-summary',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'product_summary_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Panel', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Padding', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_panel_pt',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pt'],
                            'label' => __( 'Top', 'handy-quick-view' ),
                            'placeholder' => __( 'Top', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_panel_pb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pb'],
                            'label' => __( 'Bottom', 'handy-quick-view' ),
                            'placeholder' => __( 'Bottom', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_panel_pl',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pl'],
                            'label' => __( 'Left', 'handy-quick-view' ),
                            'placeholder' => __( 'Left', 'handy-quick-view' ),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_panel_pr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pr'],
                            'label' => __( 'Right', 'handy-quick-view' ),
                            'placeholder' => __( 'Right', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Name', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_name_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_name_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_name_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_name_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_clr'],
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_name_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_mb'],
                            'placeholder' => __( 'Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Rating', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Label Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_rating_label_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_rating_label_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_rating_label_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Label Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_rating_label_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_clr'],
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Star Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_rating_star_clr_1',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_star_clr_1'],
                            'label' => __( 'Primary', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_rating_star_clr_2',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_star_clr_2'],
                            'label' => __( 'Secondary', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_rating_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_mb'],
                            'placeholder' => __( 'Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Price', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_price_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_price_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_price_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_price_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_clr'],
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_price_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_mb'],
                            'placeholder' => __( 'Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Description', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_desc_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_desc_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_desc_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_desc_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_clr'],
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_desc_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_mb'],
                            'placeholder' => __( 'Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Form', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Variation Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_form_var_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_form_var_mb'],
                            'placeholder' => __( 'Variation Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Add To Cart Margin Bottom', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_form_atc_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_form_atc_mb'],
                            'placeholder' => __( 'Add To Cart Margin Bottom', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Stock Status', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_stst_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_stst_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_stst_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_stst_ink_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_ink_clr'],
                            'label' => __( 'In Stock', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_stst_aob_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_aob_clr'],
                            'label' => __( 'Available On Backorder', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_stst_ook_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_ook_clr'],
                            'label' => __( 'Out Of Stock', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Product Meta', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Font', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_text_field(array(
                            'name'  => 'ps_meta_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_fs'],
                            'label' => __( 'Font Size', 'handy-quick-view' ),
                            'placeholder' => __( 'Font Size', 'handy-quick-view' ),
                        )),
                        Field::get_select_field(array(
                            'name'  => 'ps_meta_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_fw'],
                            'label' => __( 'Font Weight', 'handy-quick-view' ),
                            'options' => Helper::get_font_weight_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_meta_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_lh'],
                            'label' => __( 'Line Height', 'handy-quick-view' ),
                            'placeholder' => __( 'Line Height', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Color', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_meta_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_clr'],
                            'label' => __( 'Text Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_meta_link_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_link_clr'],
                            'label' => __( 'Link Color', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_meta_link_hv_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_link_hv_clr'],
                            'label' => __( 'Link Hover & Focus Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Border', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_select_field(array(
                            'name'  => 'ps_meta_bs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_bs'],
                            'label' => __( 'Style', 'handy-quick-view' ),
                            'options' => Helper::get_border_style_choices(),
                        )),
                        Field::get_text_field(array(
                            'name'  => 'ps_meta_bw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_bw'],
                            'label' => __( 'Width', 'handy-quick-view' ),
                            'placeholder' => __( 'Width', 'handy-quick-view' ),
                        )),
                        Field::get_color_picker_field(array(
                            'name'  => 'ps_meta_b_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_b_clr'],
                            'label' => __( 'Color', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'product_summary_setting_group',
            ),
        )),
    ),
));

/**
 * Advanced Tab Panel
 */
echo Component::get_tab_panel(array(
    'id'         => 'advanced',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => array(
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'advanced_setting_group',
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Optimization', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'block',
                    'fields' => array(
                        Field::get_note_field(array(
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', 'handy-quick-view' ),
                            'content' => __( 'Note that all settings here are used to enhance the performance of this plugin on the front-end side. This can improve your speed score in services like Pingdom, GTmetrix and PageSpeed.', 'handy-quick-view' ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Caching', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'ad_opt_enable_cache',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_cache'],
                            'description' => __( 'Enable this option to cache the external style and script files so that they can be accessed more quickly.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable CSS & JS Minification', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'ad_opt_enable_minify',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_minify'],
                            'description' => __( 'Enable this option to minify the internal and external style and script files to reduce load times and bandwidth.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Enable Deffered JS', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_switch_field(array(
                            'name'  => 'ad_opt_enable_defer',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_defer'],
                            'description' => __( 'Enable this option to defer external scripts so they will be downloaded in parallel to the parsing page and executed after page is finished parsing.', 'handy-quick-view' ),
                            'choices' => array(
                                'on'  => __( 'Enabled', 'handy-quick-view' ),
                                'off' => __( 'Disabled', 'handy-quick-view' ),
                            ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_card(array(
            'title'      => __( 'Additional', 'handy-quick-view' ),
            'class'      => 'hd-mb-30',
            'components' => array(
                Component::get_row(array(
                    'type'   => 'grid',
                    'label'  => __( 'Custom CSS', 'handy-quick-view' ),
                    'fields' => array(
                        Field::get_textarea_field(array(
                            'name'  => 'ad_add_custom_css',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_add_custom_css'],
                            'description' => __( 'Add your own CSS code here to customize the appearance of quick view components at the front-end.', 'handy-quick-view' ),
                        )),
                    ),
                )),
            ),
        )),
        Component::get_button(array(
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', 'handy-quick-view' ),
            'attr'  => array(
                'data-group-target' => 'advanced_setting_group',
            ),
        )),
    ),
));

/**
 * Placeholder.
 */
echo Component::get_placeholder();

/**
 * Footer.
 */
echo Component::get_footer();
