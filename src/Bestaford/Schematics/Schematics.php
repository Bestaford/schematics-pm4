<?php

declare(strict_types = 1);

namespace Bestaford\Schematics;

use Bestaford\Schematics\command\SchematicsCommand;
use pocketmine\plugin\PluginBase;

class Schematics extends PluginBase {

    protected function onEnable() : void {
        $this->getServer()->getCommandMap()->register("schematics", new SchematicsCommand($this, "sc", "Schematics"));
    }
}