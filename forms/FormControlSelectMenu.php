<?php

/**
 * form_control extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2014, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-form_control
 */

namespace FormControl;


class FormControlSelectMenu extends \FormSelectMenu
{
    use FormControlHelperTrait;

    /**
     * Parse the template file and return it as string
     * @param array
     * @return string
     */
    public function parse($arrAttributes=null)
    {
        if ($this->formcontrol_template)
        {
            $this->strTemplate = $this->formcontrol_template;
            $strClass = 'select';
            $blnHasGroups = false;

            if ($this->multiple)
            {
                $this->strName .= '[]';
                $strClass = 'multiselect';
            }

            // Make sure there are no multiple options in single mode
            elseif (is_array($this->varValue))
            {
                $this->varValue = $this->varValue[0];
            }

            // Add empty option (XHTML) if there are none
            if (empty($this->arrOptions))
            {
                $this->arrOptions = array(array('value'=>'', 'label'=>'-'));
            }

            // Chosen
            if ($this->chosen)
            {
                $strClass .= ' tl_chosen';
            }

            $this->class = $strClass . (strlen($this->strClass) ? ' ' . $this->strClass : '');
            $arrOptions = array();

            // Generate options
            foreach ($this->arrOptions as $arrOption)
            {
                if ($arrOption['group'])
                {
                    if ($blnHasGroups)
                    {
                        $arrOptions[] = array
                        (
                            'type' => 'group_end'
                        );
                    }

                    $arrOptions[] = array
                    (
                        'type' => 'group_start',
                        'label' => specialchars($arrOption['label'])
                    );

                    $blnHasGroups = true;
                    continue;
                }

                $arrOptions[] = array
                (
                    'type' => 'option',
                    'value' => $arrOption['value'],
                    'selected' => $this->isSelected($arrOption),
                    'label' => $arrOption['label'],
                );
            }

            if ($blnHasGroups)
            {
                $arrOptions[] = array
                (
                    'type' => 'group_end'
                );
            }

            $this->options = $arrOptions;
        }

        return parent::parse($arrAttributes);
    }
}
