<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

// Config
use Virtuoso\Config\ThemeConfig;

// Components
use Virtuoso\Lib\Components\Customizer\Customizer;

// Functions
use Virtuoso\Lib\Functions\Formatting;
use Virtuoso\Lib\Functions\EnqueueAssets;
use Virtuoso\Lib\Functions\Markup;

// Structure
use Virtuoso\Lib\Structure\Menu;
use Virtuoso\Lib\Structure\Header;
use Virtuoso\Lib\Structure\SideBar;
use Virtuoso\Lib\Structure\Comments;
use Virtuoso\Lib\Structure\Archive;
use Virtuoso\Lib\Structure\Footer;

final class VirtuosoThemeTest extends TestCase {

	public function testThemeConfigurationParameters() {
		$virtuoso = new Virtuoso\Lib\VirtuosoTheme();
	}


}