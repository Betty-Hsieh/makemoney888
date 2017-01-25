$(document).ready(function(){
    let opt={
        dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
        dayNamesMin:["日","一","二","三","四","五","六"],
        monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        prevText:"上月",
        nextText:"次月",
        weekHeader:"週",
        changeMonth: true,
        changeYear: true,
        yearRange: "1960:2016",
        showMonthAfterYear:true,
        dateFormat:"yy-mm-dd"
    };
	$( "#birthday" ).datepicker(opt);
    
    $('.register').click(function(){
		var user_name=$('#user_name').val();
        var gender=$('input[name=gender]:checked').val();
        
        var birthday=$('#birthday').val();
        var user_email=$('#user_email').val();
        var user_password=$('#user_password').val();
        var tel=$('#tel').val();
        var address=$('#address').val();
        
        if(user_name==""){
            alert("請輸入您的姓名。");
            return false;
        }
        else if(gender=="" || typeof gender === 'undefined'){
            alert("請選擇您的性別。");
            return false;
        }
        else if(birthday==""){
            alert("請輸入您的生日。");
            return false;
        }
        else if(user_email==""){
            alert("請輸入您的信箱。");
            return false;
        }
        else if(user_password==""){
            alert("請輸入您的密碼。");
            return false;
        }
        else if(tel==""){
            alert("請輸入您的電話。");
            return false;
        }
        else if(address==""){
            alert("請輸入您的地址。");
            return false;
        }else{
               $.ajax({
            	  method: "POST",
            	  url: "/index/register/",
            	  data:{
            		  user_name:user_name,
                      gender:gender,
                      birthday:birthday,
                      user_email:user_email,
                      user_password:user_password,
                      tel:tel,
                      address:address,
            	  }
               }).success(function(res){
                    var data = jQuery.parseJSON(res);
            		if(data.res==1){
        				alert("註冊成功。");
        				location.href= "/index";
        				$('#registerpanel').modal('hide');
        				$('#loginpanel').modal('show');
        			}else if(data.res==0){
        				alert("註冊失敗。");
        			}else if(data.res==4){
        			     alert("此組信箱已經有人使用，請換一組進行註冊。");
        			}
               });
        }
    });
    
	$('.login').click(function(){
	    var email=$('#email').val();
        var password=$('#password').val();
       $.ajax({
    	  method: "POST",
    	  url: "/index/login/",
    	  data:{
    		  email:email,
              password:password,
    	  }
       }).success(function(res){
            var data = jQuery.parseJSON(res);
            //console.log(obj);
            if(data.transation==1){
                alert(data.name+" 歡迎您。");
                $('#loginpanel').modal('hide');
    			location.reload();
            }
            else{
                alert("請確認您的帳號及密碼再進行登入。");
                return false;
            }
       });
    });
    
    $(document).on('click', '.additem', function(event){
		var product = $(".additem");
		var uniqid = $(this).data("product");
        var ordernumber=$('#number').val();
        var product_detail=$('#product_detail').val();
        
        if(ordernumber==""){
            ordernumber=1;
        }
       $.ajax({
    	  method: "POST",
    	  url: "/index/adding_item/",
    	  data:{
    		  uniqid:uniqid,
              order_number:ordernumber,
              product_detail:product_detail
    	  }
       }).success(function(res){
            var obj = jQuery.parseJSON(res);
			alert(obj.name+" 成功加入購物車。");
			$('.badge').text(obj.total_items);
       });
    });
    
    $('.order_cancel').click(function(){
	   var id = $(this).attr("id");
       $.ajax({
    	  method: "POST",
    	  url: "/index/order_cancel/",
    	  data:{
    		  id:id,
    	  }
       }).success(function(res){
            location.reload();
       });
    });
});

  
 
