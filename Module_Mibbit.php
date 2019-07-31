<?php
namespace GDO\Mibbit;

use GDO\Core\GDO_Module;
use GDO\DB\GDT_String;
use GDO\Net\GDT_Hostname;
use GDO\Net\GDT_Port;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Bar;
use GDO\Core\GDT_Template;
use GDO\DB\GDT_UInt;

/**
 * Add IRC chat to your website via Mibbit IRC proxy.
 * 
 * @see GDT_MibbitChat
 * 
 * @author gizmore
 * @since 6.10
 * @version 6.10
 */
final class Module_Mibbit extends GDO_Module
{
	##############
	### Module ###
	##############
	public function onLoadLanguage() { return $this->loadLanguage('lang/mibbit'); }
	
	public function getConfig()
	{
		return array(
			GDT_Hostname::make('mibbit_host')->notNull()->initial('irc.gizmore.org'),
			GDT_Port::make('mibbit_port')->notNull()->initial('6667'),
			GDT_Checkbox::make('mibbit_tls')->initial('0'),
			GDT_String::make('mibbit_channel')->utf8()->max(128)->pattern("/^[&#]\\S+$/D")->initial("#gdo6"), # could be an IRC dependency but meh
			GDT_String::make('mibbit_nickname')->ascii()->initial(GWF_SITENAME)->max(32),
			GDT_UInt::make('mibbit_nick_counter')->initial('1'),
			GDT_Checkbox::make('mibbit_fullscreen')->initial('1'),
		);
	}
	
	public function cfgNextNickname()
	{
		$count = $this->getConfigVar('mibbit_nick_counter');
		$nickname = $this->getConfigVar('mibbit_nickname') . '_' . $count;
		$count++;
		$this->saveConfigVar('mibbit_nick_counter', $count);
		return $nickname;
	}
	
	#############
	### Hooks ###
	#############
	/**
	 * Add chat to left bar
	 */
	public function hookLeftBar(GDT_Bar $bar) { GDT_Template::php('Mibbit', 'bar.php', ['bar' => $bar]); }
	
}
