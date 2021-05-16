$(document).ready(function () {
  var dataTable = $("#table_data").DataTable({
    createdRow: function (row, data, dataIndex) {
      $(row).attr("name", "row" + dataIndex);
    },
    processing: true,
    serverSide: true,
    order: [],

    pageLength: 50,
    ajax: {
      url: site_url + "/whitelist_organization/fetch_whitelist_organization",
      data: {
        csrf_token: csrf_token,
      },
      type: "POST",
    },
    columnDefs: [
      {
        targets: [1, 2],
        orderable: false,
      },
    ],
  });
});

var crud = {};

crud.ajax = {
  del_data: function (id, cb) {
    var url = "/whitelist_organization/del_whitelist_organization",
      params = {
        id: id,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
  save: function (items, cb) {
    var url = "/whitelist_organization/save_whitelist_organization",
      params = {
        items: items,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
  save_org: function (items, cb) {
    var url = "/whitelist_organization/save_org",
      params = {
        items: items,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
  get_update: function (id, cb) {
    var url = "/whitelist_organization/get_whitelist_organization",
      params = {
        id: id,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
};
crud.del_data = function (id) {
  crud.ajax.del_data(id, function (err, data) {
    if (err) {
      swal(err);
    } else {
      //swal('ลบข้อมูลเรียบร้อย')
      app.alert("ลบข้อมูลเรียบร้อย");
    }
  });
};

crud.save = function (items, row_id) {
  crud.ajax.save(items, function (err, data) {
    if (err) {
      //app.alert(err);
      swal(err);
    } else {
      if (items.action == "insert") {
        crud.set_after_insert(items, data.id);
      } else if (items.action == "update") {
        crud.set_after_update(items, row_id);
      }
      $("#frmModal").modal("toggle");
      swal("บันทึกข้อมูลเรียบร้อยแล้ว ");
    }
  });
};
crud.save_org = function (items) {
  crud.ajax.save_org(items, function (err, data) {
    if (err) {
      //app.alert(err);
      swal(err);
    } else {
      swal("บันทึกข้อมูลเรียบร้อยแล้ว ");
      window.location = site_url + "/whitelist_organization";
    }
  });
};

crud.get_update = function (id, row_id) {
  crud.ajax.get_update(id, function (err, data) {
    if (err) {
      //app.alert(err);
      swal(err);
    } else {
      //swal('แก้ไขข้อมูลเรียบร้อยแล้ว ');
      //location.reload();
      crud.set_update(data, row_id);
    }
  });
};

crud.set_after_update = function (items, row_id) {
  var row_id = $('tr[name="' + row_id + '"]');
  row_id.find("td:eq(0)").html(items.id);
  row_id.find("td:eq(1)").html(items.organization);
  row_id.find("td:eq(2)").html(items.target_type);
  row_id.find("td:eq(3)").html(items.prov);
  row_id.find("td:eq(4)").html(items.amp);
  row_id.find("td:eq(5)").html(items.tambon);
  row_id.find("td:eq(6)").html(items.moo);
  row_id.find("td:eq(7)").html(items.hospname);
  row_id.find("td:eq(8)").html(items.hospcode);
  row_id.find("td:eq(9)").html(items.cid);
  row_id.find("td:eq(10)").html(items.prename);
  row_id.find("td:eq(11)").html(items.name);
  row_id.find("td:eq(12)").html(items.lname);
  row_id.find("td:eq(13)").html(items.sex);
  row_id.find("td:eq(14)").html(items.birth);
  row_id.find("td:eq(15)").html(items.tel);
  row_id.find("td:eq(16)").html(items.vaccine);
};
crud.set_after_insert = function (items, id) {
  $(
    '<tr name="row' +
      (id + 1) +
      '"><td>' +
      id +
      "</td>" +
      "<td>" +
      items.id +
      "</td>" +
      "<td>" +
      items.organization +
      "</td>" +
      "<td>" +
      items.target_type +
      "</td>" +
      "<td>" +
      items.prov +
      "</td>" +
      "<td>" +
      items.amp +
      "</td>" +
      "<td>" +
      items.tambon +
      "</td>" +
      "<td>" +
      items.moo +
      "</td>" +
      "<td>" +
      items.hospname +
      "</td>" +
      "<td>" +
      items.hospcode +
      "</td>" +
      "<td>" +
      items.cid +
      "</td>" +
      "<td>" +
      items.prename +
      "</td>" +
      "<td>" +
      items.name +
      "</td>" +
      "<td>" +
      items.lname +
      "</td>" +
      "<td>" +
      items.sex +
      "</td>" +
      "<td>" +
      items.birth +
      "</td>" +
      "<td>" +
      items.tel +
      "</td>" +
      "<td>" +
      items.vaccine +
      "</td>" +
      '<td><div class="btn-group pull-right" role="group">' +
      '<button class="btn btn-outline btn-success" data-btn="btn_view" data-id="' +
      id +
      '"><i class="fa fa-eye"></i></button>' +
      '<button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' +
      id +
      '"><i class="fa fa-edit"></i></button>' +
      '<button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' +
      id +
      '"><i class="fa fa-trash"></i></button>' +
      "</td></div>" +
      "</tr>"
  ).insertBefore("table > tbody > tr:first");
};

crud.set_update = function (data, row_id) {
  $("#row_id").val(row_id);
  $("#id").val(data.rows["id"]);
  $("#organization").val(data.rows["organization"]);
  $("#target_type").val(data.rows["target_type"]);
  $("#prov").val(data.rows["prov"]);
  $("#amp").val(data.rows["amp"]);
  $("#tambon").val(data.rows["tambon"]);
  $("#moo").val(data.rows["moo"]);
  $("#hospname").val(data.rows["hospname"]);
  $("#hospcode").val(data.rows["hospcode"]);
  $("#cid").val(data.rows["cid"]);
  $("#prename").val(data.rows["prename"]);
  $("#name").val(data.rows["name"]);
  $("#lname").val(data.rows["lname"]);
  $("#sex").val(data.rows["sex"]);
  $("#birth").val(data.rows["birth"]);
  $("#tel").val(data.rows["tel"]);
  $("#vaccine").val(data.rows["vaccine"]);
};

$("#btn_save").on("click", function (e) {
  e.preventDefault();
  var action;
  var items = {};
  var row_id = $("#row_id").val();
  items.action = $("#action").val();
  // items.brand_name = $("#brand option:selected").text();
  items.id = $("#id").val();
  items.organization = $("#organization").val();
  items.target_type = $("#target_type").val();
  items.prov = $("#prov").val();
  items.amp = $("#amp").val();
  items.tambon = $("#tambon").val();
  items.moo = $("#moo").val();
  items.hospname = $("#hospname").val();
  items.hospcode = $("#hospcode").val();
  items.cid = $("#cid").val();
  items.prename = $("#prename").val();
  items.name = $("#name").val();
  items.lname = $("#lname").val();
  items.sex = $("#sex").val();
  items.birth = $("#birth").val();
  items.tel = $("#tel").val();
  items.vaccine = $("#vaccine").val();

  if (validate(items)) {
    crud.save(items, row_id);
  }
});

$("#add_data").on("click", function (e) {
  e.preventDefault();
  $("#frmModal input").prop("disabled", false);
  $("#frmModal select").prop("disabled", false);
  $("#frmModal textarea").prop("disabled", false);
  $("#frmModal .btn").prop("disabled", false);
  $("#action").val("insert");
  app.clear_form();
});

$(document).on("click", 'button[data-btn="btn_del"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  var td = $(this).parent().parent().parent();

  swal({
    title: "คำเตือน?",
    text: "คุณต้องการลบข้อมูล ",
    icon: "warning",
    buttons: ["cancel !", "Yes !"],
    dangerMode: true,
  }).then(function (isConfirm) {
    if (isConfirm) {
      crud.del_data(id);
      td.hide();
    }
  });
});

$(document).on("click", 'button[data-btn="btn_edit"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $("#action").val("update");
  $("#id").val(id);
  var row_id = $(this).parent().parent().parent().attr("name");
  $("#frmModal input").prop("disabled", false);
  $("#frmModal select").prop("disabled", false);
  $("#frmModal textarea").prop("disabled", false);
  $("#frmModal .btn").prop("disabled", false);

  crud.get_update(id, row_id);
  $("#frmModal").modal("show");
});

$(document).on("click", 'button[data-btn="btn_view"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $("#action").val("update");
  $("#id").val(id);
  var row_id = $(this).parent().parent().parent().attr("name");
  crud.get_update(id, row_id);
  $("#frmModal input").prop("disabled", true);
  $("#frmModalselect").prop("disabled", true);
  $("#frmModaltextarea").prop("disabled", true);
  $("#frmModal .btn").prop("disabled", true);
  $("#btn_close").prop("disabled", false);
  $("#frmModal").modal("show");
});

function validate(items) {
  if (!items.id) {
    swal("กรุณาระบุID");
    $("#id").focus();
  } else if (!items.organization) {
    swal("กรุณาระบุหน่วยงาน");
    $("#organization").focus();
  } else if (!items.target_type) {
    swal("กรุณาระบุกลุ่มเป้าหมาย");
    $("#target_type").focus();
  } else if (!items.prov) {
    swal("กรุณาระบุจังหวัด");
    $("#prov").focus();
  } else if (!items.amp) {
    swal("กรุณาระบุอำเภอ");
    $("#amp").focus();
  } else if (!items.tambon) {
    swal("กรุณาระบุตำบล");
    $("#tambon").focus();
  } else if (!items.moo) {
    swal("กรุณาระบุหมู่ที่");
    $("#moo").focus();
  } else if (!items.hospname) {
    swal("กรุณาระบุสถานที่ฉีดวัคซีน");
    $("#hospname").focus();
  } else if (!items.hospcode) {
    swal("กรุณาระบุรหัสหน่วยฉีดวัคซีน");
    $("#hospcode").focus();
  } else if (!items.cid) {
    swal("กรุณาระบุเลขบัตรประชาชน");
    $("#cid").focus();
  } else if (!items.prename) {
    swal("กรุณาระบุคำนำหน้า");
    $("#prename").focus();
  } else if (!items.name) {
    swal("กรุณาระบุชื่อ");
    $("#name").focus();
  } else if (!items.lname) {
    swal("กรุณาระบุนามสกุล");
    $("#lname").focus();
  } else if (!items.sex) {
    swal("กรุณาระบุเพศ");
    $("#sex").focus();
  } else if (!items.birth) {
    swal("กรุณาระบุวันเกิด");
    $("#birth").focus();
  } else if (!items.tel) {
    swal("กรุณาระบุเบอร์โทร");
    $("#tel").focus();
  } else if (!items.vaccine) {
    swal("กรุณาระบุรับวัคซีน");
    $("#vaccine").focus();
  } else {
    return true;
  }
}
$("#btn_save_org").on("click", function (e) {
  e.preventDefault();
  var action;
  var items = {};

  // items.brand_name = $("#brand option:selected").text();
  items.id = $("#id").val();
  items.org_name = $("#org_name").val();
  items.tel = $("#tel").val();
  items.ampur = $("#ampur").val();
  items.action = $("#action").val();

  if (validate_org(items)) {
    crud.save_org(items);
  }
});
function validate_org(items) {
  if (!items.org_name) {
    swal("กรุณาระบุหน่วยงาน");
  } else if (!items.ampur) {
    swal("กรุณาระบุอำเภอ");
  } else {
    return true;
  }
}
