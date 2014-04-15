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


class FormControlTextArea extends \FormTextArea
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

        global $objPage;
        $arrStrip = array();

        // XHTML does not support maxlength
        if ($objPage->outputFormat == 'xhtml')
        {
            $arrStrip[] = 'maxlength';
        }

        $objTemplate = new \FrontendTemplate($this->formcontrol_template);
        $objTemplate->attributesRaw = $this->arrAttributes;
        $objTemplate->configuration = $this->arrConfiguration;
        $objTemplate->name = $this->strName;
        $objTemplate->id = $this->strId;
        $objTemplate->value = specialchars(str_replace('\n', "\n", $this->varValue));
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->rows = $this->intRows;
        $objTemplate->cols = $this->intCols;
        $objTemplate->attributes = $this->getAttributes($arrStrip);
        $objTemplate->submit = $this->addSubmit();

        return $objTemplate->parse();
    }
}
