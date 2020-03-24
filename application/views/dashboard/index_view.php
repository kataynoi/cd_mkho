
<div class="col col-lg-12" style="padding-top: 16px;">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-md fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit"><?php /*echo $all_employee */?></div>
                        <div>จำนวนผู้ป่วย</div>
                    </div>
                </div>
            </div>
            <a href="<?php /**/?>">
                <div class="panel-footer">
                    <span class="pull-left"> </span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-desktop fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit_true"><?php /*echo $all_pc */?></div>
                        <div>จำนวน home quarantine ครบ 14 วัน</div>
                    </div>
                </div>
            </div>
            <a href="<?php /*echo site_url('com_survey'); */?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-laptop fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php /*echo $all_nb */?></div>
                        <div>จำนวนผู้เสียชีวิต</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-print fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php /*echo $all_printer */?></div>
                        <div>จำนวนผู้อยู่ระหว่าง home quarantine</div>
                    </div>
                </div>
            </div>
            <a href="<?php /*echo site_url('printer_survey');*/?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col col-lg-12'>
        <div class="panel  panel-default">
            <div class="panel-heading w3-theme-l1">
                ข่าวประชาสัมพันธ์
            </div>
            <div class="panel-body">
            <div class="row">
                <tbody>
                </tbody>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/dashboard.js" charset="utf-8"></script>