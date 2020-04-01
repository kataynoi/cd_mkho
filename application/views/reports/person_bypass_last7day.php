<br>
<br>

<script>
    $('#left_menu').hide();
</script>
<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อจุดตรวจ</th>
            <th>จำนวนท้งหมด</th>
            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-6 days")));?></th>

            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-5 days")));?></th>

            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-4 days")));?></th>

            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-3 days")));?></th>

            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-2 days")));?></th>

            <th>
                <?php echo to_thai_date_short(date('Y-m-d',strtotime("-1 days")));?></th>
            <th>
                <?php echo to_thai_date_short(date('Y-m-d'));?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $n=1;$sday1=0;
        foreach($report as $r ){
            echo "<tr>";
            echo "<td>$n</td><td>$r->name</td><td>".number_format($r->total)."</td>
            <td>".number_format($r->day6)."</td><td>".number_format($r->day5)."</td>
            <td>".number_format($r->day4)."</td><td>".number_format($r->day3)."</td>
            <td>".number_format($r->day2)."</td><td>".number_format($r->day1)."</td>
            <td>".number_format($r->daynow)."</td>";
            echo "</tr>";
            $n++;
            $sday1 = $sday1+$r->day1;
        }

        ?>
    </tbody>

</table>