<div class="left">
     
     <script type="text/javascript">
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
</script>

<div id="my_menu" class="sdmenu">
	
	
      
	<div class="collapsed">
		<span>User management</span>
		 <a href="usermember.php">User management</a>
	</div>
	<div class="collapsed">
		<span>Order management</span>
		 <a href="dingdan.php">Order management</a>
	</div>    
 	
	
 	<div class="collapsed">
		<span>Comment management</span>
		<a href="pinglun.php">Comment management</a>
	</div>
<div class="collapsed">
		<span>Category Management</span>
		
        <a href="fenleiadd.php">Add Product Category</a>
        <a href="fenlei.php">Clothing Category List</a>
	</div>
<div class="collapsed">
		<span>News Management</span>
		<a href="newsadd.php">Publish News</a>
		<a href="news.php">News List</a>

	</div>
<div class="collapsed">
		<span>Product Management</span>
		<a href="addgoods.php">Add Product</a>
        <a href="goods.php">Modify/Delete Product</a>
        
	</div>
<div >
		<span>Admin Center</span>
		<a href="changeadmin.php">Modify Password</a>
	</div>
</div>

     </div>
     <div class="Switch"></div>
     <script type="text/javascript">
	$(document).ready(function(e) {
    $(".Switch").click(function(){
	$(".left").toggle();
	 
		});
});
</script>