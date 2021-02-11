<?php
namespace GDO\Mibbit\Method;

use GDO\UI\MethodPage;
use GDO\DB\GDT_Checkbox;
use GDO\Mibbit\Module_Mibbit;

/**
 * Render Chat page.
 * @author gizmore
 * @version 6.10
 * @since 3.00
 */
final class Chat extends MethodPage
{
	public function gdoParameters()
	{
		return [
			GDT_Checkbox::make('fullscreen')->initial(Module_Mibbit::instance()->getConfigVar('mibbit_fullscreen')),
		];
	}
	
	public function getTitle()
	{
	    return t('btn_mibbit');
	}
	
}
