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


class FormControlCheckBox extends \FormCheckBox
{

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
        if (!$this->formcontrol_template)
        {
            return parent::generate();
        }

		// The "required" attribute only makes sense for single checkboxes
		if (count($this->arrOptions) == 1 && $this->mandatory)
		{
			$this->arrAttributes['required'] = 'required';
		}

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->name = $this->strName;
        $objTemplate->id = $this->strId;
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->label = $this->strLabel;
        $objTemplate->mandatory = $this->mandatory;
        $objTemplate->mandatoryLabel = $GLOBALS['TL_LANG']['MSC']['mandatory'];
        $objTemplate->error = $this->strError;
        $objTemplate->submit = $this->addSubmit();
        $arrOptions = array();

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

        $objTemplate->options = $arrOptions;
        $objTemplate->optionsRaw = $this->arrOptions;
        return $objTemplate->parse();
	}
}
