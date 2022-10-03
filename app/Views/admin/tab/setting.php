<?php
/**
 * Views > Admin > Tab > Setting.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom 
 */

use HQFW\Admin\Inc\Helper;
use HQFW\Admin\Inc\Component;
use HQFW\Admin\Inc\Field;
use HQFW\Admin\Tab\Setting\SettingApi; // TO BE REMOVED.


defined( 'ABSPATH' ) || exit;

//$settings = get_option( '_hqfw_main_settings' );
$settings = SettingApi::get_settings(); // TO BE REMOVED.

/**
 * Header
 */
echo Component::get_header( $args['page_title'] ); ?>

<div class="hd-container">

    <?php
        /**
         * Tab Navigation.
         */
        echo Component::get_tab_navigation([
            'class' => 'hd-mb-30',
            'tabs'  => [
                [
                    'title' => 'General',
                    'panel' => '#general'
                ],
                [
                    'title' => 'Quick View Button',
                    'panel' => '#quick-view-button'
                ],
                [
                    'title' => 'Modal',
                    'panel' => '#modal'
                ],
                [
                    'title' => 'Product Thumbnail',
                    'panel' => '#product-thumbnail'
                ],
                [
                    'title' => 'Product Summary',
                    'panel' => '#product-summary'
                ],
                [
                    'title' => 'Advanced',
                    'panel' => '#advanced'
                ]
            ]
        ]);
    ?>

    <?php

        /**
         * General - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'general',
            'state' => 'active'
        ]);

        /**
         * Save button settings - general_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hsfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'general_setting_group'
            ]
        ]);

        /**
         * Quick View Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Quick View Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_note_field([
            'title' => 'Instruction',
            'message' => 'You can manually use or add a quick view button by using the shortcode <code>[handy-quick-view-button id="product_id"]</code>. Note do not forget to provide the product id.'
        ]);

        echo Field::get_select_field([
            'name'  => 'gn_qv_btn_position',
            'group' => 'general_setting_group',
            'value' => $settings['gn_qv_btn_position'],
            'label' => 'Button Position',
            'description' => 'Select the quick view button position in product loop thumbnail.',
            'options' => [
                [
                    'value' => 1,
                    'label' => 'Before Add To Cart Button'
                ],
                [
                    'value' => 2,
                    'label' => 'After Add To Cart Button'
                ],
                [
                    'value' => 3,
                    'label' => 'Before Product Image'
                ],
                [
                    'value' => 4,
                    'label' => 'After Product Image'
                ],
                [
                    'value' => 5,
                    'label' => 'After Product Title'
                ],
                [
                    'value' => 6,
                    'label' => 'After Product Rating'
                ],
                [
                    'value' => 7,
                    'label' => 'After Product Flash Sale'
                ],
                [
                    'value' => 8,
                    'label' => 'After Product Price'
                ],
                [
                    'value' => 9,
                    'label' => 'Manually Position Using Shortcode'
                ]
            ]
        ]);

        /**
         * Quick View Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Modal - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Modal',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_md_enable_slider',
            'group' => 'general_setting_group',
            'value' => $settings['gn_md_enable_slider'],
            'label' => 'Enable Product Slider',
            'description' => 'Enable this to use a slider option on the quick view product to easily navigate or preview the previous and next product without closing the modal.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_md_show_close_btn',
            'group' => 'general_setting_group',
            'value' => $settings['gn_md_show_close_btn'],
            'label' => 'Show Close Button',
            'description' => 'Enable this to show the close button in the modal. Note the modal can be close by just clicking the modal overlay.',
        ]);

        /**
         * Modal - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Thumbnail - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Thumbnail',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_show',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_show'],
            'label' => 'Show Product Thumbnail Section',
            'description' => 'Enable to show the product thumbnail section in the modal.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_enable_slider',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_enable_slider'],
            'label' => 'Enable Image Slider',
            'description' => 'Enable this to use the image slider feature in the product thumbnail.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_enable_zoom',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_enable_zoom'],
            'label' => 'Enable Image Zoom',
            'description' => 'Enable this to zoom-in the image when hovered or focused in the product thumbnail.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_enable_lightbox',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_enable_lightbox'],
            'label' => 'Enable Image Lightbox',
            'description' => 'Enable this to use image lightbox feature in the product thumbnail.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_show_collection',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_show_collection'],
            'label' => 'Show Image Collections',
            'description' => 'Enable this to show the image collection or gallery shortcut in the product thumbnail.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_pt_show_bullet',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_show_bullet'],
            'label' => 'Show Slider Bullets',
            'description' => 'Enable this to show the slider bullets shortcut in the product thumbnail.',
        ]);

        /**
         * Product Thumbnail - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Summary - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Summary',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show'],
            'label' => 'Show Product Summary Section',
            'description' => 'Enable this to show product summary section in the modal.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_title',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_title'],
            'label' => 'Show Product Title',
            'description' => 'Enable this to show product title in the product summary.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_rating',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_rating'],
            'label' => 'Show Product Rating',
            'description' => 'Enable this to show product rating in the product summary.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_price',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_price'],
            'label' => 'Show Product Price',
            'description' => 'Enable this to show product price in the product summary.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_exerpt',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_exerpt'],
            'label' => 'Show Product Excerpt',
            'description' => 'Enable this to show product excerpt in the product summary.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_add_to_cart',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_add_to_cart'],
            'label' => 'Show Product Add To Cart Button',
            'description' => 'Enable this to show product add to cart button in the product summary.',
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_ps_show_meta',
            'group' => 'general_setting_group',
            'value' => $settings['gn_ps_show_meta'],
            'label' => 'Show Product Meta',
            'description' => 'Enable this to show product meta in the product summary.',
        ]);

        /**
         * Product Summary - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Toaster - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Toaster',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_switch_field([
            'name'  => 'gn_tr_use_toaster',
            'group' => 'general_setting_group',
            'value' => $settings['gn_tr_use_toaster'],
            'label' => 'Use Toaster',
            'description' => 'Enable to use the prompt toaster.',
        ]);

        echo Field::get_number_field([
            'name'  => 'gn_tr_show_duration',
            'group' => 'general_setting_group',
            'value' => $settings['gn_tr_show_duration'],
            'label' => 'Duration',
            'description' => 'Set the total milliseconds before the toaster will automatically hide.',
            'placeholder' => 'Duration'
        ]);

        /**
         * Toater - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Save button settings - general_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hsfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'general_setting_group'
            ]
        ]);

        /**
         * General - Tab Closing.
         */
        echo Component::get_tab_panel_closing();
    ?>

    <?php

        /**
         * Quick View Button - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'quick-view-button',
            'state' => 'active'
        ]);

        /**
         * Save button settings - quick_view_button_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hsfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'quick_view_button_group'
            ]
        ]);

        /**
         * Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_select_field([
            'name'  => 'qv_btn_style',
            'group' => 'quick_view_button_group',
            'value' => $settings['qv_btn_style'],
            'label' => 'Style',
            'description' => 'Select your preferred button style.',
            'options' => [
                [
                    'value' => 'text',
                    'label' => 'Text'
                ],
                [
                    'value' => 'icon',
                    'label' => 'Icon'
                ],
                [
                    'value' => 'text-icon',
                    'label' => 'Text & Icon'
                ]
            ]
        ]);

        echo Field::get_text_field([
            'name'  => 'qv_btn_text',
            'group' => 'quick_view_button_group',
            'value' => $settings['qv_btn_text'],
            'label' => 'Label',
            'placeholder' => 'Label'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_fs',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'qv_btn_fw',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Text Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_hv_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_icon_picker_field([
            'name'  => 'qv_btn_icon',
            'group' => 'quick_view_button_group',
            'value' => $settings['qv_btn_icon'],
            'label' => 'Icon',
            'description' => 'Select your preferred icon to use in button.',
            'icons' => [
                'bs-eye', 'bs-eye-fill', 'bs-search',
                'bs-expand', 'bs-fullscreen', 'bs-arrow-fullscreen'
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_icon_wd',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_icon_ht',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_icon_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_icon_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_icon_hv_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Button Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_wd',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_ht',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Button Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_bg_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_bg_clr'],
                    'label' => 'Color',
                    'placeholder' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_bg_hv_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color',
                    'placeholder' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Button Padding',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_pt',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_pt'],
                    'label' => 'Top',
                    'placeholder' => 'Top'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pb',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_pb'],
                    'label' => 'Bottom',
                    'placeholder' => 'Bottom'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pl',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_pl'],
                    'label' => 'Left',
                    'placeholder' => 'Left'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_pr'],
                    'label' => 'Right',
                    'placeholder' => 'Right'
                ]),
            ]   
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Button Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'qv_btn_bs',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_bw',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_b_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'qv_btn_hv_b_clr',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_br',
                    'group' => 'quick_view_button_group',
                    'value' => $settings['qv_btn_br'],
                    'label' => 'Radius',
                    'placeholder' => 'Radius'
                ]),
            ]   
        ]);

        /**
         * Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Save button settings - quick_view_button_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hsfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'quick_view_button_group'
            ]
        ]);

        /**
         * Quick View Button - Tab Closing.
         */
        echo Component::get_tab_panel_closing();

    ?>

</div>

<?php 
    /**
     * Footer.
     */
    echo Component::get_footer(); 
?>