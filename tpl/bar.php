<?php
/**
 * This template adds a link to a bar.
 * Used in sidebar hooks.
 */

use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\Mibbit\Module_Mibbit;

/**
 * @var GDT_Bar $bar
 */
$bar instanceof GDT_Bar;

$link = GDT_Link::make('link_mibbit')->href(href('Mibbit', 'Chat'));

if (Module_Mibbit::instance()->getConfigValue('mibbit_fullscreen'))
{
	$link->targetBlank();
}

$bar->addField($link);
