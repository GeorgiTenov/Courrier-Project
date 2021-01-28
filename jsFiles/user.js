export class User{
  #username;
  #password;

//constructor to set values
    constructor(username,password){
      this.username = username;
      this.password = password;
}

//set username
setUsername(username){
  this.username = username;
}

//get username
    getUsername(){
      return this.username;
    }

//set password
setPassword(password){
  this.password = password;
}

//get password
    getPassword(){
      return this.password;
    }

    //get current characters in username
    getUsernameCharacters(){
      return this.username.length;
    }

    //get current characters in password
    getPasswordCharacters(){
      return this.password.length;
    }

//check if the passed values are verified
    checkUsernameValidation(){
      //min and max username character lengths
      var minUsernameLength = 5;
      var maxUsernameLength = 15;

      //check validation
      if(this.getUsernameCharacters() >= minUsernameLength
      && this.getUsernameCharacters() <= maxUsernameLength){
        return true;
      }return false;

    }

    checkPasswordValidation(){
      //min and max password character lengths
      var maxPasswordLength = 100;
      var minPasswordLength = 5;

      //check validation
      if(this.getPasswordCharacters() >= minPasswordLength
      && this.getPasswordCharacters() <= maxPasswordLength){
        return true;
      }return false;

    }

}
