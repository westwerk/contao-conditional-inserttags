<?php

namespace Westwerk\Contao\ConditionalInsertTags;

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Westwerk GmbH & Co. KG
 *
 * @package ConditionalInserttags
 * @author  Michael Rüttgers <mr@westwerk.ac>
 * @link    http://www.westwerk.ac
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
class InsertTags
{

    protected $el = null;

    public function __construct() {
        $this->el = new \Symfony\Component\ExpressionLanguage\ExpressionLanguage();
    }


    public function replaceInserttags($tag, $blnCache, $cachedTagValue, $flags, $tags, $arrCache, &$_rit, &$_cnt)
    {

        $parts = explode('::', $tag);
        switch($parts[0]) {
            case 'if':
            case 'ifn':
                if (count($parts) > 1) {

                    // Use ExpressionLanguage vor evaluation
                    $expr = $this->el->evaluate($parts[1]);

                    if (($parts[0] === 'if' && !$expr) || ($parts[0] === 'ifn' && $expr)) {
                        for (; $_rit < $_cnt; $_rit += 3) {
                            if ($tags[$_rit + 1] == $parts[0]) {
                                break;
                            }
                        }
                    }
                }
                return false;

            default:
                break;
        }

        return false;
    }
}

?>