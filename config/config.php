<?php

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

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Westwerk\\Contao\\ConditionalInsertTags\\InsertTags', 'replaceInsertTags');
