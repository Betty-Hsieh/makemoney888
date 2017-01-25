$(function(){
    $(document).on("click",".city",function() {
       var id=$("option:selected", this).val();
       var idx=$(this).index(".city");
       $.ajax({
    	  method: "POST",
    	  url: "/api/Area/get_district",
    	  data:{
    		  id:id,
    	  }
       }).success(function(res){
            var district=res.city[0].road_name;
                district=district.split("|");
            var data="";
            $.each(district, function(idx,val) {
                if(idx!=0){
                    data+="<option value='"+idx+"'>"+val+"</option>";
                }
            });
            $('.district').eq(idx).html(data);
            //console.log(district);
       });
    });
})