<?php

namespace MCPEPIG\CreativeItemsPlus;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->creativeItemsPlus = (new Config($this->getDataFolder()."config.yml", Config::YAML, [
      "items-added" => [
         276 => 0
      ],
      "items-removed" => [
         267 => 0
      ],
    ]));
    foreach($this->creativeItemsPlus->get("items-added") as $aitem => $damagevalue){
      Item::addCreativeItem(Item::get($aitem, $damagevalue));      
    }
    foreach($this->creativeItemsPlus->get("items-removed") as $ritem => $damagevalue){
      Item::removeCreativeItem(Item::get($ritem, $damagevalue));   
    }
    $this->getLogger()->info("§aCreativeItemsPlus by MCPEPIG loaded.");
  }
}
