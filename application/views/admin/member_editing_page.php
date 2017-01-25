
      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯成員</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">成員管理</a></li>
            <li class="active">編輯成員</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                <?php
foreach ($member as $key => $row) {
?>			  
                <form action="/manager/member/editing_member" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">姓名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="m_name" value="<?php echo
$row->m_name; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">Email</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="m_email" value="<?php echo $row->m_email; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">密碼</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="m_password" value="<?php echo $row->m_password; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">權限</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="pid">
                          <option>請選擇</option>
                          <?php 
								foreach($access as $key => $data){
								    if($data->pid==$row->permissions_id){
								        echo "<option value='".$data->pid."' selected>".$data->m_memberLimit."</option>";
								    }
                                    else{
                                        echo "<option value='".$data->pid."' >".$data->m_memberLimit."</option>";
                                    }
								    
								}
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">個人照片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" >
                            <?php echo $row->picture ?>
                            <img src="<?php echo Upload . "teacher/" . $row->
picture ?>" width="50%"/>
                        </div>
                     </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if ($row->
status == 1)
        echo 'checked="checked"'; ?>>開啟
                        <input type="radio" name="status" value="0" <?php if ($row->
status == 0)
        echo 'checked="checked"'; ?>>關閉

                      </div>
                    </div>                   
                    
                    <textarea id="introduction" name="introduction" rows="10" cols="80"><?php echo
$row->introduction; ?></textarea>
                    <br />
                    <input type="hidden" name="id"  value="<?php echo $row->
m_id; ?>">
                  <?php
}
?>
                    
                    <button type="submit" class="btn btn-primary">編輯成員</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/member'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	<!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo AdminPlugins ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo AdminPlugins ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('introduction');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
