<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="loginPageStyle.css">
</head>
<body>

<div class="container">
    <h1>Login</h1>
    <form id="myForm" method="post" action="login.php">
        <input type="text" id="email" name="email" placeholder="email address">
        <p class="error" id="emailError"></p>
        <input type="password" id="password" name="password" placeholder="password">
        <p class="error" id="passwordError"></p>
        <input type="button" onclick="myFunction()" value="Login" id="subm">
    </form>
</div>

<script>
    function myFunction() {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let emailError = document.getElementById("emailError");
        let passwordError = document.getElementById("passwordError");

        let emailTest = 
            email.includes("@") && 
            email.includes(".") &&
            email.indexOf("@") !== 0 &&
            email.indexOf(".") + 1 !== email.length &&
            email.indexOf(".") > email.indexOf("@") &&
            email.indexOf(".") !== email.indexOf("@") + 1;

        let passwordTest = password.length >= 6;


        if(!emailTest){
            emailError.innerText = "email жазылуы дұрыс емес";
        } 
        else{
            emailError.innerText = "";
        }

        if(!passwordTest) {
            passwordError.innerText = "кемінде 6 символ болу қажет!";
        }
        else{
            passwordError.innerText = "";
        }


        if(email.trim() == ""){
            emailError.innerText = "іші босқой";
        }
        if(password.trim() == ""){
            passwordError.innerText = "іші босқой";
        }


        if(emailTest && passwordTest){
            document.getElementById("myForm").submit();
        }
    }
</script>


</body>
</html>