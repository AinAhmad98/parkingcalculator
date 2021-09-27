<?php 

function day ($days){
			$day=stripcslashes($days["day"]);

			
					if ($day=='monday') {
						$day=1;
					}else if ($day=='tuesday') {
						$day=2;
					}else if ($day=='wednesday') {
						$day=3;
					}else if ($day=='thursday') {
						$day=4;
					}else if ($day=='friday') {
						$day=5;
					} else if ($day=='saturday') {
						$day=6;
					} else if ($day =='sunday') {
						$day=7;
					 } 
				return $day;
}		

function weekdayparked ($data){ //This function is for weekdays (A)


		$exit=stripcslashes($data["exit"]); //y
		$enter=stripcslashes($data["entrance"]); //x
		$enter_typo=($data["enter_typography"]);
		$exit_typo=($data["exit_typography"]);

//This is the conversion of entrance hour into 24 hour system
		if ($enter_typo==1) { //AM
			$enter=$enter;
		}else
		if ($enter_typo==2) { //PM
			$enter=$enter+12;
		}
//This is the conversion of exit hour into 24 hour system
		if ($exit_typo==1) { //AM
			$exit=$exit;
		}else
		if ($exit_typo==2) { //PM
			$exit=$exit+12;
		}

		
//Calculation for totalhour
			if ($exit>$enter) {
			$totalhour=$exit-$enter; 
		} else 
			if ($exit<$enter) {
			$totalhour=(24+$exit)-$enter;

		} else 
			if ($exit=$enter){
			$totalhour=24;
		}



// ********************************************************************
		if ($enter>24 || $exit>24) {
			echo "<script>
			alert ('A FALSE. Invalid value entered. Please try again!');
			</script> "; 
		}
		
//Calculation for fee start
		if ($totalhour<=2){ //Park only 2 hour, no matter what the entrance and exit hour
			// $fee=5;
			echo "<script>
			alert ('AA. Your fee is RM 5');
			</script> ";
		} else 
		if($enter<=6 && $exit<=8 && $totalhour<=7){ //Enter and exit before 8
			$newtotalhour=$totalhour-2;
			$fee=($newtotalhour*4)+5;
			echo "<script>
			alert ('AB. Your fee is RM $fee');
			</script> ";

		} else 
		if($enter<=6 && $exit<=17 && $totalhour<=17){ // Enter before 8 and exit during office hour on the same day
            $feeforx= 8-($enter+2);       
            $fee=(($exit-8)*3)+($feeforx*4)+5; 
            echo "<script>
			alert ('Ac. Your fee is RM $fee');
			</script> ";
		} else 
		if ($enter ==7 && $exit<=17 && $totalhour<=17) { // Enter before office hour at 7, exit during office hour on the same day
            $fee=(($exit-9)*3)+5;
            echo "<script>
			alert ('AD. Your fee is RM $fee');
			</script> ";
		} else 
		if ($enter<=6 && ($exit>=18 && $exit<=24) && $totalhour<=24) { 
		//Enter before office hour, exit after office hour on the same day
            $feeforx= 8-($enter+2);
            $fee=(($exit-17)*4)+27+($feeforx*4)+5;
            echo "<script>
			alert ('AE. Your fee is RM $fee');
			</script> ";
		}  else 
		if( $enter<=6 && $exit<=24 && $exit<=$enter){ //Enter before office hour, exit before office hour on the next day
            $feeforx=8-($enter+2);
            $fee=($exit*4)+27+28+($feeforx*4)+5;
            echo "<script>
			alert ('AF. Your fee is RM $fee');
			</script> ";
		} else 
		if( $enter==7 && ($exit>=18 && $exit<=24) && $totalhour<=24){ //Enter before office hour at 7, exit after office hour on the same day
            $feeforx=5+24; 
            $fee=(($exit-17)*4)+$feeforx;
            echo "<script>
			alert ('AG. Your fee is RM $fee');
			</script> ";
		} else
		if($enter==7 && $exit<=$enter) { //Enter before office hour at 7, exit before office hour on the next day
			$feeforx=5+24+28;
            $fee=($exit*4)+$feeforx;
            echo "<script>
			alert ('AH. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15)&& $exit<=17 && $totalhour<=9){ //Enter during office hour, exit during office hour
			$newtotalhour=$totalhour-2;
            $fee=($newtotalhour*3)+5;
             echo "<script>
			alert ('AI. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15) && ($exit>=18 && $exit<=24) && $totalhour<=16) {// Enter during office hour, exit after office hour on the same day
            $feeforx=17-($enter+2);
            $fee= (($exit-17)*4)+ ($feeforx*3)+5;
            echo "<script>
			alert ('AJ. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15) && ($exit<=8 && $exit<=$enter) && $totalhour<=24) { //Enter during office hour, exit BEFORE office hour on the next day
			$feeforx=17-($enter+2);
            $fee=($exit*4) +28 + ($feeforx*3)+ 5;
            echo "<script>
			alert ('AK. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15) && $exit>=8 && $exit<=$enter && $totalhour<=24) { //Enter during office hour, exit DURING office hour on the next day
			$feeforx=17-($enter+2);
            $fee=(($exit-8)*3)+32+28+($feeforx*3)+5;
            echo "<script>
			alert ('AL. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=17 && $enter<=22) && $exit>=17 && $exit<=$enter){ //Enter after office hour , exit after office hour on the next day.
			// Operation P terpaksa naik atas Operation M, if not, controller will operate operation M eventho the condition is condition P
            $feex=24-($enter+2);
            $fee=(($exit-17)*4)+32+27+($feex*4)+5;
            echo "<script>
			alert ('AP. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=17 && $enter<=22) && ($exit>=18 && $exit>=$enter)){ //Enter after office hour, exit before 24 on the same day
            $feex= $exit-($enter+2);
            $fee=($feex*4)+5;
            echo "<script>
			alert ('AM. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=17 && $enter<=22) && $exit<=8 && $exit<=$enter) { //Enter after office hour, exit before office hour on the next day
			$feex=24-($enter+2);
            $fee= ($exit*4)+($feex*4)+5;
            echo "<script>
			alert ('AN. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=17 && $enter<=22) &&  $exit<=17 && $exit<=$enter) { //Enter after office hour, exit during office hour on the next day
			$feeforx=24-($enter+2);
            $fee=(($exit-8)*3)+32+($feeforx*4)+5;
            echo "<script>
			alert ('AO. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==16 && ($exit>=18 && $exit<=24)) { //Enter during office hour at 16, exit after office hour on the same day
			$fee= (($exit-18)*4)+5;
            echo "<script>
			alert ('AQ. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==16 && $exit<=8 && $exit<=$enter) { //Enter during office hour at 16, exit before office hour on the next day
			$fee=($exit*4)+24+5;
			echo "<script>
			alert ('AR. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==16 && $exit>=8  && $exit<=$enter) { //Enter during office hour at 16, exit during office hour on the next day
			$fee=(($exit-8)*3)+32+24+5;
			echo "<script>
			alert ('AS. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==23 && $exit<=8 && $exit<=$enter) { //Enter after office hour at 23, exit before office hour on the next day
			// We declare 23 specifically because the calculatin messed up since it will start with 1 back.
			$fee=(($exit-1)*4)+5;
			echo "<script>
			alert ('AT. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==23 && $exit<=17 && $exit<=$enter) { //Enter after office hour at 23, exit during office hour on the next day
			// We declare 23 specifically because the calculatin messed up since it will start with 1 back.
			$fee=(($exit-8)*3)+28+5;
			echo "<script>
			alert ('AU. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==23 && $exit<=24 && $exit<=$enter) { //Enter after office hour at 23, exit after office hour on the next day
			// We declare 23 specifically because the calculatin messed up since it will start with 1 back.
			$fee=(($exit-17)*4)+27+28+5;
			echo "<script>
			alert ('AV. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==24 && $exit<=8 && $exit<=$enter) { //Enter after office hour at 24, exit before office hour on the next day
			// We declare 24 is so that it is represented as 00:00. So that the calculation really include at 00:00
			$fee=(($exit-2)*4)+5;
			echo "<script>
			alert ('AW. Your fee is RM $fee');
			</script> ";
		} else
		 if ($enter==24 && $exit<=17 && $exit<=$enter) { //Enter at 24, exit during office hour on the next day.
		// We declare 24 is so that it is represented as 00:00. So that the calculation really include at 00:00
			$fee=(($exit-8)*3)+24+5;
			echo "<script>
			alert ('AX. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==24 && $exit<=24 && $exit<=$enter) { //Enter at 24, exit after office hour on the next day.
			// We declare 24 is so that it is represented as 00:00. So that the calculation really include at 00:00
			$fee= (($exit-17)*4)+27+24+5;
			echo "<script>
			alert ('AY. Your fee is RM $fee');
			</script> ";
		}

return true;
}

function fridayparked ($data1){ //This function is for Friday (B)
		$exit=stripcslashes($data1["exit"]); //y
		$enter=stripcslashes($data1["entrance"]); //x
		$enter_typo=($data1["enter_typography"]);
		$exit_typo=($data1["exit_typography"]);

//This is the conversion of entrance hour into 24 hour system
		if ($enter_typo==1) { //AM
			$enter=$enter;
		}else
		if ($enter_typo==2) { //PM
			$enter=$enter+12;
		}
//This is the conversion of exit hour into 24 hour system
		if ($exit_typo==1) { //AM
			$exit=$exit;
		}else
		if ($exit_typo==2) { //PM
			$exit=$exit+12;
		}
		

//Calculation for totalhour
			if ($exit>$enter) {
			$totalhour=$exit-$enter; 
		} else 
			if ($exit<$enter) {
			$totalhour=(24+$exit)-$enter;

		} else 
			if ($exit=$enter){
			$totalhour=24;
		}

// ********************************************************************
		if ($enter>24 || $exit>24) {
			echo "<script>
			alert ('B FALSE. Invalid value entered. Please try again!');
			</script> "; 
		} else

		
//Calculation for fee start
		if ($totalhour<=2){ //Park only 2 hour, no matter what the entrance and exit hour
			// $fee=5;
			echo "<script>
			alert ('BA. Your fee is RM 5');
			</script> ";
		} else 
		if($enter<=6 && $exit<=8 && $totalhour<=7){ //Enter and exit before 8
			$newtotalhour=$totalhour-2;
			$fee=($newtotalhour*4)+5;
			echo "<script>
			alert ('BB. Your fee is RM $fee');
			</script> ";

		} else 
		if($enter<=6 && $exit<=17 && $totalhour<=17){ // Enter before 8 and exit during office hour on the same day (Still Friday)
            $feeforx= 8-($enter+2);       
            $fee=(($exit-8)*3)+($feeforx*4)+5; 
            echo "<script>
			alert ('BC. Your fee is RM $fee');
			</script> ";
		} else 
		if ($enter ==7 && $exit<=17 && $totalhour<=17) { // Enter before office hour at 7, exit during office hour on the same day (Still Friday)
            $fee=(($exit-9)*3)+5;
            echo "<script>
			alert ('BD. Your fee is RM $fee');
			</script> ";
		} else 
		if ($enter<=6 && ($exit>=18 && $exit<=24) && $totalhour<=24) { 
		//Enter before office hour, exit after office hour on the same day (Still Friday)
            $feeforx= 8-($enter+2);
            $fee=(($exit-17)*4)+27+($feeforx*4)+5;
            echo "<script>
			alert ('BE. Your fee is RM $fee');
			</script> ";
		}  else 
		if( $enter<=6 && $exit<=24 && $exit<=$enter && $totalhour<=24){ //Enter before office hour, exit before office hour on the next day (On Saturday)
            $feeforx=8-($enter+2);
            $fee=($exit*2)+27+28+($feeforx*4)+5;
            echo "<script>
			alert ('BF. Your fee is RM $fee');
			</script> ";
		} else 
		if( $enter==7 && ($exit>=18 && $exit<=24) && $totalhour<=17){ //Enter before office hour at 7, exit after office hour on the same day (Still Friday)
            $feeforx=5+24; 
            $fee=(($exit-17)*4)+$feeforx;
            echo "<script>
			alert ('BG. Your fee is RM $fee');
			</script> ";
		} else
		if($enter==7 && $exit<=7 && $totalhour<=24) { //Enter before office hour at 7, exit before office hour on the next day/ $exit<=7 (On Saturday)
			$feeforx=5+24+28;
            $fee=($exit*2)+$feeforx;
            echo "<script>
			alert ('BH. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15)&& $exit<=17 && $totalhour<=9){ //Enter during office hour, exit during office hour (Still Friday)
			$newtotalhour=$totalhour-2;
            $fee=($newtotalhour*3)+5;
             echo "<script>
			alert ('BI. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15) && ($exit>=18 && $exit<=24) && $totalhour<=16) {// Enter during office hour, exit after office hour on the same day (Still Friday)
            $feeforx=17-($enter+2);
            $fee= (($exit-17)*4)+ ($feeforx*3)+5;
            echo "<script>
			alert ('BJ. Your fee is RM $fee');
			</script> ";
		} else
		if (($enter>=8 && $enter<=15) && ($exit>=$enter || $exit<=$enter) && $totalhour<=24) { //Enter during office hour, exit on the next day // Tak kisah exit pukul berapa pun (On Saturday)
			$feeforx=17-($enter+2);
            $fee=($exit*2) +28 + ($feeforx*3)+ 5;
            echo "<script>
			alert ('BK. Your fee is RM $fee');
			</script> ";
		}else
		if (($enter>=17 && $enter<=22) && $exit<=$enter && $totalhour<=24) { //Enter after office hour, exit on the next day (On Saturday) // N-before | O-during | P-after office hour
			$feex=24-($enter+2);
            $fee= ($exit*2)+($feex*4)+5;
            echo "<script>
			alert ('BN. Your fee is RM $fee');
			</script> ";
		}else
		if (($enter>=17 && $enter<=22) && ($exit>=18 && $exit>=$enter && $exit<=24) && $totalhour<=7){ //Enter after office hour, exit before 24 on the same day (Still Friday)
            $feex= $exit-($enter+2);
            $fee=($feex*4)+5;
            echo "<script>
			alert ('BM. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==16 && ($exit>=18 && $exit<=24)) { //Enter during office hour at 16, exit after office hour on the same day || Before 24 (Still Friday)
			$fee= (($exit-18)*4)+5;
            echo "<script>
			alert ('BQ. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==16 && $exit<=$enter && $totalhour<=24) { //Enter during office hour at 16, exit before office hour on the next day (On Saturday) // R-Before | S-During office hour
			$fee=($exit*2)+24+5;
			echo "<script>
			alert ('BR. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==23 && $exit<=$enter && $totalhour<=24) { //Enter after office hour at 23, exit before office hour on the next day (On Saturday) // T-Before | U-During | V-After 
			// We declare 23 specifically because the calculatin messed up since it will start with 1 back.
			$fee=(($exit-1)*2)+5;
			echo "<script>
			alert ('BT. Your fee is RM $fee');
			</script> ";
		} else
		if ($enter==24 && $exit<=$enter && $totalhour<=24) { //Enter after office hour at 24, exit on the next day (On saturday) // W-before | X-during | Y-after office hour
			// We declare 24 is so that it is represented as 00:00. So that the calculation really include at 00:00
			$fee=(($exit-2)*2)+5;
			echo "<script>
			alert ('BW. Your fee is RM $fee');
			</script> ";
		}

return true;


}



function saturdayparked ($data2){ // This function is for saturday
			$exit=stripcslashes($data2["exit"]); //y
			$enter=stripcslashes($data2["entrance"]); //x
			$enter_typo=($data2["enter_typography"]);
		    $exit_typo=($data2["exit_typography"]);


//This is the conversion of entrance hour into 24 hour system
		if ($enter_typo==1) { //AM
			$enter=$enter;
		}else
		if ($enter_typo==2) { //PM
			$enter=$enter+12;
		}
//This is the conversion of exit hour into 24 hour system
		if ($exit_typo==1) { //AM
			$exit=$exit;
		}else
		if ($exit_typo==2) { //PM
			$exit=$exit+12;
		}


//Calculation for totalhour
			if ($exit>$enter) {
			$totalhour=$exit-$enter; 
		} else 
			if ($exit<$enter) {
			$totalhour=(24+$exit)-$enter;

		} else 
			if ($exit=$enter){
			$totalhour=24;
		}

//Calculation for fee start
    		$fee=$totalhour*2;
    		echo "<script>
			alert ('CA. Your fee is RM $fee');
			</script> ";

			return true;
}

function sundayparked ($data3){
			$exit=stripcslashes($data3["exit"]); //y
			$enter=stripcslashes($data3["entrance"]); //x
			$enter_typo=($data3["enter_typography"]);
			$exit_typo=($data3["exit_typography"]);


//This is the conversion of entrance hour into 24 hour system
		if ($enter_typo=='1') { //AM
			$enter=$enter;
		}else
			$enter=$enter+12;
		
//This is the conversion of exit hour into 24 hour system
		if ($exit_typo=='1') { //AM
			$exit=$exit;
		}else
			$exit=$exit+12;
		


//Calculation for totalhour
			if ($exit>$enter) {
			$totalhour=$exit-$enter; 
		} else 
			if ($exit<$enter) {
			$totalhour=(24+$exit)-$enter;

		} else 
			if ($exit=$enter){
			$totalhour=24;
		}

//Calculation for fee start
		if ($exit>$enter){ //Enter and exit on the same day
			$fee=$totalhour*2;
			echo "<script>
			alert ('DA. Your fee is RM $fee');
			</script> ";
		} else
		if ($exit<=$enter && $exit<=8) { //Enter on Sunday, exit on Monday before office hour 
			$feeforx=24-$enter;
			$fee=($exit*4)+($feeforx*2);
			echo "<script>
			alert ('DB. Your fee is RM $fee');
			</script> ";
		} else
		if ($exit<=$enter && $exit<=17) { //Enter on Sunday, exit on Monday during office hour
			$feeforx=24-$enter;
			$fee=(($exit-8)*3)+32+($feeforx*2);
			echo "<script>
			alert ('DC. Your fee is RM $fee');
			</script> ";
		} else
		if ($exit<=$enter && $exit<=24) { //Enter on Sunday, exit on Monday after office hour
			$feeforx=24-$enter;
			$fee=(($exit-17)*4)+27+32+($feeforx*2);
			echo "<script>
			alert ('DD. Your fee is RM $fee');
			</script> ";
		}else
		echo "<script>
			alert ('DE. Invalid value entered!');
			</script> ";


return true;


}


 ?>