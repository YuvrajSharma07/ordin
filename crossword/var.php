<html>
<body onload="initializeScreen()">
    <?php
    function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
    ?>
    <form method="post" action=""><table id="puzzle"></table>
        <input class="btn" type="submit" value="Submit" name="submit">
        <input type="text" name="usermail" id="usrmail" value="ha@ga.com">
        <input type="text" name="usercode" id="usrcode" value="A">
    </form>
    <button class="btn timerbtn">button</button><br>
    <button class="btn timerstop">stop</button><br>
    <div class="timer" id="timer">00:00:00</div>
    <script src="easytimer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    //Globals
var currentTextInput;
var puzzleArrayData;
var usrmail;
var usrcode;
var timetaken;
var username;
var ucode;
var timet;
//Loads the Crossword
function initializeScreen(){
	var puzzleTable = document.getElementById("puzzle");
	puzzleArrayData = preparepuzzleArray();
	for ( var i = 0; i < puzzleArrayData.length ; i++ ) {
		var row = puzzleTable.insertRow(-1);
		var rowData = puzzleArrayData[i];
		for(var j = 0 ; j < rowData.length ; j++){
			var cell = row.insertCell(-1);
			if(rowData[j] != 0){
				var txtID = String('txt' + '_' + i + '_' + j);
                var nameID = String(i + '_' + j);
				cell.innerHTML = '<input type="text" class="inputBox form-control" maxlength="1" style="text-transform: lowercase" ' + 'id="' + txtID + '" onfocus="textInputFocus(' + "'" + txtID + "'"+ ')" name="' + nameID + '">';
			}else{
				cell.style.backgroundColor  = "black";
			}
		}
	}
	addHint();
}
//Adds the hint numbers
function addHint(){
	document.getElementById("txt_0_2").placeholder = "1";
	document.getElementById("txt_1_2").placeholder = "1";
	document.getElementById("txt_0_7").placeholder = "2";
	document.getElementById("txt_1_0").placeholder = "3";
	document.getElementById("txt_3_12").placeholder = "4";
	document.getElementById("txt_4_6").placeholder = "5";
	document.getElementById("txt_4_15").placeholder = "6";
	document.getElementById("txt_6_10").placeholder = "7";
	document.getElementById("txt_7_3").placeholder = "8";
	document.getElementById("txt_9_5").placeholder = "9";
	document.getElementById("txt_9_14").placeholder = "10";
	document.getElementById("txt_10_14").placeholder = "11";
	document.getElementById("txt_12_10").placeholder = "12";
	document.getElementById("txt_15_6").placeholder = "13";
	document.getElementById("txt_16_16").placeholder = "14";
	document.getElementById("txt_17_10").placeholder = "15";
	document.getElementById("txt_17_20").placeholder = "16";
	document.getElementById("txt_20_10").placeholder = "17";
	document.getElementById("txt_22_18").placeholder = "18";
	document.getElementById("txt_25_17").placeholder = "19";
}
//Stores ID of the selected cell into currentTextInput
function textInputFocus(txtID123){
	currentTextInput = txtID123;
}
//Returns Array
function preparepuzzleArray(){
var items = [	[0, 0, 'j', 0, 0, 0, 0, 'h', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             ['s', 'h', 'o', 'c', 'k', 'l', 'e', 'y', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 'n', 0, 0, 0, 0, 'd', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 'y', 0, 0, 0, 0, 'r', 0, 0, 0, 0, 'i', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 'i', 0, 0, 0, 'h', 'o', 'n', 'g', 'm', 'e', 'n', 'g', 'o', 's', 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 'v', 0, 0, 0, 0, 'g', 0, 0, 0, 0, 'f', 0, 0, 'o', 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 'e', 0, 0, 0, 0, 'e', 0, 0, 'w', 0, 'i', 0, 0, 'n', 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 'i', 'p', 'h', 'o', 'n', 'e', 0, 'a', 0, 'n', 0, 0, 'y', 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 'o', 0, 0, 'r', 0, 'i', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 'g', 'p', 's', 0, 0, 'n', 0, 't', 0, 'm', 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'e', 0, 'y', 0, 'a', 'p', 'o', 'l', 'l', 'o', '1', '1', 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'r', 0, 'w', 0, 'r', 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'b', 'l', 'a', 'c', 'k', 'p', 'a', 'n', 't', 'h', 'e', 'r', 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'r', 0, 'r', 0, 'z', 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'o', 0, 0, 0, 'u', 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 'b', 'e', 'a', 't', 's', 0, 0, 0, 'c', 0, 0, 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 'b', 0, 0, 0, 0, 0, 0, 0, 'k', 0, 'l', 0, 0, 0, 0, 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 'k', 0, 0, 0, 's', 't', 'e', 'v', 'e', 'w', 'o', 'z', 'n', 'i', 'a', 'k', 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'r', 0, 'g', 0, 0, 0, 'p', 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'g', 0, 'a', 0, 0, 0, 'p', 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 't', 'i', 'm', 'b', 'e', 'r', 'n', 'e', 'r', 's', 'l', 'e', 'e', 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'p', 0, 0, 0, 'e', 0, 0, 0], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a', 0, 'm', 'a', 'c', 'p', 'r', 'o'], //
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'u', 0, 0, 0, 'a', 0, 0, 0],
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'l', 0, 0, 0, 'r', 0, 0, 0],
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'o', 'l', 'e', 'd', 0, 0, 0]
			];
