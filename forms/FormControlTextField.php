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


class FormControlTextField extends \FormTextField
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

        // Hide the Punycode format (see #2750)
        if ($this->rgxp == 'email' || $this->rgxp == 'friendly' || $this->rgxp == 'url')
        {
            $this->varValue = \Idna::decode($this->varValue);
        }

        if ($this->hideInput)
        {
            $strType = 'password';
        }
        elseif ($this->strFormat != 'xhtml')
        {
            // Use the HTML5 types (see #4138)
            // but not the date, time and datetime types (see #5918)
            switch ($this->rgxp)
            {
                case 'digit':
                    $strType = 'number';
                    break;

                case 'phone':
                    $strType = 'tel';
                    break;

                case 'email':
                    $strType = 'email';
                    break;

                case 'url':
                    $strType = 'url';
                    break;

                default:
                    $strType = 'text';
                    break;
            }
        }
        else
        {
            $strType = 'text';
        }

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->name = $this->strName;
        $objTemplate->id = $this->strId;
        $objTemplate->value = specialchars($this->varValue);
        $objTemplate->class = ($this->hideInput ? ' password' : '') . (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->type = $strType;
        $objTemplate->attributes = $this->getAttributes();
        $objTemplate->submit = $this->addSubmit();

        return $objTemplate->parse();
    }
}
