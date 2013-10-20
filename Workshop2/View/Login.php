<?php
class LoginForm{
	
	private $data;
	
	public function __construct($data = null){
		if($data){
			$_SESSION['authenticated'] = true;
		}		
	}
	
	// Get login-form
	//
	function userLoginForm($output=null, $outputClass=null) {
	
		if(isset($output)) {
			$output = "<p class='right'><output class='$outputClass'>$output</output></p>";
		}
	
		$disabled = null;
		$disabledInfo = null;
		if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
			$disabled = "disabled";
			$disabledInfo = "<em class='quiet small'>You are logged in, you have to <a href='?p=logout'>log out</a> before you can log in.</em>";
		}
	
		$html = <<<EOD
				<h1>Login</h1>
				<form method="post" action="?p=login">
				  <fieldset>
				    <legend>Login</legend>
				    $output
				    <p>
				      <label for="input1">User Account:</label><br>
				      <input id="input1" class="text" type="text" name="account">
				    </p>
				    <p>
				      <label for="input2">Password:</label><br>
				      <input id="input2" class="text" type="password" name="password">
				    </p>
				    <p>
				      <input type="submit" name="doLogin" value="Login" $disabled>
				      $disabledInfo
				    </p>
				  </fieldset>
				</form>
EOD;
	
		return $html;
	}
	
	
	// -------------------------------------------------------------------------------------------
	//
	// Login the user
	//
	function userLogin() {
		
// 		global $userAccount, $userPassword;
		
// 		// account and password that can login
// 		$userAccount = "doe";
// 		$userPassword = $this->userPassword("doe");
		
		// if form is submitted then try to login
		// $_POST['doLogin'] is related to the name of the login-button
		
		$output=null;
		$outputClass=null;
		
		if(isset($_POST['doLogin'])) {
			if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){
				header('Location: http://localhost/Workshop2/Workshop2/index.php');
			} else {
				$output = "Login failed. Wrong Account or Password.";
				$outputClass = "error";
			}
		}
		return $this->userLoginForm($output, $outputClass);
	}
		
		
		
// 		if(isset($_POST['doLogin'])) {
	
// 			// does account and password match?
// 			if($userAccount === $_POST['account'] && $userPassword === $this->userPassword($_POST['password'])) {
// 				$output = "You are logged in. The menu in the top-right corner has changed.";
// 				$outputClass = "success";
// 				$_SESSION['authenticated'] = true;
				
// 				//$location = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
				
// 				header('Location: http://localhost/Workshop2/Workshop2/index.php');
// 			} else {
// 				$output = "Login failed. Wrong Account or Password.";
// 				$outputClass = "error";
// 			}
//		}
	
// 		return $this->userLoginForm($output, $outputClass);
	
	
	// -------------------------------------------------------------------------------------------
	//
	// Logout the user
	//
	function userLogout() {
		unset($_SESSION['authenticated']);
		header('Location: http://localhost/Workshop2/Workshop2/index.php');
		//return "<h1>Logged Out</h1><p>You have logged out.</p>";
	}
	
	
	// -------------------------------------------------------------------------------------------
	//
	// Generate a password
	//
	function userPassword($password) {
		return sha1($password);
	}
	
	public function RenderLogin(){
		// Check if the url contains a querystring with a page-part.
		$p = null;
		if(isset($_GET["p"]))
		{
			$p = $_GET["p"];
		}
	
		// Is the action a known action?
		$content = null;
		$output = null;
		if($p == "login")
		{
			$title = "Login";
			$content = $this->userLogin();
		}
		else if ($p == "logout")
		{
			$title = "Logout";
			$content = $this->userLogout();
		}
		else
		{
			$title = "Status login / logout";
		}
		
		if (isset($content)) {
			echo $content;;
		} 
		
	}
}
