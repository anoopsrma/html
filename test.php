<?php
$file = fopen("./uploads/test.rtf","r")or die("Unable to open file!");
$fp = fopen("test.txt","w")or die("Unable to open file!");
$linecount=0;
while(! feof($file))
  {
  
  $line = fgets($file);
  $linecount ++;

  	if ($line[0]=='{' || $line[0]=='\\'|| $line[0]=='}') 
  	{
  		$line='';
  	} 
  	
    else
    {
  		$len = strlen($line);
  		for ($i=0 ; $i < $len  ; $i++ ) 
      { 
  			if ($line[$i]=='"' || $line[$i]=='\\'|| $line[$i]==','|| $line[$i]==':'|| $line[$i]=='-') 
  				{
  					$line[$i]=' ';
            
            
  				} 
  	  }
      fwrite($fp, $line);


  }
}
fclose($file);
fclose($fp);

$ftext = fopen("test.txt","r")or die("Unable to open file!");
while(! feof($ftext))
  {
    $line = fgets($ftext);
    $arr = explode(" ",$line);
    $arraylen = count($arr);
      for ($i=0 ; $i < $arraylen  ; $i++ ) 
      {
        if ($arr[$i]=='Price' and $arr[$i+6]=="Selection")
        {
          $price=$arr[$i+2];
          $select=$arr[$i+8];
          //echo 'Date='.($arr[1]).'-'.($arr[2]).'-'.($arr[3]).'  '.'Price='.($price).'  '.'Selection='.$select.'<br>';
        }

  }
    $line = fgets($ftext);
    $arr = explode(" ",$line);
    $arraylen = count($arr);
      for ($i=0 ; $i < $arraylen  ; $i++ ) 
      {
        if ($arr[$i]=='Vending' and $arr[$i+6]=="Selection")
        {
          $select1=$arr[$i+6];
          //echo 'Date='.($arr[1]).'-'.($arr[2]).'-'.($arr[3]).'  '.'Price='.($price).'  '.'Selection='.$select.'<br>';
        }

      }

    $line = fgets($ftext);
    $arr = explode(" ",$line);
    $arraylen = count($arr);
      for ($i=0 ; $i < $arraylen  ; $i++ ) 
      {
        if ($arr[$i]=='Thank')
        {
          echo "Product Vended\n";
          if ($select) {
          echo 'Date='.($arr[1]).'-'.($arr[2]).'-'.($arr[3]).'  '.'Price='.($price).'  '.'Selection='.$select.'<br>';
       
          }
        }else{
          $flag=1;
        }

      }
  }

  if ($flag==1) {
    echo "No more Products to be vended";
  }
?>