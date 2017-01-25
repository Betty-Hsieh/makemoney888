
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
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30, 
        locale: {
            applyLabel: '確認',
            cancelLabel: '取消',
            fromLabel: '從',
            toLabel: '到',
        }
    });    
});
</script>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            編輯課程
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">課程管理</a></li>
            <li class="active">編輯課程</li>
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
			  
                <form action="/manager/course/editing_course" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">課程名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" value="<?php echo $course->product_title; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">期間</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="period" id="reservationtime" value="<?php echo $course->period; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">一般價格</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="product_price" value="<?php echo $course->product_price; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">會員價</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="member_price" value="<?php echo $course->member_price; ?>" placeholder="會員價"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">課程類別</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="author_id">
                          <option>請選擇</option>
                          <?php 
						  foreach($course_category as $key => $arrow){
						      if($course->category==$arrow->m_id){
							     echo "<option value='".$key."' selected>".$arrow."</option>";
                              }
                              else{
                                 echo "<option value='".$key."'>".$arrow."</option>";
                              }
						  }
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">名額</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name="numbers" min="1" value="<?php echo $course->numbers;?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">報名截止日</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="due_date" id="due_date" value="<?php echo $course->due_date; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">聯絡電話</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" name="contact_phone" value="<?php echo $course->contact_phone; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">地址</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $course->address; ?>">
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if ($course->status == 1) echo 'checked="checked"'; ?>>開啟
                        <input type="radio" name="status" value="0" <?php if ($course->status == 0) echo 'checked="checked"'; ?>>關閉

                      </div>
                    </div>
                    <div class="form-group">
                        <label for="picture_for" class="col-sm-1 control-label">產品圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture_for" />
                            <img src="<?php echo Upload."products/".$course->picture; ?>" width="50%" alt="<?php echo $course->picture; ?>" >
                        </div>
                     </div>
                     <br />                   
                    <textarea id="editor1" name="product_content" rows="10" cols="80"><?php echo $course->product_content; ?></textarea>
                    <input type="hidden" name="uniqid_id"  value="<?php echo $course->uniqid_id; ?>" >

                    <br />
                    <button type="submit" class="btn btn-primary">編輯課程</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/course'">取消</button>
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
      });
    </script>
