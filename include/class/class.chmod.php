<?php
/**
 |--------------------------------------------------------------------------|
 |   https://github.com/3evils/                                             |
 |--------------------------------------------------------------------------|
 |   Licence Info: WTFPL                                                    |
 |--------------------------------------------------------------------------|
 |   Copyright (C) 2020 Evil-Trinity                                        |
 |--------------------------------------------------------------------------|
 |   A bittorrent tracker source based on an unreleased U-232               |
 |--------------------------------------------------------------------------|
 |   Project Leaders: AntiMidas,  Seeder                                    |
 |--------------------------------------------------------------------------|
     _   _   _   _     _   _   _   _   _   _   _ 
 / \ / \ / \ / \   / \ / \ / \ / \ / \ / \ / \
| E | v | i | l )-| T | r | i | n | i | t | y )
 \_/ \_/ \_/ \_/   \_/ \_/ \_/ \_/ \_/ \_/ \_/

*/
/* Chmod class
 * Original idea from here http://gr.php.net/manual/en/function.chmod.php#77163
 *
 * Changed accordingly and improved for a mod on TBDEV.NET by Alex2005
*/
class Chmod
{
    private $_dir, $_modes = array(
        'owner' => 0,
        'group' => 0,
        'public' => 0
    );
    public function Chmod($dir, $OwnerModes = array() , $GroupModes = array() , $PublicModes = array())
    {
        $this->_dir = $dir;
        $this->setOwnerModes($OwnerModes[0], $OwnerModes[1], $OwnerModes[2]);
        $this->setGroupModes($GroupModes[0], $GroupModes[1], $GroupModes[2]);
        $this->setPublicModes($PublicModes[0], $PublicModes[1], $PublicModes[2]);
    }
    private function setOwnerModes($read, $write, $execute)
    {
        $this->_modes['owner'] = $this->setMode($read, $write, $execute);
    }
    private function setGroupModes($read, $write, $execute)
    {
        $this->_modes['group'] = $this->setMode($read, $write, $execute);
    }
    private function setPublicModes($read, $write, $execute)
    {
        $this->_modes['public'] = $this->setMode($read, $write, $execute);
    }
    private function getMode()
    {
        return $this->_modes['owner'] . $this->_modes['group'] . $this->_modes['public'];
    }
    private function setMode($read, $write, $execute)
    {
        $mode = 0;
        if ($read) $mode+= 4;
        if ($write) $mode+= 2;
        if ($execute) $mode+= 1;
        return $mode;
    }
    private function returnValue($dir)
    {
        return (is_dir($dir) ? array(
            'chmod',
            @chmod($dir, $this->getMode()) ,
            $this->getMode() ,
            $dir
        ) : array(
            'mkdir',
            @mkdir($dir, $this->getMode()) ,
            $this->getMode() ,
            $dir
        ));
    }
    public function setChmod()
    {
        if (is_array($this->_dir)) {
            $return = array();
            foreach ($this->_dir as $dir) $return[] = $this->returnValue($dir);
            return $return;
        } else return $this->returnValue($this->_dir);
    }
}
?>
