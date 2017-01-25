	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">客戶見證</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">
        	<div class="index_list">
                <h3>客戶見證</h3>
                <div class="row">   
                    <?php 
					  foreach($share as $pk => $share_row){
					?>
					<div class="share_box col-sm-3">
                        <a href="/index/sharing_detail/<?php echo $share_row->uniqid_id;?>">
                            <h5 class="title"><?php echo $share_row->title;?></h5>
                            <p class="txt"><?php echo $share_row->content;?></p>
                            <button type="button" onclick="location.href='/index/sharing_detail/<?php echo $share_row->uniqid_id;?>'" class="btn btn-sm btn-default">more</button>
                        </a>
                    </div>
					<?php 
					  }
					?>
                    
                </div>
            </div>
    	</div>
	</section>