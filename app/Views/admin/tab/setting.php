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
echo Component::get_tab_navigation([
    'class' => 'hd-mb-30',
    'tabs'  => [
        [
            'title' => __( 'General', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#general'
        ],
        [
            'title' => __( 'Quick View Button', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#quick-view-button'
        ],
        [
            'title' => __( 'Modal', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#modal'
        ],
        [
            'title' => __( 'Product Thumbnail', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#product-thumbnail'
        ],
        [
            'title' => __( 'Product Summary', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#product-summary'
        ],
        [
            'title' => __( 'Advanced', HQFW_PLUGIN_DOMAIN ),
            'panel' => '#advanced'
        ]
    ]
]);

/**
 * General Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'general',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'general_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'General', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Quick View', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_enable',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_enable'],
                            'description' => __( 'Enable this option to activate handy quick view functionalities in the front-end.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Quick View Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'block',
                    'fields' => [
                        Field::get_note_field([
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', HQFW_PLUGIN_DOMAIN ),
                            'content' => __( 'You can manually use or add a quick view button by using the shortcode <code>[handy-quick-view-button id="product_id"]</code>. Note do not forget to provide the product id.', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Button Position', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'gn_qv_btn_position',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_qv_btn_position'],
                            'description' => __( 'Select the quick view button position in the product loop thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'options' => [
                                [
                                    'value' => 1,
                                    'label' => __( 'Before Add To Cart Button', HQFW_PLUGIN_DOMAIN )
                                ],
                                [
                                    'value' => 2,
                                    'label' => __( 'After Add To Cart Button', HQFW_PLUGIN_DOMAIN )
                                ],
                                [
                                    'value' => 3,
                                    'label' => __( 'Manually Position Using Shortcode', HQFW_PLUGIN_DOMAIN )
                                ]
                            ]
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Modal', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Product Slider', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_md_enable_slider',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_md_enable_slider'],
                            'description' => __( 'Enable this option to use a slider option on the quick view product to easily navigate or preview the previous and next product without closing the modal.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Close Button', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_md_show_close_btn',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_md_show_close_btn'],
                            'description' => __( 'Show this to display the close button in the modal.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Thumbnail', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Slider', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_enable_slider',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_slider'],
                            'description' => __( 'Enable this option to use the image slider feature in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Zoom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_enable_zoom',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_zoom'],
                            'description' => __( 'Enable this option to zoom-in the image when hovered or focused in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Image Lightbox', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_enable_lightbox',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_enable_lightbox'],
                            'description' => __( 'Enable this option to use image lightbox feature in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Image Collections', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_show_collection',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_collection'],
                            'description' => __( 'Show this to display the image collection or gallery shortcut in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Slider Bullets', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_show_bullet',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_bullet'],
                            'description' => __( 'Show this to display the slider bullets shortcut in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Flash Sale Badge', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_pt_show_flash_sale',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_pt_show_flash_sale'],
                            'description' => __( 'Show this to display product flash sale badge in the product thumbnail.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Summary', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Title', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_title',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_title'],
                            'description' => __( 'Show this to display product title in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Rating', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_rating',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_rating'],
                            'description' => __( 'Show this to display product rating in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Price', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_price',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_price'],
                            'description' => __( 'Show this to display product price in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Excerpt', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_exerpt',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_exerpt'],
                            'description' => __( 'Show this to display product excerpt in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Add To Cart Button', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_add_to_cart',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_add_to_cart'],
                            'description' => __( 'Show this to display product add to cart button in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Show Product Meta', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'gn_ps_show_meta',
                            'group' => 'general_setting_group',
                            'value' => $settings['gn_ps_show_meta'],
                            'description' => __( 'Show this to display product meta in the product summary.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Show', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Hide', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'general_setting_group'
            ]
        ])
    ]
]);

/**
 * Quick View Button Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'quick-view-button',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'quick_view_button_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'block',
                    'fields' => [
                        Field::get_note_field([
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', HQFW_PLUGIN_DOMAIN ),
                            'content' => __( 'You can manually use or add a quick view button by using the shortcode <code>[handy-quick-view-button id="product_id"]</code>. Note do not forget to provide the product id.', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'qv_btn_style',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_style'],
                            'description' => __( 'Select your preferred button style.', HQFW_PLUGIN_DOMAIN ),
                            'options' => [
                                [
                                    'value' => 'text',
                                    'label' => __( 'Text', HQFW_PLUGIN_DOMAIN )
                                ],
                                [
                                    'value' => 'icon',
                                    'label' => __( 'Icon', HQFW_PLUGIN_DOMAIN )
                                ],
                                [
                                    'value' => 'text-icon',
                                    'label' => __( 'Text & Icon', HQFW_PLUGIN_DOMAIN )
                                ]
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_icon_picker_field([
                            'name'  => 'qv_btn_icon',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon'],
                            'description' => __( 'Select your preferred icon to use in button.', HQFW_PLUGIN_DOMAIN ),
                            'icons' => [
                                'bs-eye', 'bs-eye-fill', 'bs-search',
                                'bs-expand', 'bs-fullscreen', 'bs-arrow-fullscreen'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon Properties', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'qv_btn_icon_wd',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_icon_ht',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_icon_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_icon_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Label', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'qv_btn_text',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_text'],
                            'placeholder' => __( 'Label', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'qv_btn_fs',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'qv_btn_fw',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'qv_btn_wd',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_ht',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_bg_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_bg_hv_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Padding', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'qv_btn_pt',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pt'],
                            'label' => __( 'Top', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Top', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_pb',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pb'],
                            'label' => __( 'Bottom', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Bottom', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_pl',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pl'],
                            'label' => __( 'Left', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Left', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_pr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_pr'],
                            'label' => __( 'Right', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Right', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'qv_btn_bs',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_bw',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'qv_btn_b_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                         Field::get_color_picker_field([
                            'name'  => 'qv_btn_hv_b_clr',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_text_field([
                            'name'  => 'qv_btn_br',
                            'group' => 'quick_view_button_setting_group',
                            'value' => $settings['qv_btn_br'],
                            'label' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ]),
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'quick_view_button_setting_group'
            ]
        ])
    ]
]);

/**
 * Modal Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'modal',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'modal_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Modal', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'md_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_bg_clr'],
                            'label' => __( 'Panel', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_overlay_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_overlay_bg_clr'],
                            'label' => __( 'Overlay', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_br'],
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Close Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_close_btn_icon_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_close_btn_icon_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_close_btn_icon_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_close_btn_icon_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_close_btn_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_close_btn_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'md_close_btn_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_close_btn_bg_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'md_close_btn_bs',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_close_btn_bw',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_close_btn_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                         Field::get_color_picker_field([
                            'name'  => 'md_close_btn_hv_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_close_btn_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_close_btn_br'],
                            'label' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Slider Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Previous Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_icon_picker_field([
                            'name'  => 'md_sldr_btn_icon_prev',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_prev'],
                            'description' => __( 'Select your preferred icon to use in the previous product slider button.', HQFW_PLUGIN_DOMAIN ),
                            'icons' => [
                                'bs-chevron-left', 'bs-arrow-left', 'bs-arrow-left-circle', 'bs-arrow-left-circle-fill', 
                                'bs-arrow-left-square', 'bs-arrow-left-square-fill', 'bs-caret-left', 'bs-caret-left-fill'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Next Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_icon_picker_field([
                            'name'  => 'md_sldr_btn_icon_next',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_next'],
                            'description' => __( 'Select your preferred icon to use in the next product slider button.', HQFW_PLUGIN_DOMAIN ),
                            'icons' => [
                                'bs-chevron-right', 'bs-arrow-right', 'bs-arrow-right-circle', 'bs-arrow-right-circle-fill', 
                                'bs-arrow-right-square', 'bs-arrow-right-square-fill', 'bs-caret-right', 'bs-caret-right-fill'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_icon_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_icon_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_icon_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_icon_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_bg_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_bg_hv_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'md_sldr_btn_bs',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_bw',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                         Field::get_color_picker_field([
                            'name'  => 'md_sldr_btn_hv_b_clr',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_sldr_btn_br',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_sldr_btn_br'],
                            'label' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Loader', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Select Loader Style', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_loader_picker_field([
                            'name'  => 'md_loader_style',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_style'],
                            'description' => __( 'Select your preferred loader style to use in the modal.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'spinner-1', 'spinner-2', 'spinner-3',
                                'spinner-4', 'spinner-5', 'spinner-6',
                                'spinner-7', 'spinner-8', 'spinner-9',
                                'pulse-1', 'pulse-2', 'pulse-3', 'pulse-4'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'md_loader_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_loader_ht',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'md_loader_stroke_wd',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_stroke_wd'],
                            'label' => __( 'Stroke Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Stroke Width', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'md_loader_clr_1',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_clr_1'],
                            'label' => __( 'Primary Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'md_loader_clr_2',
                            'group' => 'modal_setting_group',
                            'value' => $settings['md_loader_clr_2'],
                            'label' => __( 'Secondary Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'modal_setting_group'
            ]
        ]),
    ]
]);

/**
 * Product Thumbnail Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'product-thumbnail',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'product_thumbnail_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Panel', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Padding', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_panel_pt',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pt'],
                            'label' => __( 'Top', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Top', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_panel_pb',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pb'],
                            'label' => __( 'Bottom', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Bottom', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_panel_pl',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pl'],
                            'label' => __( 'Left', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Left', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_panel_pr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_panel_pr'],
                            'label' => __( 'Right', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Right', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Image Slider Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Previous Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_icon_picker_field([
                            'name'  => 'pt_sldr_btn_icon_prev',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_prev'],
                            'description' => __( 'Select your preferred icon to use in the previous image slider button.', HQFW_PLUGIN_DOMAIN ),
                            'icons' => [
                                'bs-chevron-left', 'bs-arrow-left', 'bs-arrow-left-circle', 'bs-arrow-left-circle-fill', 
                                'bs-arrow-left-square', 'bs-arrow-left-square-fill', 'bs-caret-left', 'bs-caret-left-fill'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Next Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_icon_picker_field([
                            'name'  => 'pt_sldr_btn_icon_next',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_next'],
                            'description' => __( 'Select your preferred icon to use in the next image slider button.', HQFW_PLUGIN_DOMAIN ),
                            'icons' => [
                                'bs-chevron-right', 'bs-arrow-right', 'bs-arrow-right-circle', 'bs-arrow-right-circle-fill', 
                                'bs-arrow-right-square', 'bs-arrow-right-square-fill', 'bs-caret-right', 'bs-caret-right-fill'
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_icon_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_icon_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_icon_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_icon_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_bg_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'pt_sldr_btn_bs',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_bw',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                         Field::get_color_picker_field([
                            'name'  => 'pt_sldr_btn_hv_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_sldr_btn_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_sldr_btn_br'],
                            'label' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Zoom Button', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Icon', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_icon_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_icon_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_icon_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_icon_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_icon_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_bg_hv_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bg_hv_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'pt_zoom_btn_bs',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_bw',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                         Field::get_color_picker_field([
                            'name'  => 'pt_zoom_btn_hv_b_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_hv_b_clr'],
                            'label' => __( 'Hover & Focus Color', HQFW_PLUGIN_DOMAIN ),
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_zoom_btn_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_zoom_btn_br'],
                            'label' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Slider Bullets Shortcut', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Size', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_bul_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_wd'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'pt_bul_ht',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_ht'],
                            'label' => __( 'Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Background Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'pt_bul_bg_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_bg_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'pt_bul_bg_ac_clr',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_bg_ac_clr'],
                            'label' => __( 'Hover & Active Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Gap', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_bul_gap',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_gap'],
                            'placeholder' => __( 'Gap', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_bul_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_bul_br'],
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Image Collections Shortcut', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Maximum Width', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_col_mx_wd',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_mx_wd'],
                            'placeholder' => __( 'Maximum Width', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Gap', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_col_gap',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_gap'],
                            'placeholder' => __( 'Gap', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border Radius', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'pt_col_br',
                            'group' => 'product_thumbnail_setting_group',
                            'value' => $settings['pt_col_br'],
                            'placeholder' => __( 'Border Radius', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'product_thumbnail_setting_group'
            ]
        ]),
    ]
]);

/**
 * Product Summary Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'product-summary',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'product_summary_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Panel', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Padding', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_panel_pt',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pt'],
                            'label' => __( 'Top', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Top', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_panel_pb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pb'],
                            'label' => __( 'Bottom', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Bottom', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_panel_pl',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pl'],
                            'label' => __( 'Left', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Left', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_panel_pr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_panel_pr'],
                            'label' => __( 'Right', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Right', HQFW_PLUGIN_DOMAIN )
                        ]),
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Name', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_name_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_name_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_name_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_name_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_clr'],
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_name_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_name_mb'],
                            'placeholder' => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Rating', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Label Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_rating_label_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_rating_label_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_rating_label_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Label Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_rating_label_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_label_clr'],
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Star Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_rating_star_clr_1',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_star_clr_1'],
                            'label' => __( 'Primary', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_rating_star_clr_2',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_star_clr_2'],
                            'label' => __( 'Secondary', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_rating_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_rating_mb'],
                            'placeholder' => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Price', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_price_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_price_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_price_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_price_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_clr'],
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_price_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_price_mb'],
                            'placeholder' => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Description', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_desc_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_desc_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_desc_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_desc_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_clr']
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_desc_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_desc_mb'],
                            'placeholder' => __( 'Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Form', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Variation Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_form_var_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_form_var_mb'],
                            'placeholder' => __( 'Variation Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Add To Cart Margin Bottom', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_form_atc_mb',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_form_atc_mb'],
                            'placeholder' => __( 'Add To Cart Margin Bottom', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Stock Status', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_stst_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_stst_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_stst_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Text Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_stst_ink_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_ink_clr'],
                            'label' => __( 'In Stock', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_stst_aob_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_aob_clr'],
                            'label' => __( 'Available On Backorder', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_stst_ook_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_stst_ook_clr'],
                            'label' => __( 'Out Of Stock', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ])
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Product Meta', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Font', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_text_field([
                            'name'  => 'ps_meta_fs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_fs'],
                            'label' => __( 'Font Size', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Font Size', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_select_field([
                            'name'  => 'ps_meta_fw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_fw'],
                            'label' => __( 'Font Weight', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_font_weight_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_meta_lh',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_lh'],
                            'label' => __( 'Line Height', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Line Height', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Color', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_color_picker_field([
                            'name'  => 'ps_meta_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_clr'],
                            'label' => __( 'Text Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_meta_link_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_link_clr'],
                            'label' => __( 'Link Color', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_meta_link_hv_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_link_hv_clr'],
                            'label' => __( 'Link Hover & Focus Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Border', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_select_field([
                            'name'  => 'ps_meta_bs',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_bs'],
                            'label' => __( 'Style', HQFW_PLUGIN_DOMAIN ),
                            'options' => Helper::get_border_style_choices()
                        ]),
                        Field::get_text_field([
                            'name'  => 'ps_meta_bw',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_bw'],
                            'label' => __( 'Width', HQFW_PLUGIN_DOMAIN ),
                            'placeholder' => __( 'Width', HQFW_PLUGIN_DOMAIN )
                        ]),
                        Field::get_color_picker_field([
                            'name'  => 'ps_meta_b_clr',
                            'group' => 'product_summary_setting_group',
                            'value' => $settings['ps_meta_b_clr'],
                            'label' => __( 'Color', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'product_summary_setting_group'
            ]
        ]),
    ]
]);

/**
 * Advanced Tab Panel
 */
echo Component::get_tab_panel([
    'id'         => 'advanced',
    'class'      => 'hd-mb-50',
    'state'      => 'default',
    'components' => [
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'advanced_setting_group'
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Optimization', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'block',
                    'fields' => [
                        Field::get_note_field([
                            'icon'    => true,
                            'type'    => 'message',
                            'title'   => __( 'Instruction', HQFW_PLUGIN_DOMAIN ),
                            'content' => __( 'Note that all settings here are used to enhance the performance of this plugin on the front-end side. This can improve your speed score in services like Pingdom, GTmetrix and PageSpeed.', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Caching', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'ad_opt_enable_cache',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_cache'],
                            'description' => __( 'Enable this option to cache the external style and script files so that they can be accessed more quickly.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable CSS & JS Minification', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'ad_opt_enable_minify',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_minify'],
                            'description' => __( 'Enable this option to minify the internal and external style and script files to reduce load times and bandwidth.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Enable Deffered JS', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_switch_field([
                            'name'  => 'ad_opt_enable_defer',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_opt_enable_defer'],
                            'description' => __( 'Enable this option to defer external scripts so they will be downloaded in parallel to the parsing page and executed after page is finished parsing.', HQFW_PLUGIN_DOMAIN ),
                            'choices' => [
                                'on'  => __( 'Enabled', HQFW_PLUGIN_DOMAIN ),
                                'off' => __( 'Disabled', HQFW_PLUGIN_DOMAIN )
                            ]
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_card([
            'title'      => __( 'Additional', HQFW_PLUGIN_DOMAIN ),
            'class'      => 'hd-mb-30',
            'components' => [
                Component::get_row([
                    'type'   => 'grid',
                    'label'  => __( 'Custom CSS', HQFW_PLUGIN_DOMAIN ),
                    'fields' => [
                        Field::get_textarea_field([
                            'name'  => 'ad_add_custom_css',
                            'group' => 'advanced_setting_group',
                            'value' => $settings['ad_add_custom_css'],
                            'description' => __( 'Add your own CSS code here to customize the appearance of quick view components at the front-end.', HQFW_PLUGIN_DOMAIN )
                        ])
                    ]
                ]),
            ]
        ]),
        Component::get_button([
            'class' => 'hd-save-setting-btn',
            'label' => __( 'Save Changes', HQFW_PLUGIN_DOMAIN ),
            'attr'  => [
                'data-group-target' => 'advanced_setting_group'
            ]
        ]),
    ]
]);

/**
 * Placeholder.
 */
echo Component::get_placeholder();

/**
 * Footer.
 */
echo Component::get_footer(); 