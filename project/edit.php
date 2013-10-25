<?php
require("classes/add_product.class.php");
$obj=new add_product();
$arr_pro="";
$id=0;
//the get checkes whether the users clicked the edit link and sends the link id to add_product.class.php
	if(isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$arr_pro=$obj->select_for_editing($id);
	}
//this form sends all the informtion to the edit method in add_product.class.php which wil update the information stored
if(isset($_POST['editId']))
{
	$editId=$_POST['editId'];
	$name=$_POST['prodName'];
	$price=$_POST['price'];
	$description=$_POST['prodDetails'];
	$category=$_POST['Category'];
	$subcategory=$_POST['subcategory'];
	$obj->edit($name,$price,$description,$category,$subcategory,$editId);
	
	header("Location: Inventory.php");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Product</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
  <form action="edit.php"  method="post" enctype="multipart/form-data"><br />
      <div align="center">
        <h2>Update Product</h2> 
      </div>
  
 <div align="center">  
<table width="369" border="0" align="center">
  <tr>
    <td width="131">Product Name</td>
    <td width="228"> <input type="text" name="prodName" value="<?php echo $arr_pro[0];?>" /></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input type="text" name="price"  value="<?php echo $arr_pro[1];?>"/></td>
  </tr>
  <tr>
    <td>Product Details</td>
    <td><textarea name="prodDetails" cols="16" rows="5"><?php echo $arr_pro[2];?></textarea></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><select name="Category"  value="<?php echo $arr_pro[3];?>">
    <option value="<?php echo $arr_pro[3];?>"><?php echo $arr_pro[3];?></option>
    <option value="book">Books</option>
    <option value="stationeryOffice">Stationery & Office</option>
    <option value="computer">Computers</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>SubCateogry</td>
    <td><select name="subcategory" >
    value="<?php echo $arr_pro[4];?>"
    <option value="<?php echo $arr_pro[4];?>"><?php echo $arr_pro[4];?></option>
    <option value="itProgramming">IT_Programming</option>
    <option value="novel">Novel</option>
    <option value="poetry">Poetry</option>
    <option value="pens">Pens</option>
    <option value="printer">Printer</option>
    <option value="laptop">Laptop</option>
    <option value="speakers">Speakers</option>
	 <option value="mouse">Mouse</option>
    </select></td>
    <tr>
    <td><p>&nbsp;
      </p>
      <p>
      	<input type="hidden" name="editId" value="<?php echo $id; ?>" />
        <input type="submit" value="Edit Product" />
      </p></td>
  </tr>
  
</table>
<br/>
<p align="left"><a href="inventory.php"><img src="images/buttons/back.jpg" /></a></p>
</div>
  </form>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
