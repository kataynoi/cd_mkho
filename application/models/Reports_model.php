<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Report model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */

class Reports_model extends CI_Model
{
    public $hospcode;
    public $hserv;

    public function person_bypass_last7day()
    {
        $day_now = date("Y-m-d");
        $sql = "SELECT a.check_point, b.`name`, COUNT(*) as total
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 6 DAY,1,0)) day6
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 5 DAY,1,0)) day5
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 4 DAY,1,0)) day4
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 3 DAY,1,0)) day3
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 2 DAY,1,0)) day2
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now' - INTERVAL 1 DAY,1,0)) day1
                ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$day_now',1,0)) daynow
                ,SUM(IF((a.form in ('กรุงเทพมหานคร' ,'นนทบุรี','ฉะเชิงเทรา','ปทุมธานี','สมุทรปราการ','สมุทรสาคร','นครปฐม') AND a.to ='มหาสารคาม'),1,0)) as Bkk
                FROM person_bypass a
                LEFT JOIN users b ON a.check_point = b.id
                GROUP BY a.check_point";
                $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
    }
        public function top_location ($option = array()){
        if(isset($option['limit'])){
            $this->db->limit($option['limit']);
        }
        $rs = $this->db
            ->select('b.id, b.location_name, COUNT(a.location_id) as accident_time',false)
            ->join('location b','a.location_id = b.id')
            ->order_by('accident_time','DESC')
            ->group_by('a.location_id')
            ->get('accident_event a')
            ->result();
        return $rs;



    } public function get_accident_by_year($year){
        $sql="SELECT a.m_id,a.fullname,b.total FROM co_month a ";
        $sql.=" LEFT JOIN ";
        $sql.=" (SELECT DATE_FORMAT(a.date_accident,'%m') as M,count(*) as total  FROM accident_event a WHERE DATE_FORMAT(a.date_accident,'%Y')='".$year."' GROUP BY M) b ON a.m_id=b.M  ORDER BY a.m_id";
        $rs=$this->db->query($sql)->result();

        return $rs;

    }
    public function get_median_month($year,$code506,$m){
        $m="m".(int)$m;
        $rs=$this->db
            ->select($m)
            ->where('year',$year)
            ->where('code506',$code506)
            ->where('hospcode','00031')
            ->get('median_month')
            ->row();
        return count($rs) > 0 ? $rs->$m : 0;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */