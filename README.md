# yootheme-pro-custom-template-module
A module for YOOtheme pro that add custom template.
It add a custom template that match custom rule in YOOtheme pro for Wordpress.

## Install
This module can be added using a child-theme. Installation step by step:
- Be sure you have created and activated a child theme in Wordpress for YOOtheme Pro.
- Download and unzip this repositories.
- Create a modules directory in the child theme (if you didn't already created) and copy the entirely download repository inside it
- Create a config.php in the root directory of your child theme ( if you didn't already created) with the following content
```
<?php

$app->load(__DIR__ . '/modules/*/bootstrap.php');

return [];
```
- Open Wordpress customizer and go in YOOtheme templates section and you can use the new templates added by this module

** Remember to change the match conditions for your purpose in TemplateMatch.php **

Thanks to Jan from YOOtheme pro staff on discord for the helpfull information.
