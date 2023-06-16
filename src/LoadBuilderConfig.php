<?php
namespace MyNamespace\Listener;

use YOOtheme\Builder\BuilderConfig;

class LoadBuilderConfig
{
    /**
     * @param BuilderConfig $config
     */
    // Compare this function with wp-content/themes/yootheme/vendor/yootheme/builder-templates/src/Listener/LoadBuilderConfig.php:
    // Compare this function with wp-content/themes/yootheme/vendor/yootheme/builder-wordpress-source/src/Listener/LoadBuilderConfig.php
    public static function handle($config){
        //adding in template options our custom template
        $templates[] = 
            ['label' => 'My Custom Content',
                'options' => [
                    [
                        'value' => 'my_custom_content', 
                        'text' => 'My Custom Content'
                    ]
                ]
            ];
            // echo '<pre>', print_r($config['templateOptions']), '</pre>';exit;
        $config->push('templateOptions', ...$templates);
        
        //adding in templates our custom template
        $templates['my_custom_content'] = [
            'label' => 'My Custom Content',
            'group' => 'My Custom Content Group',
            'fieldset' => [
                'default' => [
                    'fields' => [
                        'custom_field' => [
                            'label' => 'Custom Field',
                            'description' => 'Custom Field Description',
                            'type' => 'text',
                            'default' => 'Custom Field Default Value',
                        ]
                    ]
                ]
            ]
        ];

        $config->merge(['templates' => $templates]);
        
    }
}