<?php
namespace GDO\Mibbit\Method;

use GDO\UI\MethodPage;
use GDO\DB\GDT_Checkbox;
use GDO\Mibbit\Module_Mibbit;

/**
 * Render Chat page
 * @author gizmore
 */
final class Chat extends MethodPage
{
	public function gdoParameters()
	{
		return array(
			GDT_Checkbox::make('fullscreen')->initial(Module_Mibbit::instance()->getConfigVar('mibbit_fullscreen')),
		);
	}
	
}
