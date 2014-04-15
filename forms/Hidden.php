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


class Hidden extends \FormHidden
{
    use HelperTrait;

    /**
     * Parse the template file and return it as string
     * @param array
     * @return string
     */
    public function parse($arrAttributes = null)
    {
        if ($this->formcontrol_template) {
            $this->strTemplate = $this->formcontrol_template;
        }

        return parent::parse($arrAttributes);
    }
}
