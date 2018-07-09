<?php
include_once ("../db/conexion.php");

$req = 
                    "
                        SELECT tags_books FROM books;
                    ";

                    $raw = $conexion->query($req);
					
while ($data = $raw->fetch_assoc())
    {
	$tags=explode(" ",$data['tags_books']);
	for($i=0;$i<count($tags);$i++)
		{
		if(!empty($tags[$i]))
			{
			$first_letter=strtoupper(substr($tags[$i],0,1));
			if(isset($t[$first_letter]) AND !empty($t[$first_letter]))
				{
				$j=count($t[$first_letter]);
				}
			else
				$j=0;
			$t[$first_letter][$j]=$tags[$i];
			}
		}
	}
$tab=array();
for($k='A';$k<='Z';$k++)
	{
	if(isset($t[$k]) AND !empty($t[$k]))
		{
		echo "<h3>".$k."</h3>";
		sort($t[$k], SORT_NATURAL | SORT_FLAG_CASE);
		foreach($t[$k] as $value)
			{
			$value=mb_strtolower($value,'UTF-8');
			if (!in_array($value, $tab))
				{
			    $tab[]=$value;
				echo $value.'<br>';
				}
			}
		echo '<br>';
		}
	}
?>