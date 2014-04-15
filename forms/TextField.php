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


class TextField extends \FormTextField
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

            // Hide the Punycode format (see #2750)
            if ($this->rgxp == 'email' || $this->rgxp == 'friendly' || $this->rgxp == 'url') {
                $this->varValue = \Idna::decode($this->varValue);
            }

            if ($this->hideInput) {
                $strType = 'password';
            } elseif ($this->strFormat != 'xhtml') {
                // Use the HTML5 types (see #4138)
                // but not the date, time and datetime types (see #5918)
                switch ($this->rgxp) {
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
            } else {
                $strType = 'text';
            }

            $this->type = $strType;
        }

        return parent::parse($arrAttributes);
    }
}
