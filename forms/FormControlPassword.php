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


class FormControlPassword extends \FormPassword
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

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->type = 'input';
        $objTemplate->name = $this->strName;
        $objTemplate->id = $this->strId;
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->attributes = $this->getAttributes();
        $objTemplate->submit = $this->addSubmit();

        return $objTemplate->parse();
	}


	/**
	 * Generate the label of the confirmation field and return it as string
	 * @return string
	 */
	public function generateConfirmationLabel()
	{
        if (!$this->formcontrol_template)
        {
            return parent::generate();
        }

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->type = 'confirmationLabel';
        $objTemplate->id = $this->strId;
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->label = sprintf($GLOBALS['TL_LANG']['MSC']['confirmation'], $this->strLabel);
        $objTemplate->mandatory = $this->mandatory;
        $objTemplate->mandatoryLabel = $GLOBALS['TL_LANG']['MSC']['mandatory'];

        return $objTemplate->parse();
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generateConfirmation()
	{
        if (!$this->formcontrol_template)
        {
            return parent::generate();
        }

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->type = 'confirmation';
        $objTemplate->name = $this->strName;
        $objTemplate->id = $this->strId;
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->attributes = $this->getAttributes();

        return $objTemplate->parse();
	}
}
