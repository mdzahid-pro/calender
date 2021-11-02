<?php
	/*for($i=1;$i<13;$i++){
		echo show_month_calender("0$i",'2020');
	}*/
	echo "<h2 style='color:white;text-align:center;font-family:arial;'>Calendar 2020</h2>";
	echo "<div class='calender'>";
	
	
	echo show_month_calender('01','2020');
	echo show_month_calender('02','2020');
	echo show_month_calender('03','2020');
	echo show_month_calender('04','2020');
	echo show_month_calender('05','2020');
	echo show_month_calender('06','2020');
	echo show_month_calender('07','2020');
	echo show_month_calender('08','2020');
	echo show_month_calender('09','2020');
	echo show_month_calender('10','2020');
	echo show_month_calender('11','2020');
	echo show_month_calender('12','2020');
	echo "</div>";
	function show_month_calender($month,$year){
		//Arrya to cantain abbreation of days of week
		$days_of_week = ['S','M','T','W','T','F','S'];
		//get frist day of the given month
		$first_day_of_month = mktime(0,0,0,$month,1,$year);
		
		//get total days of this month 
		$days_of_this_month = date('t',$first_day_of_month);
		
		//get information for the first day of the month
		$date_elements = getdate($first_day_of_month);
		
		//get the name of the month
		$month_name = $date_elements['month'];
		
		//get first day number of the month
		$first_day_of_week = $date_elements['wday'];
		
		//start the table tag and day headers 
		$calendar = "<table class='calendar'>";
		$calendar .= "<caption>$month_name</caption>";
		$calendar .= "<tr>";
		
		//show of the day abbrevions as header
		foreach($days_of_week as $day){
			$calendar .= "<th class='header'>$day</th>";
		}
		
		//now create the calendar body
		$current_day = 0;
		$calendar .= "</tr><tr>";
		
		if($first_day_of_week  > 0){
			$calendar .= "<td colspan='$first_day_of_week'>&nbsp;</td>";
		}
		$month = str_pad($month,2,"0",STR_PAD_LEFT);
		
		while($current_day <= $days_of_this_month){
			//if seveneth column (saturday) reached start a new row
			if($first_day_of_week == 7){
				$first_day_of_week = 0;
				$calendar .= "</tr><tr>";
			}
			
			$current_day_actual = str_pad($current_day,2,"0",STR_PAD_LEFT);
			$date = "$year-$month-$current_day_actual";
			$calendar .= "<td class='day' rel=".$date.">".$current_day."</td>";
			
			//update counter
			$current_day++;
			$first_day_of_week++;
		}
		
		//manage the row of the last week in month
		if($first_day_of_week != 7){
			$remaining_days = 7 - $first_day_of_week;
			$calendar .= "<td colspan='$remaining_days'>&nbsp;</td>";
		}
		
		$calendar .= "</tr>";
		
		//close the table
		$calendar .= "</table>";
		
		return $calendar;
	}
	
	?>
	
	<style>
		body{
			background:#333;
			padding: 40px 0;
		}
	
		.calender{
			display:flex;
			flex-wrap:wrap;
			justify-content:space-around;
		}
		
		.calender table{
			width: 30%;
			height: 250px;
			border:1px solid #ddd;
			background:#ddd
		}
		
		.calender table td{
			text-align:center;
			border:0.5px solid #333;
			transition:0.2s;
		}
		
		.day:hover{
			background: #607D8B!important;
			color: white;
		}
		
		table caption{
			width:100%;
			height:40px;
			background:skyblue;
			margin-top:10px;
			line-height:40px;
			color:#ddd;
			font-size:18px;
			text-transform:uppercase;
			font-weight:700;
			font-family:arial;
			color:#666;
		}
	</style>