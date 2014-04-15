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


class FormControlSubmit extends \FormSubmit
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
        $objTemplate->type = 'regular';
        $objTemplate->id = $this->strId;
        $objTemplate->class = (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->value = specialchars($this->slabel);
        $objTemplate->attributes = $this->getAttributes($arrStrip);

        // Image button
		if ($this->imageSubmit && $this->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($this->singleSRC);

			if ($objModel === null)
			{
				if (!\Validator::isUuid($this->singleSRC))
				{
					return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
				}
			}
			elseif (is_file(TL_ROOT . '/' . $objModel->path))
			{
                $objTemplate->type = 'image';
                $objTemplate->src = $objModel->path;
                $objTemplate->title = specialchars($this->slabel);
                $objTemplate->alt = specialchars($this->slabel);
			}
		}

        return $objTemplate->parse();
	}
}
