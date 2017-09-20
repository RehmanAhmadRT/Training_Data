 <?php
class ClassA{

	function ClassA(){
		$this->x = "10";
	}

	function decrement(){
		$this->x--;
	}
}

$objA = new ClassA();
if($objA->x < 0){
	echo "The value is less than zero";
}
else{
	echo "The value is greater than zero so we will loop through the value";
	while($objA->x >0){
		echo "<br>";
		echo "$objA->x";
		$objA->decrement();
	}
	echo "<br>Now From for loop";
	for($i = 1; $i <= 10 ; $i++ ){
		echo "<br>";
		echo "$i";
		
	}

}

 ?> 