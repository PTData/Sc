<?php

$team = new Team();
$name_team_1 = $team->select_team($id);
echo $name_team_1[1] . '<br/>';
$team->players($id, true);
$strong1 =  $team->team_strong();

?>
