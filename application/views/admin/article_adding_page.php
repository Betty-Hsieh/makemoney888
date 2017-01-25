      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            建立文章
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">文章管理</a></li>
            <li class="active">建立文章</li>
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
                <form action="/manager/Article/adding_article" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">標題</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="title" placeholder="標題">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">發文者</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="author">
                          <option>請選擇</option>
                          <?php 
						  foreach($author as $key => $row){ 
							  echo "<option value='".$row->m_id."'>".$row->m_name."</option>";
						  }
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">文章類別</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="article_tag">
                          <option value="">請選擇</option>
                          <?php 
						  		$category_data=unserialize($category->fvalue2);
								foreach($category_data as $key => $data){
							  		echo "<option value='".$key."'>".$data."</option>";
								}
					 	 ?>
                          <option value="psy">投資心理學</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">文章權限</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="article_status">
                          <option value="1">開啟</option>
                          <option value="0">關閉</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">閱讀權限</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="read_status">
                          <option value="1">全部公開</option>
                          <option value="3">上課學員</option>
                          <option value="2">一般學員</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">本文分類</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="article_type">
                          <option value="general" selected="">一般文章</option>
                          <option value="keynote">本周觀盤重點</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">代表圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" placeholder="200*200" >
                        </div>
                     </div>
                    
                    <textarea id="editor1" name="content" rows="10" cols="80"></textarea>
                    
                    <button type="submit" class="btn btn-primary">建立文章</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Article'">取消</button>
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
        CKEDITOR.replace('editor1',{
            height: '800px',
        });
      });
    </script>
