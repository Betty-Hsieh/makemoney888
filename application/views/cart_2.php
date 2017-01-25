
<script src="<?php echo URL_INDEX;?>/js/area.js"></script>
    <!---網站內容--->
    <section class="main">
		<div class="container">
			<div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 35%">
                	<span class="sr-only">STEP 1 ：購物車</span>
                </div>
                	<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 35%">
                <span class="sr-only">STEP 2 ：填寫購物資訊</span>
                </div>
                <div class="progress-bar progress-bar-danger" style="width: 30%">
                	<span class="sr-only">STEP 3 ：完成訂購</span>
                </div>
            </div>
<form action="/index/cart3" method="post" id="dataform">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3 class="panel-title">付款方式</h3>
                </div>
            	<div class="panel-body">
                	<div class="row">
                    	<div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="paymethod" value="atm" checked="">
                                    ATM匯款
                                </label>
                            </div>
                            <div>
                                <ul>
                                    <li>郵局700 帳號:0101139-0103021<br/>戶名:曾愛雅</li>
                                    <li>轉帳後請填到會員中心填寫轉帳後五碼，或是撥打電話通知公司</li>
                                </ul>
                            </div>    
                        </div>
                        <div class="col-sm-6">
                           <div class="radio">
                                <label>
                                    <input type="radio" name="paymethod" value="shop"/>
                                    到店付款
                                </label>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                    地址 : 桃園市大業路一段342號(竹城新宿社區)<br/>
                                    電話 : 03-3562978、0910007380</li>
                                    <li>週一~週五:上午09:00~晚間19:00   週六:10:00~18:00  週日公休</li>   
                                </ul>
                            </div>     
                        </div>
                    </div>                    
            	</div>
        	</div>
            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3 class="panel-title">購物明細</h3>
                </div>
            	<div class="panel-body">
                	<div class="row">
                        <table class="table table-bordered">
                            <caption></caption>
                            <thead>
                                <tr class="success">
                                    <td>商品名稱</td>
                                    <td>單價</td>
                                    <td>數量</td>
                                    <td>小計</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($order_list['cart'] as $key=>$value){ 
		                        ?>
                                <tr>
                                    <td><?php echo $value['name'];?></td>
                                    <td><?php echo $value['price'];?></td>
                                    <td><?php echo $value['qty'];?></td>
                                    <td><?php echo $value['qty']*$value['price'];?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        商品總計:<?php echo $order_list['order_total'];?><br/>
                                        運費:<?php echo $order_list['shipping'];?><br/>
                                        總計金額:<?php echo $order_list['total'];?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>                    
            	</div>
        	</div>
            
            <!--發票資訊-->
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3 class="panel-title">發票資訊</h3>
                </div>
            	<div class="panel-body">
                	<div class="row">	
						<div class="col-sm-8">
                        
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">開立發票</label>
                                <div class="col-sm-9">
                                    <input type="radio" class="invoice_type" name="invoicetype" value="2" checked/> 二聯式  
                                    <input type="radio" class="invoice_type" name="invoicetype" value="3"  /> 三聯式
                                </div>
                            </div>
                            <br />
                            <div class="form-group invoice_company">
                            	<label for="companyname" class="col-sm-3 control-label">抬頭</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control" name="companyname" />
                                </div>                            
                            </div>
                            
                            <div class="form-group invoice_company">
                            	<label for="companyid" class="col-sm-3 control-label">統一編號</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="companyid" value="" />
                                </div>                            
                            </div>
                               
                        </div>
                     </div> 
                </div>                   
            </div>
            
            <!--收貨人資訊-->
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3 class="panel-title">收貨人</h3>
                </div>
            	<div class="panel-body">
                	<div class="row">
                    <?php 
        				foreach($student as $key => $row){
        			?>	
						<div class="col-sm-8">
                            <h5>收貨人資訊</h5>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">姓名</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="receiver" required=""  value="<?php echo $row->org_name;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label for="inputGender" class="col-sm-3 control-label">稱呼</label>
                                <div class="col-sm-9">
                                    <label class="">
                                        <input type="radio" name="recivegender" value="1" <?php if($row->gender==1) echo "checked";?>/>先生
                                    </label>
                                    <label class="">
                                        <input type="radio" name="recivegender" value="2" <?php if($row->gender==2) echo "checked";?>/>小姐
                                    </label>    
                                </div>                            
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="reciveemail" value="<?php echo $row->org_email;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTel" class="col-sm-3 control-label">手機</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cellphone" name="recivephone" value="<?php echo $row->cellphone;?>" placeholder="請輸入連絡電話">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTel" class="col-sm-3 control-label">電話</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="recivephone2" value="<?php echo $row->phone;?>" placeholder="請輸入連絡電話">
                                </div>
                            </div> 
                            <div class="form-group">
                                
                                <label for="inputAdd" class="col-sm-3 control-label">聯絡地址</label>
                                
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="text" class="form-control" id="address" required=""  name="reciveaddress" value="<?php echo $row->address;?>" placeholder="請輸入地址">
                                </div>
                            </div>       
                        </div>
                     </div>
            <button type="button" id="checkout" class="btn btn-success  pull-right">完成購物</button> 
            <a class="btn btn-default pull-right" href="cart1" role="button">上一步</a>   
                    </div>
                 <?php
					}
				  ?>                    
            	</div>
        	</div>
            
</form>
                             
    	</div>
	</section>
 <script>
 $(function(){
    $('.invoice_company').hide();
    $('.invoice_type').click(function(){
        var inv=$(this).val();
        switch(inv){
            case '2':
                $('.invoice_company').hide();
            break;
            case '3':
                $('.invoice_company').show();
            break;
        }
    });
    
    $('#checkout').click(function(){
        let error_str="";
        let name=$('#name').val();
        let email=$('#email').val();
        let cellphone=$('#cellphone').val();
        let phone=$('#phone').val();
        let address=$('#address').val();
        
        if(name==""){
            error_str+="請填寫收件人姓名。\n";
        }else if(email==""){
            error_str+="請填寫信箱。\n";
        }else if(cellphone=="" && phone==""){
            error_str+="請填寫手機或連絡電話。\n";
        }else if(address==""){
            error_str+="請填寫收件地址。\n";
        }
        
        if(error_str!=""){
            alert(error_str);
        }
        else{
            $('#dataform').submit();
        }
    });
 })
 </script>