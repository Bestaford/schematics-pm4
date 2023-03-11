<?php

declare(strict_types = 1);

namespace Bestaford\Schematics\command;

use Bestaford\Schematics\Schematics;
use pocketmine\command\Command;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\Plugin;
use pocketmine\command\CommandSender;

class SchematicsCommand extends Command implements PluginOwned {

    private Schematics $plugin;

    public function __construct(Schematics $plugin, $name, $description) {
        $this->plugin = $plugin;
        parent::__construct($name, $description);
        $this->setPermission("schematics");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $sender->sendMessage("qwe");
    }

    public function getOwningPlugin() : Plugin {
        return $this->plugin;
    }
}