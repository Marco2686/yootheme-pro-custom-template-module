<?php
// File: bootstrap.php

namespace MyNamespace;

use YOOtheme\Builder\BuilderConfig;

include_once __DIR__ . '/src/LoadBuilderConfig.php';
include_once __DIR__ . '/src/TemplateMatch.php';


return [

    'events' => [
        'builder.template' => [Listener\TemplateMatch::class => 'matchTemplate'],
        BuilderConfig::class => [Listener\LoadBuilderConfig::class => ['handle', -20]],
        

    ],

];
