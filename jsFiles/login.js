import { User } from './user.js';

//get button
var btn = document.getElementById("form");
//not successfull login
var wrongMessage = document.getElementById("wrongLogin");

var user;

btn.addEventListener("submit",function(e){

  var username = document.getElementById("username").value;

  var password = document.getElementById("password").value;

  user = new User(username,password);

  checkLogin(e,user);

  emptyInputs();

});

//check if input is valid
function checkLogin(e,user){
  if(typeof(user) !== "undefined"){
    if(user.checkUsernameValidation() && user.checkPasswordValidation()){
      console.log("success!!!");
    }else{
      e.preventDefault();
      wrongMessage.style.display = "block";
    }
  }else{
    console.log(user);
  }
}

//empty input boxes after button click
function emptyInputs(){
  var username = document.getElementById("username").value ="";

  var password = document.getElementById("password").value = "";
}
