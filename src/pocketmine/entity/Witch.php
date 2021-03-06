<?php
namespace pocketmine\entity;

use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;

class Witch extends Monster implements ProjectileSource{
    const NETWORK_ID = 45;

    public $width = 0.938;
    public $length = 0.609;
    public $height = 2;
	
	protected $exp_min = 5;
	protected $exp_max = 5;
	protected $maxHealth = 20;

    public function initEntity(){
        parent::initEntity();
    }

 	public function getName(){
        return "Witch";
    }

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->eid = $this->getId();
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}

    public function getDrops(){
        $drops = []; //TODO: Drops
        return $drops;
    }
}
