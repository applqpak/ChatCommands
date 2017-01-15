<?php

  namespace ChatCommands\events;
  
  use pocketmine\event\Listener;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\ConsoleCommandSender;
  use pocketmine\event\player\PlayerChatEvent;
  
  class ChatEvent implements Listener
  {
      private $cfg;
      private $plugin;
      
      public function __construct(Main $plugin)
      {
          $this->cfg    = $plugin->cfg;
          $this->plugin = $plugin;
      }
      
      public function onPlayerChat(PlayerChatEvent $event)
      {
          $player   = $event->getPlayer();
          $message  = explode(' ', strtolower($event->getMessage()));
          $messages = $this->cfg->getAll();
          if(in_array($message[0], $messages))
          {
              unset($message[0]);
              $args = implode(' ', $message);
              $this->plugin->getServer()->dispatchCommand($player, $this->cfg->get($message) . $args);
          }
      }
  }
