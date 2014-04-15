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


class FormControlFieldset extends \FormFieldset
{

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
        if (!$this->formcontrol_template || TL_MODE == 'BE')
        {
            return parent::generate();
        }

		// Only tableless forms are supported
		if (!$this->tableless)
		{
			return '';
		}

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->type = $this->fsType;
        $objTemplate->class = $this->strClass;
        $objTemplate->label = $this->label;

        return $objTemplate->parse();
	}
}
