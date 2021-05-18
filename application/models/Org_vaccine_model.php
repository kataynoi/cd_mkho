<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Org_vaccine_model extends CI_Model
{
    function make_datatables($id)
    {
        $sql = "SELECT b.org_name,SUM(IF(a.vaccine=1,1,0)) as vaccine 
                FROM whitelist_organization a 
                WHERE b.org_type = '1'
                LEFT JOIN user_org b ON a.organization = b.id
                GROUP BY a.organization";
        $query = $this->db->query($sql);
        return $query->result();
    }
 
}