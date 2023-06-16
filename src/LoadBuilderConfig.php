<?php
namespace MyNamespace\Listener;

use YOOtheme\Builder\BuilderConfig;

class LoadBuilderConfig
{
    /**
     * @param BuilderConfig $config
     */
    // Compare this function from wp-content/themes/yootheme/vendor/yootheme/builder-templates/src/Listener/LoadBuilderConfig.php:
    public static function handle($config): void
    {
       
        $groups = [];
        $singles = [];
        $templates = [];

        //push my custom content finally 
        // echo '<pre>', print_r($config['templates'] ?? []), '</pre>';exit;
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
    }
}
// Check  wp-content/themes/yootheme/vendor/yootheme/builder-templates/src/TemplateController.php: