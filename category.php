<?php
	//if categoryID is not set, redirect back to index page		

		if(!isset($_GET['categoryID'])) {
			header("Location:index.php");
		}
	// select all stock item belongings to the selected categoryID

	$stock_sql="SELECT s.stockID, s.name, s.price, s.thumbnail FROM stock s, category c WHERE s.categoryID=c.categoryID AND s.categoryID=".$_GET['categoryID'];	
	if($stock_query=mysqli_query($dbconnect, $stock_sql)) {
		$stock_rs=mysqli_fetch_assoc($stock_query);
	}
	if(mysqli_num_rows($stock_query)==0)
	{
		echo"sorry , we have no items currently in stock";
	}else{
		?>
		<h1><?php echo $stock_rs['name'];?></h1>
		<?php do {
			?>
			<div class = "item" >
			<a href= "index.php?page=item&stockID=<?php echo $stock_rs['stockID']; ?>">
			<p><img src="images/<?php echo $stock_rs['thumbnail']; ?>" /></p>
			<p><?php echo $stock_rs['name']; ?></p>
			<p>Price $<a href="index.php?page=item&stockID=<?php echo $stock_rs['stockID']; ?>"><?php echo $stock_rs['price']; ?></a></p>
		    </a>
			</div>
		<?php	
		}while ($stock_rs=mysqli_fetch_assoc($stock_query));
		?>
		<?php
	}
?>