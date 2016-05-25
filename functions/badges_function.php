<?php
function badge_compiler($champion_mastery, $same_team, $other_team) {
	//pogchamp
	if ($champion_mastery >= 80000) {
		return '<a href="#" data-toggle="tooltip" title="PogChamp! You are the kid on the block who plays for keeps. No ones pogs are safe. If they dont know already, they are about to after this game. You dont let limits or rules stop your quest of mastery. In fact, you have more than doubled the required experience necessary for rank 5 mastery."><img src="imgs/pogchamp.png"></a>';
	}
	//minglee
	elseif ($champion_mastery > 3000 && $champion_mastery < 80000) {
		return '<a href="#" data-toggle="tooltip" title="Just like twitch admins, we are unsure if you are here to help us, or ban us. You have played enough to get rank 5 mastery. But have yet to reach PogChamp level. You can either be a God, or freelo. You control your own destiny and we pray you are the latter."><img src="imgs/minglee.png"></a>';
	}
	//catface
	elseif ($champion_mastery <= 3000) {
		return '<a href="#" data-toggle="tooltip" title="Wow.... Our cat is as scared of your mastery score as we are. You havent mastered anything yet. If Mister Miyagi was still around, we would have him teach you the ways of APM. But keep playing and practicing. One day, you could be as good as imaqtpie.... Kappa."><img src="imgs/lirikN.png"></a>';
	}
	//biblethump
	elseif ($champion_mastery >= $same_team) {
		return '<a href="#" data-toggle="tooltip" title=""><img src="imgs/biblethump.png"></a>';
	}
	//kappa
	elseif ($champion_mastery >= $other_team) {
		return '<a href="#" data-toggle="tooltip" title=""><img src="imgs/KappaOriginal.png"></a>';
	}
};
