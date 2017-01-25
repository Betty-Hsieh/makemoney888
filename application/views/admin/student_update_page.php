
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            編輯會員
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">會員管理</a></li>
            <li class="active">編輯會員</li>
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
					foreach($student as $key => $row){
				?>			  
                <form action="/manager/Students/edit_student" class="form-horizontal" method="post">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">會員姓名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_name" value="<?php echo $row->org_name;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">帳號</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_email" value="<?php echo $row->org_email;?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">密碼</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_password" value="<?php echo $row->org_password;?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                         <label for="title" class="col-sm-1 control-label">手機門號</label>
                         <div class="col-sm-6">
                                <input class="form-control" type="text" name="cellphone" value="<?php echo $row->cellphone;?>"/>
                         </div>
                    </div>
                    <!--                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">電子報接收</label>
                      <div class="col-sm-2">
                        <select class="form-control" name="epaper_status">
                          <option value="1">開啟</option>
                          <option value="0">關閉</option>
                        </select>
                      </div>
                    </div>
                    -->
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">性別</label>
                       <div class="col-sm-6">
                        <input type="radio" name="gender" value="1" <?php if($row->gender==1) echo 'checked=""';?>/>男性&nbsp;&nbsp;
                        <input type="radio" name="gender"  value="2" <?php if($row->gender==2) echo 'checked=""';?>/>女性
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">客戶分類</label>
                       <div class="col-sm-6">
                        <select name="classtype">
                            <option value="">請選擇</option>
                            <?php
                            foreach($cus_type as $ck =>$cv){
                                if($cv->id==$row->classtype){
                                    echo '<option value="'.$cv->id.'" selected>'.$cv->title.'</option>';
                                }else{
                                    echo '<option value="'.$cv->id.'">'.$cv->title.'</option>';
                                }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if($row->status==1) echo 'checked=""';?>/>審核通過&nbsp;&nbsp;
                        <input type="radio" name="status"  value="2" <?php if($row->status==2) echo 'checked=""';?>/>關閉用戶
                      </div>
                    </div>
                     <div class="form-group">
                         <label for="title" class="col-sm-1 control-label">住址</label>
                         <div class="col-sm-6">
                                <input class="form-control" type="text" name="address" value="<?php echo $row->address;?>"/>
                         </div>
                    </div>                 
                    <input type="hidden" name="id"  value="<?php echo $row->org_mid;?>">
                  <?php
					}
				  ?>
                    
                    <button type="submit" class="btn btn-primary">編輯會員</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Students'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

