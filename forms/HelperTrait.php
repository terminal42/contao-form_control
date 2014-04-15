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

trait HelperTrait
{
    private $arrStorage = array();

    /**
     * Override setter to enable getFormControlVars() functionality
     *
     * @param string $strKey
     * @param mixed  $varValue
     */
    public function __set($strKey, $varValue)
    {
        $this->arrStorage[$strKey] = $varValue;
        parent::__set($strKey, $varValue);
    }

    /**
     * Get storage
     *
     * @return array
     */
    public function getFormControlVars()
    {
        return $this->arrStorage;
    }

    /**
     * Dumps the storage
     */
    public function dumpFormControlVars()
    {
        echo "<pre>\n";
        var_dump($this->getFormControlVars());
        echo "</pre>\n";
    }
}