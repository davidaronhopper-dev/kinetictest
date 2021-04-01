//Part 1

//A callback function is when a function name is passed as a variable through another function. 

function SendMeToTheConsole(value) {
	console.log(value);
}

function calculate(num1, num2, consoleme) {
	let sum = num1 + num2;
	consoleme(sum);
}

calculate(5, 10, SendMeToTheConsole);





//Part 2
let myWorkingArray = ["Item 1", "Item 2", "Item 3"];
let myDeletedArray = [];

function AddToWorkingArray(value, consoleme){
	myWorkingArray.push(value);
	consoleme(myWorkingArray);
}

function DeleteFromWorkingArray(value, consoleme){
	if (myWorkingArray.includes(value)){
		let index = myWorkingArray.indexOf(value);
		let deleteMe = myWorkingArray[index];
		myWorkingArray.splice(index, 1);
		myDeletedArray.push(deleteMe);
		consoleme(myWorkingArray);
		consoleme(myDeletedArray);
	} else {
		consoleme("Item not found");
	}
}

AddToWorkingArray("Kinetic is great", SendMeToTheConsole);





//Part 3

function AreWeAnagrams(val1, val2, consoleme) {
	if (sortMe(val1) === sortMe(val2)){
		consoleme("Yes, we are anagrams!");
	} else {
		consoleme("Nay, we are not");
	}
}
function sortMe(value){
	let step1 = value.split('');
	let step2 = step1.sort();
	let sorted = step2.join('');
	console.log(sorted);
	return sorted;
}