<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person_survey_self extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('print_layout');
        $this->load->model('Person_survey_self_model', 'crud');
        //$this->user_id = $this->session->userdata('id');
    }

    public function index()
    {

        $data[] = '';
        $data["cnation"] = $this->crud->get_cnation();
        $data["campur"] = $this->crud->get_campur();
        $data["cchangwat"] = $this->crud->get_cchangwat();
        $this->layout->view('person_survey_self/index', $data);
    }

    public function add_person_survey()
    {
        $data[] = '';
        $data["cnation"] = $this->crud->get_cnation();
        //$data["cvillage"] = $this->crud->get_cvillage();
        //$data["ctambon"] = $this->crud->get_ctambon();
        $data["campur"] = $this->crud->get_campur();
        $data["cchangwat"] = $this->crud->get_cchangwat();
        $this->layout->view('person_survey/add_person_survey', $data);
    }

    public function get_person_by_cid()
    {
        $cid = $this->input->post('cid');
        if ($this->crud->check_person_cid($cid) >= 1) {
            $json = '{"success": true,"check":true}';
        } else {
            $rs = $this->crud->get_person_cid($cid);
            if ($rs) {
                $rows = json_encode($rs);
                $json = '{"success": true, "rows": ' . $rows . '}';
            } else {
                $json = '{"success": true, "check": false}';
            }
        }

        render_json($json);
    }


    function fetch_person_survey()
    {
        $fetch_data = $this->crud->make_datatables($this->user_id);
        $data = array();
        $no = 0;
        foreach ($fetch_data as $row) {

            $no++;
            $sub_array = array();
            $sub_array[] = $no;
            $sub_array[] = to_thai_date_time($row->d_update);
            $sub_array[] = $row->cid;
            $sub_array[] = $row->name;
            $sub_array[] = to_thai_date_short($row->date_in);
            $sub_array[] = get_province_name($row->from_province);
            $sub_array[] = $row->moo;
            $sub_array[] = $row->tambon;
            $sub_array[] = $row->ampur;
            $sub_array[] = '<div class="btn-group pull-right" role="group" >
                <button class="btn btn-outline btn-success" data-btn="btn_view" data-id="' . $row->id . '"><i class="fa fa-eye"></i></button>
                <button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button>
                <button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button></div>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud->get_all_data($this->user_id),
            "recordsFiltered" => $this->crud->get_filtered_data($this->user_id),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function del_person_survey()
    {
        $id = $this->input->post('id');

        $rs = $this->crud->del_person_survey($id);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }

    public function  save_person_survey_self()
    {
        $data = $this->input->post('items');
        if ($data['action'] == 'insert') {
            $rs = $this->crud->save_person_survey($data);
            if ($rs) {
                $json = '{"success": true,"id":' . $rs . '}';
            } else {
                $json = '{"success": false}';
            }
        } else if ($data['action'] == 'update') {
            $rs = $this->crud->update_person_survey($data);
            if ($rs) {
                $json = '{"success": true}';
            } else {
                $json = '{"success": false}';
            }
        }

        render_json($json);
    }

    public function  get_person_survey()
    {
        $id = $this->input->post('id');
        $rs = $this->crud->get_person_survey($id);
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": ' . $rows . '}';
        render_json($json);
    }
    public function capture($id=0)
    {
        // เร่มต้นการทดสอบคำนวณเวลาการทำงาน calculate time
        $time_start = microtime(true);
        // โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
        // require_once("../dbconnect.php"); // กำหนด path ให้ถูกต้อง

        // กำหนด url เว็บไซต์ที่ต้องการ
        //$webURL = site_url()."/person_survey_self/print/12";
        $webURL ="https://www.ninenik.com";
        $param = array(
            "strategy" => "mobile", // comment ปิดส่วนนี้ หากต้องการผลแบบ desktop
            "url" => $webURL
        );
        $qury_str = http_build_query($param);
        // ใช้วิธี cURL
        try {
            $endpontURL = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?" . $qury_str;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $endpontURL);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            $screen_shot_result = json_decode($result, true);
            $screen_shot = $screen_shot_result['lighthouseResult']['audits']['final-screenshot']['details']['data'];
        } finally {
            curl_close($ch);
        }

        if (isset($screen_shot) && !empty($screen_shot)) {
            echo "<img src='{$screen_shot}' />";
        }

        // ส่วนกำหนดเวลาจบการทำงาน สำหรับคำนวณ
        $time_end = microtime(true);
        // เวลาการทำงาน ในหน่วยวินาที และ นาที
        $execution_time_second = $time_end - $time_start;
        $execution_time_minute = floor((int)$execution_time_second / 60) + ((int)$execution_time_second % 60) * 0.01;

        // เวลาในการทำงานปรมวลผลของคำสั่ง
        echo '<br/><br/><b>Total Execution Time:</b> ' . $execution_time_second . ' Seconds';
        echo '<br/><b>Total Execution Time:</b> ' . $execution_time_minute . ' Minutes';
    }
}
