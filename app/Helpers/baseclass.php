<?php

    function changeUserToSql_DateFromat($sqldate)
	{
		// From DD/MM/YYYY
		$date1 = substr($sqldate, 0, 2);
		$month1 = substr($sqldate, 3, 2);
		$year1 = substr($sqldate, 6, 4);

		// To YYYY-MM-DD
		$newdate = $year1 . "-" . $month1 . "-" . $date1;
		return $newdate;
	}
	function changeSqlToUser_DateFromat($sqldate)
	{
		// To YYYY-MM-DD
		$date1 = substr($sqldate, 8, 2);
		$month1 = substr($sqldate, 5, 2);
		$year1 = substr($sqldate, 0, 4);

		// From DD/MM/YYYY
		$newdate = $date1 . "-" . $month1 . "-" . $year1;
		return $newdate;
	}
?>