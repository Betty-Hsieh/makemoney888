    <!---網站內容--->
	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">最新消息</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">  
			<h3><?php echo $news->title;?></h3>       
			<div class="editor">
            	<p>
                    <?php echo $news->content;?>
                </p>
            </div>
    	</div>
	</section>