<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate_josso;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
include(app_path() . '/josso-php-inc/josso-cfg.inc');
include(app_path() . '/josso-php-inc/class.jossoagent.php');
class SecurityController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Profil Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
        public static function check()
	{

        // var_dump(file_exists(app_path() . '/josso-php-inc/josso-cfg.inc'));exit();
                $_SESSION['JOSSO_ORIGINAL_URL']=url();
                //print $_SESSION['JOSSO_ORIGINAL_URL'];exit;
                $assertionId = input::get('josso_assertion_id');
                $backToUrl = $_SESSION['JOSSO_ORIGINAL_URL'];
                $josso_agent = \jossoagent::getNewInstance();
                $ssoSessionId = $josso_agent->resolveAuthenticationAssertion($assertionId);
                // var_dump($ssoSessionId);exit();
                //$ssoSessionId='FD2A5F4ECE092613763619472061E373';
                // Set SSO Cookie ...
                setcookie("JOSSO_SESSIONID", $ssoSessionId, 0, "/"); // session cookie ...
                $_COOKIE['JOSSO_SESSIONID'] = $ssoSessionId;
                if (isset($backToUrl)) {
                    if (!headers_sent()) {
                        //print "test";exit;
                        ob_end_clean();
                        //Request::url();
                        //header("Location: " . url());
                        return redirect('/');
                        exit;
                    }
                    printf('<HTML>');
                    printf('<META http-equiv="Refresh" content="0;url=%s">', $backToUrl);
                    printf('<BODY onload="try {self.location.href="%s" } catch(e) {}"><a href="%s">Redirect </a></BODY>', $backToUrl, $backToUrl);
                    printf('</HTML>');
                    die();
                }


	}
    public static function logout()
	{
                // Session::put('ketDosen',' ');
                session_start();
                Session::flush();
                \Cookie::forget('JOSSO_SESSIONID');
                if (isset($_SERVER['HTTP_COOKIE'])) {
                    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                    foreach($cookies as $cookie) {
                        $parts = explode('=', $cookie);
                        $name = trim($parts[0]);
                        setcookie($name, '', time()-1000);
                        setcookie($name, '', time()-1000, '/');
                    }
                }

                // Unset all of the session variables.
                $_SESSION = array();

                // If it's desired to kill the session, also delete the session cookie.
                // Note: This will destroy the session, and not just the session data!
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                // Finally, destroy the session.
                session_destroy();
                return redirect()->away('https://akun.um.ac.id/josso/signon/logout.do?josso_back_to='.url('/'));
                
                // return redirect()('/');

	}

}
