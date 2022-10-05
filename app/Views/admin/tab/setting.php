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

defined( 'ABSPATH' ) || exit;

$settings = get_option( '_hqfw_main_settings' );

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
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
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

        echo Field::get_switch_field([
            'name'  => 'gn_pt_show_flash_sale',
            'group' => 'general_setting_group',
            'value' => $settings['gn_pt_show_flash_sale'],
            'label' => 'Show Product Flash Sale Badge',
            'description' => 'Enable this to show product flash sale badge in the product thumbnail.',
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
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
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
         * Save button settings - quick_view_button_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'quick_view_button_setting_group'
            ]
        ]);

        /**
         * Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Quick View Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_select_field([
            'name'  => 'qv_btn_style',
            'group' => 'quick_view_button_setting_group',
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

        echo Field::get_icon_picker_field([
            'name'  => 'qv_btn_icon',
            'group' => 'quick_view_button_setting_group',
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
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_icon_ht',
                    'group' => 'quick_view_button_setting_group',
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
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_icon_hv_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_text_field([
            'name'  => 'qv_btn_text',
            'group' => 'quick_view_button_setting_group',
            'value' => $settings['qv_btn_text'],
            'label' => 'Label',
            'placeholder' => 'Label'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_fs',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'qv_btn_fw',
                    'group' => 'quick_view_button_setting_group',
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
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_hv_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_wd',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_ht',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_bg_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_bg_hv_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Padding',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'qv_btn_pt',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_pt'],
                    'label' => 'Top',
                    'placeholder' => 'Top'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pb',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_pb'],
                    'label' => 'Bottom',
                    'placeholder' => 'Bottom'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pl',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_pl'],
                    'label' => 'Left',
                    'placeholder' => 'Left'
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_pr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_pr'],
                    'label' => 'Right',
                    'placeholder' => 'Right'
                ]),
            ]   
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'qv_btn_bs',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_bw',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'qv_btn_b_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'qv_btn_hv_b_clr',
                    'group' => 'quick_view_button_setting_group',
                    'value' => $settings['qv_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'qv_btn_br',
                    'group' => 'quick_view_button_setting_group',
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
         * Save button settings - quick_view_button_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'quick_view_button_setting_group'
            ]
        ]);

        /**
         * Quick View Button - Tab Closing.
         */
        echo Component::get_tab_panel_closing();
    ?>

    <?php
        /**
         * Modal - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'modal',
            'state' => 'active'
        ]);

        /**
         * Save button settings - modal_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'modal_setting_group'
            ]
        ]);

        /**
         * Modal - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Modal',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_bg_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_bg_clr'],
                    'label' => 'Panel',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_overlay_bg_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_overlay_bg_clr'],
                    'label' => 'Overlay',
                ])
            ]
        ]);

        echo Field::get_text_field([
            'name'  => 'md_br',
            'group' => 'modal_setting_group',
            'value' => $settings['md_br'],
            'label' => 'Panel Border Radius',
            'placeholder' => 'Border Radius'
        ]);

        /**
         * Modal - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Close Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Close Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'md_close_btn_icon_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'md_close_btn_icon_ht',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_icon_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_close_btn_icon_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_close_btn_icon_hv_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'md_close_btn_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'md_close_btn_ht',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_close_btn_bg_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_close_btn_bg_hv_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'md_close_btn_bs',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'md_close_btn_bw',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_close_btn_b_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'md_close_btn_hv_b_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'md_close_btn_br',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_close_btn_br'],
                    'label' => 'Radius',
                    'placeholder' => 'Radius'
                ]),
            ]   
        ]);

        /**
         * Close Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Slider Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Slider Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_icon_picker_field([
            'name'  => 'md_sldr_btn_icon_prev',
            'group' => 'modal_setting_group',
            'value' => $settings['md_sldr_btn_icon_prev'],
            'label' => 'Previous Icon',
            'description' => 'Select your preferred icon to use in previous product slider button.',
            'icons' => [
                'bs-chevron-left', 'bs-arrow-left', 'bs-arrow-left-circle',
                'bs-arrow-left-circle-fill', 'bs-arrow-left-square', 'bs-arrow-left-square-fill',
                'bs-caret-left', 'bs-caret-left-fill'
            ]
        ]);

        echo Field::get_icon_picker_field([
            'name'  => 'md_sldr_btn_icon_next',
            'group' => 'modal_setting_group',
            'value' => $settings['md_sldr_btn_icon_next'],
            'label' => 'Next Icon',
            'description' => 'Select your preferred icon to use in next product slider button.',
            'icons' => [
                'bs-chevron-right', 'bs-arrow-right', 'bs-arrow-right-circle',
                'bs-arrow-right-circle-fill', 'bs-arrow-right-square', 'bs-arrow-right-square-fill',
                'bs-caret-right', 'bs-caret-right-fill'
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_icon_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_icon_ht',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_icon_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_icon_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_icon_hv_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_ht',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_bg_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_bg_hv_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'md_sldr_btn_bs',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_bw',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_b_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'md_sldr_btn_hv_b_clr',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'md_sldr_btn_br',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_sldr_btn_br'],
                    'label' => 'Radius',
                    'placeholder' => 'Radius'
                ]),
            ]   
        ]);

        /**
         * Product Slider Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Loader - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Loader',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_loader_picker_field([
            'name'  => 'md_loader_style',
            'group' => 'modal_setting_group',
            'value' => $settings['md_loader_style'],
            'label' => 'Select Loader Style',
            'description' => 'Select your preferred loader style to use in modal.',
            'choices' => [
                'spinner-1', 'spinner-2', 'spinner-3',
                'spinner-4', 'spinner-5', 'spinner-6',
                'spinner-7', 'spinner-8', 'spinner-9',
                'pulse-1', 'pulse-2', 'pulse-3', 'pulse-4'
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'md_loader_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_loader_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'md_loader_ht',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_loader_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ]),
                Field::get_text_field([
                    'name'  => 'md_loader_stroke_wd',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_loader_stroke_wd'],
                    'label' => 'Stroke Width',
                    'placeholder' => 'Stroke Width'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'md_loader_clr_1',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_loader_clr_1'],
                    'label' => 'Primary Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'md_loader_clr_2',
                    'group' => 'modal_setting_group',
                    'value' => $settings['md_loader_clr_2'],
                    'label' => 'Secondary Color',
                ])
            ]
        ]);

        /**
         * Loader - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Save button settings - modal_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'modal_setting_group'
            ]
        ]);

        /**
         * Modal - Tab Closing.
         */
        echo Component::get_tab_panel_closing();
    ?>

    <?php
        /**
         * Product Thumbnail - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'product-thumbnail',
            'state' => 'active'
        ]);

        /**
         * Save button settings - product_thumbnail_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'product_thumbnail_setting_group'
            ]
        ]);

        /**
         * Panel - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Panel',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Padding',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_panel_pt',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_panel_pt'],
                    'label' => 'Top',
                    'placeholder' => 'Top'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_panel_pb',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_panel_pb'],
                    'label' => 'Bottom',
                    'placeholder' => 'Bottom'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_panel_pl',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_panel_pl'],
                    'label' => 'Left',
                    'placeholder' => 'Left'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_panel_pr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_panel_pr'],
                    'label' => 'Right',
                    'placeholder' => 'Right'
                ]),
            ]   
        ]);

        /**
         * Panel - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Image Slider Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Image Slider Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_icon_picker_field([
            'name'  => 'pt_sldr_btn_icon_prev',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_sldr_btn_icon_prev'],
            'label' => 'Previous Icon',
            'description' => 'Select your preferred icon to use in previous image slider button.',
            'icons' => [
                'bs-chevron-left', 'bs-arrow-left', 'bs-arrow-left-circle',
                'bs-arrow-left-circle-fill', 'bs-arrow-left-square', 'bs-arrow-left-square-fill',
                'bs-caret-left', 'bs-caret-left-fill'
            ]
        ]);

        echo Field::get_icon_picker_field([
            'name'  => 'pt_sldr_btn_icon_next',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_sldr_btn_icon_next'],
            'label' => 'Next Icon',
            'description' => 'Select your preferred icon to use in next image slider button.',
            'icons' => [
                'bs-chevron-right', 'bs-arrow-right', 'bs-arrow-right-circle',
                'bs-arrow-right-circle-fill', 'bs-arrow-right-square', 'bs-arrow-right-square-fill',
                'bs-caret-right', 'bs-caret-right-fill'
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_icon_wd',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_icon_ht',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_icon_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_icon_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_icon_hv_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_wd',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_ht',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_bg_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_bg_hv_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'pt_sldr_btn_bs',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_bw',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_b_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'pt_sldr_btn_hv_b_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'pt_sldr_btn_br',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_sldr_btn_br'],
                    'label' => 'Radius',
                    'placeholder' => 'Radius'
                ]),
            ]   
        ]);

        /**
         * Image Slider Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Zoom Button - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Zoom Button',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_icon_wd',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_icon_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_icon_ht',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_icon_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Icon Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_icon_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_icon_clr'],
                    'label' => 'Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_icon_hv_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_icon_hv_clr'],
                    'label' => 'Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_wd',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_ht',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_bg_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_bg_hv_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_bg_hv_clr'],
                    'label' => 'Hover & Focus Color'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'pt_zoom_btn_bs',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_bw',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_b_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_b_clr'],
                    'label' => 'Color',
                ]),
                 Field::get_color_picker_field([
                    'name'  => 'pt_zoom_btn_hv_b_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_hv_b_clr'],
                    'label' => 'Hover & Focus Color',
                ]),
                Field::get_text_field([
                    'name'  => 'pt_zoom_btn_br',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_zoom_btn_br'],
                    'label' => 'Radius',
                    'placeholder' => 'Radius'
                ]),
            ]   
        ]);

        /**
         * Zoom Button - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Slider Bullets Shortcut - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Slider Bullets Shortcut',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Size',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'pt_bul_wd',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_bul_wd'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_text_field([
                    'name'  => 'pt_bul_ht',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_bul_ht'],
                    'label' => 'Height',
                    'placeholder' => 'Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Background Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'pt_bul_bg_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_bul_bg_clr'],
                    'label' => 'Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'pt_bul_bg_ac_clr',
                    'group' => 'product_thumbnail_setting_group',
                    'value' => $settings['pt_bul_bg_ac_clr'],
                    'label' => 'Hover & Active Color'
                ])
            ]
        ]);

        echo Field::get_text_field([
            'name'  => 'pt_bul_gap',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_bul_gap'],
            'label' => 'Gap',
            'placeholder' => 'Gap'
        ]);

        echo Field::get_text_field([
            'name'  => 'pt_bul_br',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_bul_br'],
            'label' => 'Border Radius',
            'placeholder' => 'Border Radius'
        ]);

        /**
         * Slider Bullets Shortcut - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Image Collections Shortcut - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Image Collections Shortcut',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_text_field([
            'name'  => 'pt_col_mx_wd',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_col_mx_wd'],
            'label' => 'Maximum Width',
            'placeholder' => 'Maximum Width'
        ]);

        echo Field::get_text_field([
            'name'  => 'pt_col_gap',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_col_gap'],
            'label' => 'Gap',
            'placeholder' => 'Gap'
        ]);

         echo Field::get_text_field([
            'name'  => 'pt_col_br',
            'group' => 'product_thumbnail_setting_group',
            'value' => $settings['pt_col_br'],
            'label' => 'Border Radius',
            'placeholder' => 'Border Radius'
        ]);

        /**
         * Image Collections Shortcut - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Save button settings - product_thumbnail_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'product_thumbnail_setting_group'
            ]
        ]);

        /**
         * Product Thumbnail - Tab Closing.
         */
        echo Component::get_tab_panel_closing();
    ?>

    <?php
        /**
         * Product Summary - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'product-summary',
            'state' => 'active'
        ]);

        /**
         * Save button settings - product_summary_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'product_summary_setting_group'
            ]
        ]);

        /**
         * Panel - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Panel',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Padding',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_panel_pt',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_panel_pt'],
                    'label' => 'Top',
                    'placeholder' => 'Top'
                ]),
                Field::get_text_field([
                    'name'  => 'ps_panel_pb',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_panel_pb'],
                    'label' => 'Bottom',
                    'placeholder' => 'Bottom'
                ]),
                Field::get_text_field([
                    'name'  => 'ps_panel_pl',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_panel_pl'],
                    'label' => 'Left',
                    'placeholder' => 'Left'
                ]),
                Field::get_text_field([
                    'name'  => 'ps_panel_pr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_panel_pr'],
                    'label' => 'Right',
                    'placeholder' => 'Right'
                ]),
            ]   
        ]);

        /**
         * Panel - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Name - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Name',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_name_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_name_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_name_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_name_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_name_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_name_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_color_picker_field([
            'name'  => 'ps_name_clr',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_name_clr'],
            'label' => 'Color'
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_name_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_name_mb'],
            'label' => 'Margin Bottom',
            'placeholder' => 'Margin Bottom'
        ]);

        /**
         * Product Name - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Rating - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Rating',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Label Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_rating_label_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_rating_label_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_rating_label_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_rating_label_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_rating_label_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_rating_label_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_color_picker_field([
            'name'  => 'ps_rating_label_clr',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_rating_label_clr'],
            'label' => 'Label Color',
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Star Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'ps_rating_star_clr_1',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_rating_star_clr_1'],
                    'label' => 'Primary'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_rating_star_clr_2',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_rating_star_clr_2'],
                    'label' => 'Secondary'
                ])
            ]
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_rating_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_rating_mb'],
            'label' => 'Margin Bottom',
            'placeholder' => 'Margin Bottom'
        ]);

        /**
         * Product Rating - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Price - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Price',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_price_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_price_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_price_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_price_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_price_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_price_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_color_picker_field([
            'name'  => 'ps_price_clr',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_price_clr'],
            'label' => 'Color'
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_price_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_price_mb'],
            'label' => 'Margin Bottom',
            'placeholder' => 'Margin Bottom'
        ]);

        /**
         * Product Price - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Description - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Description',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_desc_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_desc_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_desc_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_desc_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_desc_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_desc_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_color_picker_field([
            'name'  => 'ps_desc_clr',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_desc_clr'],
            'label' => 'Color'
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_desc_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_desc_mb'],
            'label' => 'Margin Bottom',
            'placeholder' => 'Margin Bottom'
        ]);

        /**
         * Product Description - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Form - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Form',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_form_var_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_form_var_mb'],
            'label' => 'Variation Margin Bottom',
            'placeholder' => 'Variation Margin Bottom'
        ]);

        echo Field::get_text_field([
            'name'  => 'ps_form_atc_mb',
            'group' => 'product_summary_setting_group',
            'value' => $settings['ps_form_atc_mb'],
            'label' => 'Add To Cart Margin Bottom',
            'placeholder' => 'Add To Cart Margin Bottom'
        ]);

        /**
         * Product Form - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Stock Status - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Stock Status',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_stst_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_stst_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_stst_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'ps_stst_ink_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_ink_clr'],
                    'label' => 'In Stock',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_stst_aob_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_aob_clr'],
                    'label' => 'Available On Backorder'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_stst_ook_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_stst_ook_clr'],
                    'label' => 'Out Of Stock',
                ])
            ]
        ]);

        /**
         * Product Stock Status - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Product Meta - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Product Meta',
            'class' => 'hd-mb-30'
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Font',
            'fields' => [
                Field::get_text_field([
                    'name'  => 'ps_meta_fs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_fs'],
                    'label' => 'Font Size',
                    'placeholder' => 'Font Size'
                ]),
                Field::get_select_field([
                    'name'  => 'ps_meta_fw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_fw'],
                    'label' => 'Font Weight',
                    'options' => Helper::get_font_weight_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_meta_lh',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_lh'],
                    'label' => 'Line Height',
                    'placeholder' => 'Line Height'
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Color',
            'fields' => [
                Field::get_color_picker_field([
                    'name'  => 'ps_meta_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_clr'],
                    'label' => 'Text Color',
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_meta_link_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_link_clr'],
                    'label' => 'Link Color'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_meta_link_hv_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_link_hv_clr'],
                    'label' => 'Link Hover & Focus Color',
                ])
            ]
        ]);

        echo Field::get_multiple_field([
            'label'  => 'Border',
            'fields' => [
                Field::get_select_field([
                    'name'  => 'ps_meta_bs',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_bs'],
                    'label' => 'Style',
                    'options' => Helper::get_border_style_choices()
                ]),
                Field::get_text_field([
                    'name'  => 'ps_meta_bw',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_bw'],
                    'label' => 'Width',
                    'placeholder' => 'Width'
                ]),
                Field::get_color_picker_field([
                    'name'  => 'ps_meta_b_clr',
                    'group' => 'product_summary_setting_group',
                    'value' => $settings['ps_meta_b_clr'],
                    'label' => 'Color',
                ])
            ]   
        ]);

        /**
         * Product Meta - Card Closing.
         */
        echo Component::get_card_closing();

        /**
         * Save button settings - product_summary_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'product_summary_setting_group'
            ]
        ]);

        /**
         * Product Summary - Tab Closing.
         */
        echo Component::get_tab_panel_closing();
    ?>

    <?php

        /**
         * Advanced - Tab Opening.
         */
        echo Component::get_tab_panel_opening([
            'id'    => 'advanced',
            'state' => 'active'
        ]);

        /**
         * Save button settings - advanced_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-mb-30 hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'advanced_setting_group'
            ]
        ]);

        /**
         * Advance - Card Opening.
         */
        echo Component::get_card_opening([
            'title' => 'Advanced Settings',
            'class' => 'hd-mb-50'
        ]);

        echo Field::get_textarea_field([
            'name'  => 'ad_stg_additional_css',
            'group' => 'advanced_setting_group',
            'value' => $settings['ad_stg_additional_css'],
            'label' => 'Addtional CSS',
            'description' => 'Add your own CSS code here to customize the appearance of quick view components at the front-end.'
        ]);

        /**
         * Advance - Card Closing.
         */
        echo Component::get_card_closing();


        /**
         * Save button settings - advanced_setting_group
         */
        echo Component::get_button([
            'type'  => 'normal',
            'class' => 'hqfw-js-save-setting-btn hd-ds-block hd-ml-auto',
            'label' => 'Save Changes',
            'attr'  => [
                'data-group-target' => 'advanced_setting_group'
            ]
        ]);

        /**
         * Advanced - Tab Closing.
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