<?php

/**
 * form_control extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2014, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-form_control
 */

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    'FormControl\HelperTrait'    => 'system/modules/form_control/forms/HelperTrait.php',
    'FormControl\Captcha'        => 'system/modules/form_control/forms/Captcha.php',
    'FormControl\CheckBox'       => 'system/modules/form_control/forms/CheckBox.php',
    'FormControl\Fieldset'       => 'system/modules/form_control/forms/Fieldset.php',
    'FormControl\FileUpload'     => 'system/modules/form_control/forms/FileUpload.php',
    'FormControl\Hidden'         => 'system/modules/form_control/forms/Hidden.php',
    'FormControl\Password'       => 'system/modules/form_control/forms/Password.php',
    'FormControl\RadioButton'    => 'system/modules/form_control/forms/RadioButton.php',
    'FormControl\SelectMenu'     => 'system/modules/form_control/forms/SelectMenu.php',
    'FormControl\Submit'         => 'system/modules/form_control/forms/Submit.php',
    'FormControl\TextArea'       => 'system/modules/form_control/forms/TextArea.php',
    'FormControl\TextField'      => 'system/modules/form_control/forms/TextField.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'form_control_captcha_default'  => 'system/modules/form_control/templates',
    'form_control_checkbox_default' => 'system/modules/form_control/templates',
    'form_control_fieldset_default' => 'system/modules/form_control/templates',
    'form_control_upload_default'   => 'system/modules/form_control/templates',
    'form_control_hidden_default'   => 'system/modules/form_control/templates',
    'form_control_password_default' => 'system/modules/form_control/templates',
    'form_control_radio_default'    => 'system/modules/form_control/templates',
    'form_control_select_default'   => 'system/modules/form_control/templates',
    'form_control_submit_default'   => 'system/modules/form_control/templates',
    'form_control_textarea_default' => 'system/modules/form_control/templates',
    'form_control_text_default'     => 'system/modules/form_control/templates',
));
