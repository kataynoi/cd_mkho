<div class="sidebar w3-theme-l5" role="navigation" style="padding-top: 15px; background-color: transparent !important;">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="sidebar-nav navbar-collapse" id="left_slide">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo site_url(); ?>"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('person') ?>"><i class="fas fa-chart-line"></i> กลุ่มเป้าหมาย</a></li>
                    <li>
                        <a href="<?php echo site_url('person_bypass') ?>"><i class="fas fa-chart-line"></i> บันทึกข้อมูลด่านตรวจ</a></li>
                    <li>
                    <li>
                        <a href="<?php echo site_url('person_survey') ?>"><i class="fas fa-chart-line"></i> บันทึกข้อมูลคนเดินทางเข้าพักจ.มหาสารคาม</a></li>
                    <li
                    <li>
                        <a href="<?php echo site_url('person_bypass') ?>"><i class="fas fa-chart-line"></i> รายงาน<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('report/person_bypass_last7day')?>"> จำนวนผู้ผ่านด่านตรวจ</a></li>
                            <li><a href="<?php echo site_url('report/person_survey')?>"> จำนวนประชากรเดินทางเข้า </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin') ?>"><i class="far fa-calendar-check"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- /.sidebar-collapse -->
</div>

<script src="<?php echo base_url() ?>assets/apps/js/search.js" charset="utf-8"></script>
