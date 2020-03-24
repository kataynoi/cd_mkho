<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_model extends CI_Model
{

    public function get_boss(){

        $rs = $this->db
            ->select('a.boss,CONCAT(b.prename,b.name) as name,b.position')
            ->where('a.id','00452')
            ->join('employee b','a.boss = b.id')
            ->get('chospital a')
            ->row_array();
        return $rs;
    }
    public function get_office(){

        $rs = $this->db
            ->select('a.id,a.name')
            ->where('a.hostype','18')
            ->get('chospital a')
            ->result_array();
        return $rs;
    }

    public function sl_hospcode(){

        $rs = $this->db
            //->where('provcode',$id)
            ->get('chospital')
            ->result();
        return $rs;
    }

    public function sl_group(){

        $rs = $this->db
            //->where('provcode',$id)
            ->get('co_workgroup')
            ->result();
        return $rs;
    }
    public function sl_employee_type(){

        $rs = $this->db
            //->where('provcode',$id)
            ->get('cemployee_type')
            ->result();
        return $rs;
    }
    public function sl_cars(){

        $rs = $this->db
            //->where('provcode',$id)
            ->get('car')
            ->result();
        return $rs;
    }
    public function get_user_name($id){

        $rs = $this->db
            ->where('id',$id)
            ->get('users')
            ->row();
        return $rs?$rs->name:'-';
    }

}