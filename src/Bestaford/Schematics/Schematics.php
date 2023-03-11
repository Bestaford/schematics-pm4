<?php

declare(strict_types = 1);

namespace Bestaford\Schematics;

use pocketmine\plugin\PluginBase;

class Schematics extends PluginBase {

    protected function onEnable() : void {
        $this->getLogger()->info("Started");
    }
}