<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" charset="utf-8"></script>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $('#left_menu').hide();
</script>
<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> ประชาชนที่ เดินทางเข้า มหาสารคามผ่านจุดตรวจ
            <button class="btn btn-success pull-right" id="add_data" data-toggle="modal" data-target="#frmModal"><i
                    class="fa fa-plus-circle"></i> Add
            </button>
            </span>

        </div>
        <div class="panel-body">

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>เลขบัตรประชาชน</th>

                    <th>ชื่อ</th>
                    <th>สกุล</th>

                    <th>เพศ</th>
                    <th>อำเภอ</th>
                    <th>จังหวัด</th>
                    <th>อายุ</th>
                    <th>มากจาก -> เดินทางไป</th>
                    <th>วันที่บันทึก</th>
                    <th>#</th>
                </tr>
                </thead>

            </table>
        </div>

    </div>

</div>


<div class="modal fade" id="frmModal" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มประชาชนที่ เดินทางเข้า มหาสารคามผ่านจุดตรวจ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="action" value="insert">
                <input type="hidden" class="form-control" id="row_id" placeholder="ROWID" value="">

                <div class="form-row">
                        <input type="hidden" class="form-control" id="id" placeholder="ID" value="">
                    <div class="form-group col-md-3">
                        <label for="cid">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" id="cid" placeholder="เลขบัตรประชาชน" value="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="trpre">คำนำหน้า</label>
                        <input type="text" class="form-control" id="trpre" placeholder="คำนำหน้า" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tname">ชื่อ</label>
                        <input type="text" class="form-control" id="tname" placeholder="ชื่อ" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tlast">สกุล</label>
                        <input type="text" class="form-control" id="tlast" placeholder="สกุล" value="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="birth">วันเกิด</label>
                        <input type="text" class="form-control" id="birth" placeholder="วันเกิด" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="sex">เพศ</label>
                        <input type="text" class="form-control" id="sex" placeholder="เพศ" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="addrno">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="addrno" placeholder="บ้านเลขที่" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="addrmu">หมู่</label>
                        <input type="text" class="form-control" id="addrmu" placeholder="หมู่" value="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="addrtb">ตำบล</label>
                        <input type="text" class="form-control" id="addrtb" placeholder="ตำบล" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="addrap">อำเภอ</label>
                        <input type="text" class="form-control" id="addrap" placeholder="อำเภอ" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="addrcw">จังหวัด</label>
                        <input type="text" class="form-control" id="addrcw" placeholder="จังหวัด" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="agenow">อายุ</label>
                        <input type="text" class="form-control" id="agenow" placeholder="อายุ" value="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3 ">
                        <label for="datestamp">วันที่บันทึก</label>
                        <input type="text" class="form-control" id="datestamp" placeholder="วันที่บันทึก" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="datestamp">โทร</label>
                        <input type="text" class="form-control" id="tel" placeholder="เบอร์โทร" value="">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="from_province">มาจากจังหวัด</label>
                        <select class="form-control" id="form" style="width: 100%">
                            <?php
                            foreach ($cchangwat as $r) {
                                echo "<option value='".$r->changwatname."' > ".$r->changwatname ."</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="temp_check">เดินทางไป</label>
                        <select class="form-control" id="to" style="width: 100%">
                            <?php
                            foreach ($cchangwat as $r) {
                                echo "<option value='".$r->changwatname."' > ".$r->changwatname ."</option>";
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="temp_check">อุณหภูมิปกติ</label>
                        <select class="form-control" id="temp_check">
                            <option value="ปกติ" > ปกติ</option>
                            <option value="ไม่ปกติ"> ไม่ปกติ</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="temp_result">อุณหภูมิ</label>
                        <input type="text" class="form-control" id="temp_result" placeholder="อุณหภูมิ" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="temp_result">อาการทั่วไป</label>
                        <select class="form-control" id="symtom1">
                            <option value="ปกติ" > ปกติ</option>
                            <option value="ไม่ปกติ"> ไม่ปกติ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="check_point">จุดตรวจ</label>
                        <input type="hidden" class="form-control" id="check_point" placeholder="จุดตรวจ" value="">
                    <input type="text" class="form-control" id="check_point2" placeholder="จุดตรวจ" value="" disabled ></div>
                </div>

                <div class="form-row col-md-12 text-center">
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg" id="btn_save">Save</button>
                        <button type="button" class="btn btn-danger btn-lg" id="btn_close" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
            <!-- Modal footer -->

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>


<script src="<?php echo base_url() ?>assets/apps/js/person_bypass.js" charset="utf-8"></script>
