<?PHP
session_start();
$_SESSION[$sessionvar]=0;
$username = $_POST['username'];
$password = $_POST['password'];
$contrasinal=md5($password);

require_once("class.phpmailer.php");
require_once("formvalidator.php");

class FGMembersite
{
    var $username;
    var $pwd;
    var $rand_key;
    var $error_message;
    //$sitename = 'index.php';
    function SetWebsiteName($sitename)
    {
    $this->sitename = $sitename;
    }

    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }

    //-------Main Operations ----------------------
    function RegisterUser()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
        
        if(!$this->ValidateRegistrationSubmission())
        {
            return false;
        }
        
        $this->CollectRegistrationSubmission($formvars);
        
        if(!$this->SaveToDatabase($formvars))
        {
            return false;
        }
        return true;
    }

    function ConfirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        return true;
    }    
    
    function Login()
    {
        if(empty($_POST['username']))
        {
            $this->HandleError("UserName is empty!");
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->HandleError("Password is empty!");
            return false;
        }
        
        $username = $_POST['username'];
        $password = $_POST['password'];
		$contrasinal =md5($password);
        
        if(!$this->CheckLoginInDB($username,$contrasinal))
        {
            return false;
        }
        
        
        $_SESSION[$this->GetLoginSessionVar()] = $username;
		$_SESSION[$url=index.php];
		$url = $_SESSION['PrevURL'] = $_SERVER['REQUEST_URI'];
		//$_SESSION[$logueado = FALSE];
        return true;
    }
    
    function CheckLogin()
    {
         session_start();

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }

    function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }

    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }
    
    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }    
    //-------Private Helper functions-----------
    
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }

    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }

    function CheckLoginInDB($username,$password)
    {
    	include 'config.php';
		
        $result=false;
		
		if (($username == $user) && ($password == $pass))
		{
		$result=true;
		$_SESSION[$sessionvar]=1;
		}
        if(!$result==true)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
			$_SESSION[$sessionvar]=0;
        }
        return true;
	}

    function ValidateRegistrationSubmission()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        $validator = new FormValidator();
        $validator->addValidation("name","req","Please fill in Name");
        $validator->addValidation("email","email","The input for Email should be a valid email value");
        $validator->addValidation("email","req","Please fill in Email");
        $validator->addValidation("username","req","Please fill in UserName");
        $validator->addValidation("password","req","Please fill in Password");

        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inpname.':'.$inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }	
}
?>