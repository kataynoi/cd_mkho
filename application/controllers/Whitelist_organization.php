<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whitelist_organization extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();

                if($this->session->userdata("user_type") != 4)
                    redirect(site_url("user/login_org"));
                
                $this->layout->setLayout('print_layout');
        $this->load->model('Whitelist_organization_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        
        $this->layout->view('whitelist_organization/index', $data);
    }
    public function set_org()
    {
        $data["campur"] = $this->crud->get_campur();
        
        $this->layout->view('whitelist_organization/set_org',$data);
    }

    function fetch_whitelist_organization()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $vaccine="";
            if($row->vaccine==1){
                $vaccine="<span><i class='fa fa-check-circle' style='color:green;'></i><span>";
            }else{
                $vaccine="<span><i class='fa fa-times-circle' style='color:red;'></i><span>";
            }
            $sub_array = array();
                $sub_array[] =$vaccine;
                $sub_array[] = $row->organization;
                $sub_array[] = $row->cid;
                $sub_array[] = $row->prename;
                $sub_array[] = $row->name;
                $sub_array[] = $row->lname;
                $sub_array[] = $row->sex;
                $sub_array[] = $row->tel;
               
                $sub_array[] = '<div class="btn-group pull-right" role="group" >
                <button class="btn btn-outline btn-success" data-btn="btn_view" data-id="' . $row->id . '"><i class="fa fa-eye"></i></button>
                <button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button>
                <button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button></div>';
                $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud->get_all_data(),
            "recordsFiltered" => $this->crud->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function del_whitelist_organization(){
        $id = $this->input->post('id');

        $rs=$this->crud->del_whitelist_organization($id);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }

    public function  save_whitelist_organization()
    {
            $data = $this->input->post('items');
            if($data['action']=='insert'){
                $rs=$this->crud->save_whitelist_organization($data);
                
                if($rs){
                    $json = '{"success": true,"id":'.$rs.'}';
                  }else{
                    $json = '{"success": false}';
                  }
            }else if($data['action']=='update'){
                $rs=$this->crud->update_whitelist_organization($data);
                    if($rs){
                        $json = '{"success": true}';
                    }else{
                        $json = '{"success": false}';
                    }
            }

            render_json($json);
        }
        public function  save_org()
        {
                $data = $this->input->post('items');
                
                    $rs=$this->crud->update_org($data);
                        if($rs){
                            $this->session->set_userdata("fullname",$data['org_name']);
                            $json = '{"success": true}';
                        }else{
                            $json = '{"success": false}';
                        }
                
    
                render_json($json);
            }
    public function  get_whitelist_organization()
    {
                $id = $this->input->post('id');
                $rs = $this->crud->get_whitelist_organization($id);
                $rows = json_encode($rs);
                $json = '{"success": true, "rows": ' . $rows . '}';
                render_json($json);
    }
}