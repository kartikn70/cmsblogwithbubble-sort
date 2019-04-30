<?php
$Connection = mysqli_connect('localhost','kartik','Extremis70','cms');

 $result = mysqli_query($Connection,"SELECT username FROM registration");
$sort = Array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $sort[] =  $row['username'];
		print_r($sort);
}
$temp=0;
for($i=0;$i<count($sort);$i++)
{
	for($j=0;$j<count($sort)-1;$j++)
	{
		if($sort[$j]>$sort[$j+1])
		{
			$temp=$sort[$j];
			$sort[$j]= $sort[$j+1];
			$sort[$j+1]=$temp;
		}
	}
}
print_r($sort);
 ?>