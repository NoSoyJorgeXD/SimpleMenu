<?php 

namespace SimpleUI; 

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender; 
use pocketmine\plugin\PluginBase as J; 
use pocketmine\event\Listener as L;
use Form\Form\FormUI;

class UI extends J implements L {
	
	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("Menu enabled");
	}

  public function onCommand(CommandSender $player, Command $cmd, string $label, array $args) : bool {
    switch($cmd->getName()){
      case "formUI":
        $player->sendMessage("§eYou open de Menu");
        $this->myForm($player);
        break;
    }
    return true;
  }
  
  use FormUI;
  public function myform(Player $player){
    $form = $this->createSimpleFor(function(Player $player, ?int $data){
      if( !is_null($data)){
        switch($data){
          case 0:
            Server::getInstance()->dispatchCommand($player, "warp Factions");
          break;
          case 1:
            Server::getInstance()->dispatchCommand($player, "warp Mina");
          break;
          case 2:
            Server::getInstance()->dispatchCommand($player, "warp ArenaPvP");
          break;
          case 3:
            Server::getInstance()->dispatchCommand($player, "warp MinaPvP");
          break;
          case 4:
            Server::getInstance()->dispatchCommand($player, "warp Eventos");
          break;
        }
      }
  });
  $form->setTitle("§5Select a game mode");
  $form->setContent("§fThese are the games available");
  $form->addButton("§4Factions\n§cBuild your house",0,"textures/items/diamond_sword");
  $form->addButton("§6Mine\n§7Mine and sell",0,"textures/items/diamond_pickaxe");
  $form->addButton("§4A§cr§4e§cn§4a§cP§4v§cP\n§4Kill players for money",0,"textures/items/ender_pearl");
  $form->addButton("§cMinaPvP\n§cMine and kill players",0,"textures/items/diamond");
  $form->addButton("§6Events\n§7Special events!",0,"textures/items/bow");
  $form->sendToPlayer($player);
  
  public function onDisable() : void {
    $this->getLogger()->info("UI Disable");
	}
  
  
   
 
