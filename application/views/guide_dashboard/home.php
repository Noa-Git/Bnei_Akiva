<?php
?>
<h4>הפעילויות הקרובות</h4>
<html>
<body>
<?php
foreach ($next_activity_is as $row) {
	echo "['" . $row->ttime . "', " . $row->street . "', " . $row->street_num . "],";
}
?>
</body>
</html>
