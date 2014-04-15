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
 * Extend the tl_form_field palettes
 */
foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k => $v)
{
    if ($k == '__selector__')
    {
        continue;
    }

    $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k] = $v . ';{formcontrol_legend},formcontrol_template';
}


/**
 * Add fields to tl_form_field
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['formcontrol_template'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['formcontrol_template'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_form_control', 'getFormControlTemplates'),
    'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);


class tl_form_field_form_control extends \Backend
{

    /**
     * Return all form control templates as array
     * @return array
     */
    public function getFormControlTemplates()
    {
        return $this->getTemplateGroup('form_control_');
    }
}
