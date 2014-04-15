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
 * Register the namespace
 */
ClassLoader::addNamespace('FormControl');


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    'FormControl\FormControlHelperTrait'    => 'system/modules/form_control/forms/FormControlHelperTrait.php',
    'FormControl\FormControlCaptcha'        => 'system/modules/form_control/forms/FormControlCaptcha.php',
    'FormControl\FormControlCheckBox'       => 'system/modules/form_control/forms/FormControlCheckBox.php',
    'FormControl\FormControlFieldset'       => 'system/modules/form_control/forms/FormControlFieldset.php',
    'FormControl\FormControlFileUpload'     => 'system/modules/form_control/forms/FormControlFileUpload.php',
    'FormControl\FormControlHidden'         => 'system/modules/form_control/forms/FormControlHidden.php',
    'FormControl\FormControlPassword'       => 'system/modules/form_control/forms/FormControlPassword.php',
    'FormControl\FormControlRadioButton'    => 'system/modules/form_control/forms/FormControlRadioButton.php',
    'FormControl\FormControlSelectMenu'     => 'system/modules/form_control/forms/FormControlSelectMenu.php',
    'FormControl\FormControlSubmit'         => 'system/modules/form_control/forms/FormControlSubmit.php',
    'FormControl\FormControlTextArea'       => 'system/modules/form_control/forms/FormControlTextArea.php',
    'FormControl\FormControlTextField'      => 'system/modules/form_control/forms/FormControlTextField.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'form_control_captcha'  => 'system/modules/form_control/templates/form_control',
    'form_control_checkbox' => 'system/modules/form_control/templates/form_control',
    'form_control_fieldset' => 'system/modules/form_control/templates/form_control',
    'form_control_upload'   => 'system/modules/form_control/templates/form_control',
    'form_control_hidden'   => 'system/modules/form_control/templates/form_control',
    'form_control_password' => 'system/modules/form_control/templates/form_control',
    'form_control_radio'    => 'system/modules/form_control/templates/form_control',
    'form_control_select'   => 'system/modules/form_control/templates/form_control',
    'form_control_submit'   => 'system/modules/form_control/templates/form_control',
    'form_control_textarea' => 'system/modules/form_control/templates/form_control',
    'form_control_text'     => 'system/modules/form_control/templates/form_control',
));
