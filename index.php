<?php
$params = array();
if (isset($_GET['year']) && isset($_GET['month'])) {
    $params = array(
        'year' => $_GET['year'],
        'month' => $_GET['month'],
    );
}
$params['url']  = 'index.php';
require_once 'calendar.class.php';
?>

<html>
    <head>
        <title>Calendar</title>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <style type="text/css">
            table.calendar {
                border: 1px solid #050;
            }
            .calendar th, .calendar td {
                width:30px;
                text-align:center;
            }
            .calendar th {
                background-color:#050;
                color:#fff;
            }
            .today{
				color:#fff;
        		background-color:#FFFF00;
            }
        </style>
    </head>
    <body>
    	<script type="text/javascript">
			function add() {
				if (window.upid.innerHTML=="") {
					localStorage.count = 0;
					var hid = document.createElement("input");
					hid.id = "c";
					hid.type = "hidden";
					hid.name = "tasknumber";
					hid.value = 0;
					window.upid.appendChild(hid);
				}
				localStorage.count++;
				
				window.c.value = localStorage.count;
				
				var p = document.createElement("p");
				p.innerHTML = "Task" + window.c.value + ":";
				window.upid.appendChild(p);
				
				var oInput = document.createElement("input");
				oInput.type = "text";
				oInput.name = "task" + window.c.value;
				window.upid.appendChild(oInput);
			}
		</script>
		<?php
			if (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['date'])) {
				$year = $_GET['year'];
				$month = $_GET['month'];
				$date = $_GET['date'];
				echo '<h2>Your scheduled day for your task is '.$month.'/'.$date.'/'.$year.'</h2>';
				echo '<p><h3><a href="index.php">Reset my date</a></h3>';
				echo <<<_END
<form action="email.php" method = "post">
	<p><h3>Your email address:<input type="text" name="email"></h3>
	<p><h3>Goal 1:</h3><textarea name="task" cols="50" rows="5"></textarea>
    <p><h3>Break your goal:</h3>
	<div id="upid"></div>
	<p><input name="plus" type="button" onclick="javascript:add()" value="split it into parts">
	<p><input type="submit" value="submit my task">
</form>
_END;
			} else {
				echo '<h2>Start from choosing your complete day in calendar:</h2>';
				$cal = new Calendar($params);
				$cal->display();
			}
		?>
    </body>
</html>
