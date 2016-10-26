<h4>Instructions: click or tap the box to tick the box</h4>
<h4>Tick the item that you would enjoy do most</h4>

<form method="get" action="{{ action('Student\PersonalityController@set2') }}">
	<input type="checkbox" name="a1" value="1">Repair a car </br>
	<input type="checkbox" name="b2" value="1">Design clothing </br>
	<input type="checkbox" name="c3" value="1">Supervise the work of others </br>
	<input type="checkbox" name="d4" value="1">Work in a science lab </br>
	<input type="checkbox" name="e5" value="1">Help a person with disabilities </br>
	<input type="checkbox" name="f6" value="1">Balance a budget </br>
	<input type="checkbox" name="a7" value="1">Work with animals </br>
	<input type="checkbox" name="b8" value="1">Arrange flowers </br>
	<input type="checkbox" name="c9" value="1">Work in a political campaign </br>
	<input type="checkbox" name="d1" value="1">Study causes of diseases </br>
	<button> Next </button>
</form>