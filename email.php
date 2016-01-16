<?php
if (isset($_POST['email']) && isset($_POST['task'])) {
	$email = $_POST['email'];
	$task = $_POST['task'];
}
echo '<h2>';
echo '<p>Thank you for submitting goal1 this week.';
echo '<p>Please set the rest of your goals for this week.';
echo '<p>We will follow up with you on your anticipated date of completion</h2><h3>';
echo '<p>Customer information:';
echo '<p>Submitted email: '.$email;
echo '<p>Submitted goal: '.$task;
$n = $_POST['tasknumber'];
for ($i = 1; $i < $n + 1; $i++) {
	echo '<p>splited task: '.$_POST['task'.$i];
}
echo "<p>Test page still building: Using to send an email...";
echo '</h3>';
?>