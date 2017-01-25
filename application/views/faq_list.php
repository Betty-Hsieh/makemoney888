	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">FAQ</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">
			<h3>FAQ</h3>        
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <?php 
              	foreach($faq as $fk => $faqrow){ ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="<?php echo "heading".$fk;?>">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo "#collapse".$fk;?>" aria-expanded="true" aria-controls="<?php echo "collapse".$fk;?>" >
                          <?php echo $faqrow->title; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="<?php echo "collapse".$fk;?>" class="panel-collapse collapse <?php echo($fk==0)?"in":"";?>" role="tabpanel" aria-labelledby="<?php echo "heading".$fk;?>">
                      <div class="panel-body">
                       <?php echo $faqrow->content; ?>
                      </div>
                    </div>
                </div>
             <?php }?>
            </div>
    	</div>
	</section>