return items;
}
//Clear All Button
function clearAllClicked(){
	currentTextInput = '';
	var puzzleTable = document.getElementById("puzzle");
	puzzleTable.innerHTML = '';
    initializeScreen();
}
//Check button
function checkClicked(){
	for ( var i = 0; i < puzzleArrayData.length ; i++ ) {
		var rowData = puzzleArrayData[i];
		for(var j = 0 ; j < rowData.length ; j++){
			if(rowData[j] != 0){
				var selectedInputTextElement = document.getElementById('txt' + '_' + i + '_' + j);
				if(selectedInputTextElement.value != puzzleArrayData[i][j]){
					selectedInputTextElement.style.backgroundColor = '#fd7214';
					
				}else{
					selectedInputTextElement.style.backgroundColor = 'white';
				}
			}
		}
	}
}
//Clue Button
function clueClicked(){
	if (currentTextInput != null){
		var temp1 = currentTextInput;
		var token = temp1.split("_");
		var row = token[1];
		var column = token[2];
		document.getElementById(temp1).value = puzzleArrayData[row][column];
		//checkClicked();
	}
}
//Solve Button
function solveClicked(){
	if (currentTextInput != null){
		var temp1 = currentTextInput;
		var token = temp1.split("_");
		var row = token[1];
		var column = token[2];
		
		// Print elements on top
		for(j = row; j >= 0; j--){
			if(puzzleArrayData[j][column] != 0){
				document.getElementById('txt' + '_' + j + '_' + column).value = puzzleArrayData[j][column];
				}else break;
		}
		// Print elements on right
		for(i = column; i< puzzleArrayData[row].length; i++){
			if(puzzleArrayData[row][i] != 0){
				document.getElementById('txt' + '_' + row + '_' + i).value = puzzleArrayData[row][i];
				}else break;
		}
		
		// Print elements below
		for(m = row; m< puzzleArrayData.length; m++){
			if(puzzleArrayData[m][column] != 0){
				document.getElementById('txt' + '_' + m + '_' + column).value = puzzleArrayData[m][column];
				}else break;
		}
		// Print elements on left
		for(k = column; k >= 0; k--){
			if(puzzleArrayData[row][k] != 0){
				document.getElementById('txt' + '_' + row + '_' + k).value = puzzleArrayData[row][k];
				}else break;
		}
		// Done!
		
	}
}
    function onSubmit(){
        usrmail = $("#usrmail").val();
        usrcode = $("#usrcode").val();
        timetaken = document.getElementById('timer').innerHTML;
        for ( var i = 0; i < puzzleArrayData.length ; i++ ) {
		var rowData = puzzleArrayData[i];
    }
}
    var timer = new easytimer.Timer();
    $('.timerbtn').click(function (){
        timer.start();
    });
    $('.timerstop').click(function () {
        timer.stop();
        onSubmit();
    });
    timer.addEventListener('secondsUpdated', function (e) {
        $('.timer').html(timer.getTimeValues().toString());
    });
    
</script>
    
    </body>
</html>