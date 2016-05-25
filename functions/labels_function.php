<?php
function label_compiler($champ_mastery, $champ_name, $player_mastery_sum, $same_team, $other_team) {
	//Champ main
	if ($champ_mastery >= ($player_mastery_sum / 2)) {
		return "<div>" . $champ_name . " Only</div>";
	}
	//Too much
	if ($player_mastery_sum > 500000 && $champ_mastery < 15000) {
		return "<div>Plays everything</div>";
	}
	//Team carry
	if ($champ_mastery >= ($same_team / 2)) {
		return "<div>Team Carry</div>";
	}
	//Priority threat
	if ($champ_mastery >= ($other_team / 2)) {
		return "<div>Priority Threat</div>";
	}
	//Champ god
	if ($champ_mastery >= 80000) {
		return "<div>" . $champ_name . " God</div>";
	}
	//Champ veteran
	if ($champ_mastery > 15000 && $champ_mastery < 80000) {
		return "<div>" . $champ_name . " Veteran</div>";
	}
	//Experienced champ
	if ($champ_mastery > 3000 && $champ_mastery <= 15000) {
		return "<div>Experienced " . $champ_name . "</div>";
	}
	//Champ newbie
	if ($champ_mastery <= 3000) {
		return "<div>" . $champ_name . " Newbie</div>";
	}
};
