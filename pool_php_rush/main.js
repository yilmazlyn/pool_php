$(document).ready(function(){

    $(document).on("click", ".__del_user", function(){
		var id= $(this).attr("data-id")
        console.log(id);
		$.ajax({
			url:"server.php",
			type:"POST",
			data:{
				action:"delete_user",
				user_id:id
			},
			success:function(r){
				if(r=="YES"){
                    $ele.fadeOut().remove();
                }else{
                    console.log(r);
                    alert("can't delete the row")
                }
			}
        })

	})

	$(document).on("click", ".__del_product", function(){
		var id= $(this).attr("data-id")
        console.log(id);
		$.ajax({
			url:"server.php",
			type:"POST",
			data:{
				action:"delete_product",
				user_id:id
			},
			success:function(r){
				if(r=="YES"){
                    $ele.fadeOut().remove();
                }else{
                    console.log(r);
                    alert("can't delete the row")
                }
			}
        })

	})


})

