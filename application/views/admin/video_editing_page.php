<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
    <script type="text/javascript">
        $(document).ready(function () {
            $('#start_date,#end_date').datepicker({
        		changeMonth: true,
             	changeYear: true,
        		dateFormat: "yy-mm-dd",
        		monthNamesShort: ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"]
        	});
         })
     </script> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            編輯影音
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">影音管理</a></li>
            <li class="active">編輯影音</li>
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
					foreach($video as $key => $row){
				?>			  
                <form action="/manager/Video/editing_video" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">影音名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" value="<?php echo $row->product_title;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">開始日期</label>
                       <div class="col-sm-6">
                        <input type="text" id="start_date" class="form-control" name="start_date" value="<?php echo $row->start_date;?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">結束日期</label>
                       <div class="col-sm-6">
                        <input type="text" id="end_date" class="form-control" name="end_date" value="<?php echo $row->end_date;?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">發文者</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="author_id">
                          <option>請選擇</option>
                          <?php 
						  foreach($author as $key => $arow){
						      if($row->author_id==$arow->m_id){
							     echo "<option value='".$arow->m_id."' selected>".$arow->m_name."</option>";
                              }
                              else{
                                 echo "<option value='".$arow->m_id."'>".$arow->m_name."</option>";
                              }
						  }
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">價格</label>
                       <div class="col-sm-6">
                        <input type="number" class="form-control" name="product_price" value="<?php echo $row->product_price;?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">影片網址</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="video" value="<?php echo $row->video;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">影音狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if($row->status==1) echo 'checked="checked"';?>>開啟
                        <input type="radio" name="status" value="0" <?php if($row->status==0) echo 'checked="checked"';?>>關閉

                      </div>
                    </div>
                     
                     <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">產品圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" >
                            <?php echo $row->picture ?>
                            <img src="<?php echo Upload . "products/" . $row->
picture ?>" width="50%"/>
                        </div>
                        
                     </div>                   
                    <textarea id="editor1" name="product_content" rows="10" cols="80"><?php echo $row->product_content;?></textarea>
                    <input type="hidden" name="id"  value="<?php echo $row->products_id;?>">
                  <?php
					}
				  ?>
                    
                    <button type="submit" class="btn btn-primary">編輯影音</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Video'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	<!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo AdminPlugins?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo AdminPlugins?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
