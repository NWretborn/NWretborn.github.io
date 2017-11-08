case 'adduser':
			$table='user';
			$curuser = $input['name'];
			if($input['password']){
				$input['password'] = hashpass($input['password']);
			}
			
			badcall($method!='POST', "use POST for adduser"); //NOT SURE IF BADCALL IS GOOD METHOD
			break;
		case 'addwifi':
			$table='markers';
			badcall($method!='POST', "use POST for addwifi");
			break;
		case 'deletewifi':
			badcall($method!='POST', "use POST for deletewifi");
			if(($_SESSION['username'] == $input['user']) or ($_SESSION['username'] == 'admin')){
				$table='markers';
				$id='picurl';
				$key= $input['picurl'];
				$method = 'DELETE';
				break;
			}
			else{
				badcall(True, "Only your own networks can be removed");
				break;
			}
		case 'wifipic':
			errlog("POST picname: ".$_POST['picname']);
			if(isset($_FILE['file']))
				errlog("FILE is set!");
			include('upload.processor.php');
			exit();
			break;
		case 'login':
			badcall($method!='GET', "use GET for login");
			$table='user';
			$id='name';
			break;
		case 'logout':
			errlog("logging out user: ".$_SESSION['username']);
			unset($_SESSION['username']);
			exit();
			break;
		default:
			badcall(True, "not an api-function");
			break;
