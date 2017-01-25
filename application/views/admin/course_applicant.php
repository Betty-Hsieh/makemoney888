
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>
      <?php include_once("left_menu_bar.php");?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            課程管理
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">課程</a></li>
            <li class="active">課程名單</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <?php 
                        echo $course->product_title; 
                    ?>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>學員編號</th>
                        <th>學員名稱</th>
                        <th>聯絡信箱</th>
                        <!--
                        <th>聯絡電話</th>
                        -->
                        <th>行動電話</th>
                        <th>地址</th>
                        <th>報名時間</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($applicant as $key => $row){
						      //$phone=(!empty($row->phone))? $row->phone:'';
                              $cell_phone=(!empty($row->cellphone))? $row->cellphone:'';
							  echo "<tr>";
                              echo "<td>".$row->org_mid."</td>";
							  echo "<td>".$row->receiver."</td>";
							  echo "<td>".$row->email."</td>";
                              echo "<td>".$cell_phone."</td>";
							  echo "<td>".$row->send_address."</td>";
                              echo "<td>".$row->create_time."</td>";
							  echo "</tr>";
						  }
					  ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
<!-- DataTables -->
<script src="<?php echo AdminPlugins?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins?>datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
