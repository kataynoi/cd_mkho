<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Whitelist_organization_model extends CI_Model
{
    var $table = "whitelist_organization";
    var $order_column = Array('id','organization','cid','prename','name','lname','sex','birth','tel',);

    function make_query()
    {
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("cid", $_POST["search"]["value"]);$this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->group_end();

        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('', '');
        }
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    /* End Datatable*/
    public function del_whitelist_organization($id)
        {
        $rs = $this->db
            ->where('id', $id)
            ->delete('whitelist_organization');
        return $rs;
        }

        

    public function save_whitelist_organization($data)
            {

                $rs = $this->db
                    ->set("id", $data["id"])->set("organization", $data["organization"])->set("target_type", $data["target_type"])->set("prov", $data["prov"])->set("amp", $data["amp"])->set("tambon", $data["tambon"])->set("moo", $data["moo"])->set("hospname", $data["hospname"])->set("hospcode", $data["hospcode"])->set("cid", $data["cid"])->set("prename", $data["prename"])->set("name", $data["name"])->set("lname", $data["lname"])->set("sex", $data["sex"])->set("birth", $data["birth"])->set("tel", $data["tel"])->set("vaccine", $data["vaccine"])
                    ->insert('whitelist_organization');

                return $this->db->insert_id();

            }
    public function update_whitelist_organization($data)
            {
                $rs = $this->db
                    ->set("id", $data["id"])->set("organization", $data["organization"])->set("target_type", $data["target_type"])->set("prov", $data["prov"])->set("amp", $data["amp"])->set("tambon", $data["tambon"])->set("moo", $data["moo"])->set("hospname", $data["hospname"])->set("hospcode", $data["hospcode"])->set("cid", $data["cid"])->set("prename", $data["prename"])->set("name", $data["name"])->set("lname", $data["lname"])->set("sex", $data["sex"])->set("birth", $data["birth"])->set("tel", $data["tel"])->set("vaccine", $data["vaccine"])->where("id",$data["id"])
                    ->update('whitelist_organization');

                return $rs;

            }
    public function get_whitelist_organization($id)
                {
                    $rs = $this->db
                        ->where('id',$id)
                        ->get("whitelist_organization")
                        ->row();
                    return $rs;
                }
}