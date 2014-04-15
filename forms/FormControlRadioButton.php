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


class FormControlRadioButton extends \FormRadioButton
{

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

            // Generate options
            foreach ($this->arrOptions as $i => $arrOption)
            {
                $arrOptions[] = array
                (
                    'name' => $this->strName . ((count($this->arrOptions) > 1) ? '[]' : ''),
                    'id' => $this->strId.'_'.$i,
                    'value' => $arrOption['value'],
                    'checked' => $this->isChecked($arrOption),
                    'attributes' => $this->getAttributes(),
                    'label' => $arrOption['label'],
                    'label_id' => $this->strId.'_'.$i,
                    'label_for' => $this->strId.'_'.$i,
                );
            }

            $this->options = $arrOptions;
        }

        return parent::parse($arrAttributes);
    }
}