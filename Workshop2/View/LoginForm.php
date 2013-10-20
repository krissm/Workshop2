<?php
class LoginForm{
	
	private $data;
	
	public function __construct($data = null){
		if($data){
			$_SESSION['authenticated'] = true;
		}		
	}
	
	/**
	 * Get login-form
	 * @param string $output 
	 * @param string $outputClass
	 * @return string
	 */
	function userLoginForm($output=null, $outputClass=null) {
	
		if(isset($output)) {
			$output = "<p class='right'><output class='$outputClass'>$output</output></p>";
		}
	
		$disabled = null;
		$disabledInfo = null;
		if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
			$disabled = "disabled";
			//$disabledInfo = "<em class='quiet small'>You are logged in, you have to <a href='?p=logout'>log out</a> before you can log in.</em>";
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
	
	
	/**
	 * Login the user
	 * @return string
	 */
	function userLogin() {
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
			
	/**
	 * Logout the user
	 */
	function userLogout() {
		unset($_SESSION['authenticated']);
		header('Location: http://localhost/Workshop2/Workshop2/index.php');
		//return "<h1>Logged Out</h1><p>You have logged out.</p>";
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
