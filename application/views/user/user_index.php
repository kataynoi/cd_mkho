
<div id="page-wrapper">
    <br>
    <div class="row">

<div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">
                   <?php
                    foreach($user as $r){
                        echo "<a href='#' class='list-group-item'><i class='fa fa-user-plus fa-fw'></i> ".$r->name."
                                    <span class='pull-right text-muted small'><em>4 minutes ago</em>
                                    </span></a>";
                    }
                   ?>
            </div>
            <!-- /.list-group -->
            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
        </div>
        <!-- /.panel-body -->
    </div>
        </div>
    </div>
<script src="<?php echo base_url() ?>assets/apps/js/users.js" charset="utf-8"></script>
