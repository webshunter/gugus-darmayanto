<?php


class Perusahaans extends CI_Model
{
    public function mydbr($a){
        return $this->db->query($a)->row();
    }

    public static function get()
    {
        return json_decode(ffread('.set'));
    }


}
