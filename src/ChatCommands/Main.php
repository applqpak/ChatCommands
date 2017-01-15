<?php

  namespace ChatCommands;
  
  use pocketmine\utils\Config;
  use pocketmine\plugin\PluginBase;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\ConsoleCommandSender;
  
  use ChatCommands\events\ChatEvent;
  
  class Main extends PluginBase
  {
      public $cfg;
      
      public function onEnable()
      {
          @mkdir($this->getDataFolder());
          $this->saveResource('config.yml');
          $this->cfg = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
          $this->getLogger()->info(TF::GREEN . 'Enabled.');
      }
      
      public function onDisable()
      {
          $this->getLogger()->info(TF::RED . 'Disabled.');
      }
  }
