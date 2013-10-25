<?php
require("classes/sql_scripts.class.php");

class shopping_cart extends sql_commands
{
	private $total;
	private $obj;
	//this method recieves a variable sended by a form called cart.php and sends the value to the method called shopping_cart return the information from the database and sends the information to cart.php
	function cart($session)
	{
		$cart_info="";
		$this->obj=new sql_commands();
		foreach($session as $name =>$value)
		{
			if($value>0)
			{
				if(substr($name,0,5)=="cart_")
				{
					$id=substr($name,5,(strlen($name)-5));
					$cart_info.=$this->obj->shopping_cart($id)."<td>".$value."</td><td><a href='cart.php?add=$id'>[Add]</a> <a href='cart.php?sub=$id'>[subtract]</a> <a href='cart.php?remov=$id'>[remove]</a></td></tr>";					
					$this->total+= $this->obj->total_cost($id,$value);
		
				}
				
			}
		
	
		}
		return $cart_info;	
	}
	
	//this method display the order by recieving a session variable and sends the value to shopping_cart returning an information to a form called order.php
	function order_display($session)
	{
		$cart_info="";
		$this->obj=new sql_commands();
		foreach($session as $name =>$value)
		{
			if($value>0)
			{
				if(substr($name,0,5)=="cart_")
				{
					$id=substr($name,5,(strlen($name)-5));
					$cart_info.=$this->obj->shopping_cart($id)."<td>".$value."</td>";					
					$this->total+= $this->obj->total_cost($id,$value);
		
				}
				
			}
		
	
		}
		return $cart_info;	
	}
	
	//the method sends the total to the cart.php form and displays it
	function total_cost_to_pay()
	{
		$t=$this->total;
		$vat=$t*0.14;
		return "<br/><br/>"."Overall Total: R".$this->total."<br/> VAT: R".$vat;	
	}
	//return amount due
	function cost()
	{
		return $this->total;	
	}
	
	//call a method that captures the current order
	function order($id,$total_cost,$total)
	{
		return $this->obj->captureOrder($id,$total_cost,$total);
	}
	
	//invokes the method called order_items from sql_scripts.class.php to store the orders items in a database
	function order_items($id,$session)
	{
		$this->obj->order_item($id,$session);
	}
	
}



?>