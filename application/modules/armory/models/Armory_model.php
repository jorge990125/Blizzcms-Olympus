<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$SLOTS_ARMORY = array(
    'head' => '',
    'neck' => '',
    'shoulder' => '',
    'shirt' => '',
    'chest' => '',
    'waist' => '',
    'legs' => '',
    'feet' => '',
    'wrist' => '',
    'gloves' => '',
    'finger1' => '',
    'finger2' => '',
    'trinket1' => '',
    'trinket2' => '',
    'back' => '',
    'mainhand' => '',
    'offhand' => '',
    'ranged' => '',
    'tabard' => '',
);


class armory_model extends CI_Model
{
    public $SLOTS_ARMORY;
    public function __construct()
    {
        parent::__construct();
    }

    public function searchChars($MultiRealm, $search)
    {
        $this->multirealm = $MultiRealm;
        return $this->multirealm->select('guid, name, level, class, race, totalKills')->like('LOWER(name)', strtolower($search))->get('characters');
    }

    public function getHonorPoints($realm, $guid)
    {
        $MultiRealm = $this->wowrealm->getRealmConnectionData($realm);
        $this->multirealm = $MultiRealm;
        $this->multirealm->select('total_count');
        $this->multirealm->from('character_currency');
        $this->multirealm->where('guid', $guid)->where('currency', 392);
        return $this->multirealm->get();
    }

    public function getConquestPoints($realm, $guid)
    {
        $MultiRealm = $this->wowrealm->getRealmConnectionData($realm);
        $this->multirealm = $MultiRealm;
        $this->multirealm->select('total_count');
        $this->multirealm->from('character_currency');
        $this->multirealm->where('guid', $guid)->where('currency', 390);
        return $this->multirealm->get();
    }

    public function getPlayerInfo($realm, $id)
    {
        $MultiRealm = $this->wowrealm->getRealmConnectionData($realm);
        $this->multirealm = $MultiRealm;
        return $this->multirealm->select('*')->where('guid', $id)->get('characters');
    }

    public function getCharInvs($realm, $id)
    {
        $SLOTS_ARMORY = array(
            '0' => '', //head
            '1' => '', //neck
            '2' => '', //shoulder
            '3' => '', //shirt
            '4' => '', //chest
            '5' => '', //waist
            '6' => '', //legs
            '7' => '', //feet
            '8' => '', //wrist
            '9' => '', //gloves
            '10' => '', //finger1
            '11' => '', //finger2
            '12' => '', //trinket1
            '13' => '', //trinket2
            '14' => '', //back
            '15' => '', //mainhand
            '16' => '', //offhand
            '17' => '', //ranged
            '18' => '', //tabard
        );
        $MultiRealm = $this->wowrealm->getRealmConnectionData($realm);
        $this->multirealm = $MultiRealm;
        $this->multirealm->select('itemEntry, slot');
        $this->multirealm->from('character_inventory a');
        $this->multirealm->join('item_instance b', 'a.item = b.guid', 'left');
        $this->multirealm->where('a.guid', $id)->where('a.bag', 0)->where('a.slot >=', 0)->where('a.slot <=', 18);
        $query = $this->multirealm->get();
        foreach ($query->result() as $row) {
            foreach ($SLOTS_ARMORY as $key => $value) {
                if (empty($value)) {
                    $SLOTS_ARMORY[$row->slot] = $row->itemEntry;
                    break;
                }
            }
        }
        return $SLOTS_ARMORY;
    }

    public function getAchievements($realm, $id)
    {
        $MultiRealm = $this->wowrealm->getRealmConnectionData($realm);
        $this->multirealm = $MultiRealm;
        return $this->multirealm->select('achievement')->where('guid', $id)->get('character_achievement')->num_rows();
    }
}