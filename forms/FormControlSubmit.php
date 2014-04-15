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
     * Parse the template file and return it as string
     * @param array
     * @return string
     */
    public function parse($arrAttributes=null)
    {
        if ($this->formcontrol_template)
        {
            $this->strTemplate = $this->formcontrol_template;
            $this->type = 'regular';

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
                    $this->type = 'image';
                    $this->src = $objModel->path;
    			}
    		}
        }

        return parent::parse($arrAttributes);
    }
}
