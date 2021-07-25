<?php 

namespace GamesUI; 

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
        $player->sendMessage("§eHas abierto la ui de games");
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
  $form->setTitle("§5Selecciona un juego");
  $form->setContent("§fEstos son las modalidades disponibles pronto se añadiran mas");
  $form->addButton("§4Factions\n§4Construye tu base!",0,"textures/items/diamond_sword");
  $form->addButton("§6Mina\n§7Mina y vende para conseguir dinero",0,"textures/items/diamond_pickaxe");
  $form->addButton("§4A§cr§4e§cn§4a§cP§4v§cP\n§4Mata a jugadores para conseguir dinero",0,"textures/items/ender_pearl");
  $form->addButton("§cMinaPvP\n§cMina, vende y mata jugadores",0,"textures/items/diamond");
  $form->addButton("§6Eventos\n§7Consigue items especiales!",0,"textures/items/bow");
  $form->sendToPlayer($player);
  
  public function onDisable() : void {
    $this->getLogger()->info("UI DESACTIVADA");
	}
  
  
   
 
