<?php
//the admin is able to add new products so thaat they can b showen on the product_list.php for the users
require("classes/add_product.class.php");
$obj=new add_product();
$msg="";
session_start();
if(!isset($_SESSION['manager']))
{
	header("Location: admin_login.php");	
	session_destroy();
	exit;	
}

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$msg = "Do you want to delete the following product '$id'? "."<a href='Inventory.php?yes=$id'>yes</a>"." || "."<a href='Inventory.php?no=$id'>No</a>";
	//exit;

}
	if(isset($_GET['yes']))
	{
		$id_del=$_GET['yes'];
		$obj->deleteProduct($id_del);	
	}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	
$name=$_POST['prodName'];
$price=$_POST['price'];
$description=$_POST['prodDetails'];
$category=$_POST['Category'];
$subcategory=$_POST['subcategory'];
//$file=$_POST['fileField'];



$id =$obj->add($name,$price,$description,$category,$subcategory);
$newname="$id.jpg";
move_uploaded_file($_FILES["fileField"]["tmp_name"],"images/$newname");
}
$out=$obj->all();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inventory List</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--


-->
</style>
</head>

<body>

<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
  <form action="Inventory.php" method="post" enctype="multipart/form-data">
    <div id="Layer28" align="center">
	<h2> Add Product</h2>
	<table width="405" border="0" align="center">
   <tr>
    <td>Product Image</td>
    <td><p>
      <input type="file" name="fileField" />
    </p>
   </td>
  </tr>
  <tr>
    <td width="98">Product Name</td>
    <td width="278"> <input type="text" name="prodName" /></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input type="text" name="price" /></td>
  </tr>
  <tr>
    <td>Product Description</td>
    <td><textarea name="prodDetails" cols="16" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><select name="Category">
	<option value></option>
    <option value="book">Books</option>
    <option value="stationeryOffice">Stationery & Office</option>
    <option value="computer">Computers</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>SubCateogry</td>
    <td><select name="subcategory">
	<option value></option>
    <option value="itProgramming">IT_Programming</option>
    <option value="novel">Novel</option>
    <option value="poetry">Poetry</option>
    <option value="pens">Pens</option>
    <option value="printer">Printer</option>
    <option value="laptop">Laptop</option>
    <option value="speakers">Speakers</option>
	 <option value="mouse">Mouse</option>
	 
	</select></td>
  </tr>
 
    <tr>
    <td><p><br/>
        <input type="submit" value="Save Product" />
      </p></td>
  </tr>
</table>
</div>
<div id="Layer29">
   			 
     			 <br/>
     			 <h2>Inventory List</h2>
    <?php echo $out;?>
	</div>
	<div>
	  <p><?PHP echo $msg; ?></p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p><a href="index_admin.php"><img src="images/buttons/back.jpg" width="157" height="33" /></a></p>
	</div>
  </form> 
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
