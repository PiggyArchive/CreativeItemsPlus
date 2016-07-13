<?php
namespace CreativeItemsPlus;

use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {
    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        if($this->getConfig()->get("full-customization")) {
            Item::clearCreativeItems();
        }
        foreach($this->getConfig()->get("items-removed") as $item => $damagevalue) {
            Item::removeCreativeItem(Item::get($item, $damagevalue));
        }
        foreach($this->getConfig()->get("items-added") as $item => $damagevalue) {
            Item::addCreativeItem(Item::get($item, $damagevalue));
        }
        $this->getLogger()->info("§aEnabled.");
    }

}
