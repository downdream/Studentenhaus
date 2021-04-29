<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "studentenhaus");

if(isset($_POST["add_inventar"]))
{
	if(isset($_SESSION["inventar"]))
	{
		$item_array_id = array_column($_SESSION["inventar"], "waren_id");
		if(!in_array($_GET["waren_id"], $item_array_id))
		{
			$count = count($_SESSION["inventar"]);
			$item_array = array(
				'waren_id'				=>	$_GET["waren_id"],
				'waren_name'			=>	$_POST["hidden_name"],
				'waren_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["inventar"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Waren ist schon Addiert")</script>';
		}
	}
	else
	{
		$item_array = array(
			'waren_id'			=>	$_GET["waren_id"],
			'waren_name'			=>	$_POST["hidden_name"],
			'waren_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["inventar"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["inventar"] as $keys => $values)
		{
			if($values["waren_id"] == $_GET["waren_id"])
			{
				unset($_SESSION["inventar"][$keys]);
				echo '<script>alert("Waren entfernt")</script>';
				echo '<script>window.location="inventarhinzu.php"</script>';
			}
		}
	}
}

//if (isset($_POST["inventar_add"])) {
//	$query = "INSERT INTO Auftrag "
//	$inventar__id = msq
//}

?>