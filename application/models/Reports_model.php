<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
                ,SUM(IF((a.form in ('เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�??เน€เธ�?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??' ,'เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌเธ�','เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�??เน€เธ�?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�??เน€เธ�?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?','เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌเธ�','เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??','เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�?เน�?เธ�เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??','เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??') AND a.to ='เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�???เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�?เน�โ�ฌ?เน€เธ�โ�ฌเน€เธ�?เน�?เธ�เน€เธ�โ�ฌเน€เธ�??เน€เธ�โ�ฌเน€เธ�??'),1,0)) as Bkk
                FROM person_bypass a
                JOIN users b ON a.check_point = b.id
                 WHERE b.checkpoint=1
                GROUP BY a.check_point";
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
    }

    public function person_survey()
    {
        $startdate = '2020-03-01';
        $daynow = date("Y-m-d");
        $sql = "SELECT a.ampur,b.ampurname,COUNT(*) as total
              ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') BETWEEN '$startdate' AND ('$daynow' - INTERVAL 1 DAY),1,0)) as daynow1
              ,SUM(IF(DATE_FORMAT(a.d_update,'%Y-%m-%d') = '$daynow',1,0)) as daynow
              ,SUM(IF(a.from_province in('10','12','13','11','74'),1,0)) as  bkk
              FROM person_survey a
              JOIN campur b ON a.ampur = b.ampurcodefull
              GROUP BY a.ampur";
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
    }



    public function get_accident_by_year($year)
    {
        $sql = "SELECT a.m_id,a.fullname,b.total FROM co_month a ";
        $sql .= " LEFT JOIN ";
        $sql .= " (SELECT DATE_FORMAT(a.date_accident,'%m') as M,count(*) as total  FROM accident_event a WHERE DATE_FORMAT(a.date_accident,'%Y')='" . $year . "' GROUP BY M) b ON a.m_id=b.M  ORDER BY a.m_id";
        $rs = $this->db->query($sql)->result();

        return $rs;

    }
    public function person_bypass_inday($ampcode,$date_now)
    {
        if($ampcode==''){$ampcode='<>""';}else{$ampcode="='$ampcode'";}
        $sql = "SELECT count(*) as total
                ,SUM(IF(a.sex='ชาย' OR a.trpre in('นาย','ด.ช.'),1,0)) as male
                ,SUM(IF(a.sex='หญิง' OR a.trpre in('นาง','น.ส.','นางสาว','ด.ญ.'),1,0)) as female
                ,SUM(IF((a.form NOT in ('ขอนแก่น' ,'มหาสารคาม','ร้อยเอ็ด', 'กาฬสินธุ์') AND a.to ='มหาสารคาม'),1,0)) as in_mk ,SUM(IF(a.temp_result <=37.5,1,0)) as temp_normal
                ,SUM(IF(a.temp_result >37.5,1,0)) as temp_abnormal
                FROM person_bypass a
                WHERE DATE_FORMAT(a.d_update,'%Y-%m-%d') ='".$date_now."'
                  AND a.check_point ".$ampcode;
        $rs = $this->db->query($sql)->row();

        return $rs;

    }

    public function car_inday($ampcode,$date_now)
    {   $operation='';
        $date_now = "'".$date_now."'";
        if($ampcode==''){$ampcode='""';$operation='!=';}else{$ampcode="'$ampcode'";$operation='=';}
        $rs = $this->db
            ->select('a.vehicle,b.name,count(*) as total', false)
            ->where('DATE_FORMAT(a.d_update,"%Y-%m-%d")',$date_now,false)
            ->where('a.check_point '.$operation,$ampcode,false)
            ->group_by('a.vehicle')
            ->join('cvehicle b','a.vehicle = b.id')
            ->get('person_bypass a')
            ->result();
        return $rs;


    }

    public function get_median_month($year, $code506, $m)
    {
        $m = "m" . (int)$m;
        $rs = $this->db
            ->select($m)
            ->where('year', $year)
            ->where('code506', $code506)
            ->where('hospcode', '00031')
            ->get('median_month')
            ->row();
        return count($rs) > 0 ? $rs->$m : 0;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */