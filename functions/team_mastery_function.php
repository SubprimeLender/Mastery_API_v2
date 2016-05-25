<?php
/*Function team_mastery()
*@param $match_teams[0] or $match_teams[1]
*@return total mastery points of inputed team
*/
function team_mastery($match_team) {
	$team_total = array();
	foreach($match_team as $k) {
		$current_champ_id = $k["Champion"];
		$team_total[] = $k["CMastery"][$current_champ_id];
	};
	return array_sum($team_total);	
};