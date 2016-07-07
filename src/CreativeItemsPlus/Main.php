<?php

namespace CreativeItemsPlus;

use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->creativeitems = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            "full-customization" => false,
            "items-added" => array(),
            "items-removed" => array()
        ));
        if($this->creativeitems->get("full-customization")){
            Item::clearCreativeItems();
        }
        foreach($this->creativeitems->get("items-removed") as $item => $damagevalue){
            Item::removeCreativeItem(Item::get($item, $damagevalue));   
        }
        foreach($this->creativeitems->get("items-added") as $item => $damagevalue){
            Item::addCreativeItem(Item::get($item, $damagevalue));      
        }
        $this->getLogger()->info("§aEnabled.");
    }

}
