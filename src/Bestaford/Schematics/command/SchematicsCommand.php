<?php

declare(strict_types = 1);

namespace Bestaford\Schematics\command;

use Bestaford\Schematics\Schematics;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\Plugin;
use pocketmine\command\CommandSender;

class SchematicsCommand extends Command implements PluginOwned {

    private Schematics $plugin;
    private static array $positions = [];

    public function __construct(Schematics $plugin, $name, $description) {
        $this->plugin = $plugin;
        parent::__construct($name, $description);
        $this->setPermission("schematics");
        $this->setAliases(["sc"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender instanceof Player) {
            $sender->sendMessage("In-game only!");
            return;
        }
        if (count($args) == 0) {
            $this->printHelp($sender);
            return;
        }
        $subcommand = mb_strtolower(trim(array_shift($args)));
        switch ($subcommand) {
            case "pos1":
                self::$positions[$sender->getName()]["pos1"] = $sender->getPosition();
                $sender->sendMessage("Position 1 selected!");
                break;
            case "pos2":
                self::$positions[$sender->getName()]["pos2"] = $sender->getPosition();
                $sender->sendMessage("Position 2 selected!");
                break;
            case "export":
                if (count($args) == 0) {
                    $this->printHelp($sender);
                    return;
                }
                $sender->sendMessage("export");
                break;
            default:
                $this->printHelp($sender);
        }
    }

    public function printHelp(CommandSender $sender) : void {
        $sender->sendMessage("/sc pos1\n/sc pos2\n/sc export <name>");
    }

    public function getOwningPlugin() : Plugin {
        return $this->plugin;
    }
}