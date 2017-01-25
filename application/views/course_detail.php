<script>
$(function(){
    $('.applicant').click(function(){
        let id=$(this).attr("id");
        
        $.ajax({
            url: '/api/member/applicant_course',
            type: 'POST',
            data: {
              id: id,
            },
            error: function(xhr) {
              alert('報名發生錯誤。');
            },
            success: function(res) {
                let data = jQuery.parseJSON(JSON.stringify(res));
                let cartQty=Object.keys(data.cart).length;
                if(cartQty>0){
                    alert("課程加入成功。");
                }else{
                    alert("課程加入失敗。");
                }
            }
        });
    });
})
</script>
	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">課程資訊</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">
			<h3><?php echo $course->product_title;?></h3>       
            價格&nbsp;:&nbsp;<h5><?php echo $course->product_price;?></h5> 
			<div class="editor">
            	<p>
                    <?php echo $course->product_content;?>
                </p>
            </div>
            <div class="text-center">
            <button type="button" class="btn btn-success applicant" id="<?php echo $course->uniqid_id;?>" >報名課程</button></div>
    	</div>
        <br /><br />
	</section>