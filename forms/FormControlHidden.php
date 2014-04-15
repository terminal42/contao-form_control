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


class FormControlHidden extends \FormHidden
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
        $objTemplate->name = $this->strName;
        $objTemplate->value = specialchars($this->varValue);

        return $objTemplate->parse();
	}
}
