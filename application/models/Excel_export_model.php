<?php
class Excel_export_model extends CI_Model
{
    function fetch_data($ampurcode)
    {



        $this->db->order_by("id", "DESC");
        $query = $this->db
            ->where('ampur',$ampurcode)
            ->get("person_survey");
        return $query->result();
    }


}