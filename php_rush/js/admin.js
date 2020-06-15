jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


   
   
});
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}
function modif_user(id){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "id="+ id + ";"; 
	window.location='users/modif_user.php';	
}
function modifProduct(id){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "prodId="+ id + ";"; 
	window.location='products/modif_product.php';	
}
function modifCatg(id){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "catgId="+ id + ";"; 
	window.location='products/modif_catg.php';	
}
function deluser(id){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "id="+ id + ";"; 
	window.location='users/delete.php';	
}
function delProd(id){
	//setCookie("'id'","'"+id+"'",1);
	//document.cookie = "proid="+ id + ";"; 
	window.location='products/delete.php';	
}
function delCatg(id){
	//setCookie("'id'","'"+id+"'",1);
	//document.cookie = "proid="+ id + ";"; 
	window.location='products/delete.php?catg=true';	
}
function showModal(id,name){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "id="+ id + ";";
	document.cookie = "username="+ name + ";";  
	document.getElementById("confirm").innerHTML ="Are you sure you want to delete the user "+ name +" ?";
	$('#deletemodal').modal('show');
	//window.location='delete.php';	
}
function showModalProd(id,name){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "prodId="+ id + ";";
	document.cookie = "productName="+ name + ";";  
	document.getElementById("confirm").innerHTML ="Are you sure you want to delete the product"+ name +" ?";
	delProd(id);
	//$('#deletemodalProd').modal('show');
	//window.location='delete.php';	
}
function showModalCatg(id,name){
	//setCookie("'id'","'"+id+"'",1);
	document.cookie = "catgId="+ id + ";";
	document.cookie = "catgName="+ name + ";";  
	document.getElementById("confirm").innerHTML ="Are you sure you want to delete  the category"+ name +" ?";
	delCatg(id);
	//$('#deletemodalProd').modal('show');
	//window.location='delete.php';	
}
 /* $(function(){
    $('.modal').on('show.bs.modal', function (e) {
      var button = $(e.relatedTarget)
      var index = button.data('remote')
      $(this).find('delbtn').onclick.="window.location='delete.php?id="+ index+"'")
    })
  })
*/
