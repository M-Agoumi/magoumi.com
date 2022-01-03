<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   DefaultController.php                             :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2021/11/13 23:41:33 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2021/11/13 23:41:33 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace Controller;

use Model\User;
use Model\Newsletter;
use Simfa\Framework\Application;
use Simfa\Framework\Request;

class DefaultController extends \Simfa\Action\Controller
{

   public function __construct()
   {
        // TODO implement your Controller
   }

   public function index(Newsletter $newsletter, Request $request)
   {
	   if ($request->isPost())
	   {
			$newsletter->loadData($request->getBody());
			$newsletter->getOneBy('email', $newsletter->getEmail());
			if (!$newsletter->getId()) {
				$newsletter->setStatus(1);
				$token = openssl_random_pseudo_bytes(64);
				$token = bin2hex($token);
				$newsletter->setToken($token);
				if ($newsletter->validate() && $newsletter->save())
					$message = '<h5>you have subscribed in our newsletter succesfully</h5>';
			} else {
				if (!$newsletter->getStatus()) {
					$newsletter->setStatus(1);
					$newsletter->update();
					$message = '<h5>you have subscribed in our newsletter succesfully</h5>';
				} else
					$message = '<h5>you are already subscribed, Thank You</h5>';
			}
	   }

	   return render('home', ['newsletter' => $newsletter, 'message' => $message ?? false]);
   }

//   public function login(Request $request)
//   {
//	   if (!Application::isGuest())
//		   return Application::$APP->response->redirect('/');
//
//	   $user = new User();
//	   if ($request->isPost()) {
//			$user->loadData($request->getBody());
//
//			$login = User::findOne([
//				'username' => $user->getUsername(),
//				'password' => $user->getPassword() // don't forget to encrypt your passwords folk, thi is just a test
//				]);
//
//			if ($login->getId()) {
//				Application::$APP->login($login, '/');
//			}else
//				$user->addError('username', 'username or password is wrong');
//
//			$user->setPassword('');
//	   }
//
//	   return render('login', ['user' => $user]);
//   }
//
//   public function logout()
//   {
//	   Application::logout('/');
//   }
}
