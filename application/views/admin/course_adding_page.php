
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo URL_INDEX;?>/js/date.js"></script>
<!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo AdminPlugins?>daterangepicker/daterangepicker.js"></script>
<!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo AdminPlugins?>daterangepicker/daterangepicker-bs3.css">
<script>
$(function () {
    $( "#due_date" ).datepicker(opt);
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        
});
</script>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>新增課程</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">課程管理</a></li>
            <li class="active">新增課程</li>
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
                <form action="/manager/Course/adding_course" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">課程名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" placeholder="課程名稱">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">一般價格</label>
                      <div class="col-sm-3">
                        <input type="numbers" class="form-control" name="product_price" placeholder="一般價格">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">會員價</label>
                      <div class="col-sm-3">
                        <input type="numbers" class="form-control" name="member_price" placeholder="會員價"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">課程類別</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="course_category">
                          <option>請選擇</option>
                          <?php 
						  foreach($course_category as $key => $row){
						      echo "<option value='".$key."'>".$row."</option>";
						  }
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">名額</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name="numbers" placeholder="名額" value="1" min="1">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">課程期間</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="period" id="reservationtime" placeholder="期間">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">地址</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" placeholder="上課地址">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">報名截止日</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="due_date" id="due_date" placeholder="報名截止日">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">連絡電話</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="contact_phone" placeholder="連絡電話">
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">產品圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" placeholder="200*200" >
                        </div>
                        
                     </div>
                    <textarea id="content" name="product_content" rows="10" cols="80"></textarea>
                    
                    <button type="submit" class="btn btn-primary">建立課程</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Course'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	
    <!-- CK Editor -->
    <script src="<?php echo CK;?>/ckeditor.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('content');
      });
    </script>
