<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => ['controller' => 'Users', 'action' => 'index'],
            'logoutRedirect' => ['controller' => 'Users', 'action' => 'login'],
            'authenticate' => [
                'Form' => ['fields' => ['username' => 'username', 'password' => 'password']]
            ],
            'loginAction' => ['controller' => 'Users', 'action' => 'login'],
            'authorize' => ['Controller'],
            'unauthorizedRedirect' => $this->referer()
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
//$this->loadComponent('Security');
//$this->loadComponent('Csrf');
    }

    public $helpers = [
        'Form' => ['className' => 'Bootstrap.Form'],
        'Html' => ['className' => 'Bootstrap.Html'],
        'Modal' => ['className' => 'Bootstrap.Modal'],
        'Navbar' => ['className' => 'Bootstrap.Navbar'],
        'Paginator' => ['className' => 'Bootstrap.Paginator'],
        'Panel' => ['className' => 'Bootstrap.Panel']
    ];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout']);
    }

    public function isAuthorized($user) {
        return true;
    }

    function uploadFiles($folder, $file, $itemld = null) {
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        if ($itemld) {
            $folder_url = WWW_ROOT . $folder . '/' . $itemld;
            $rel_url = $folder . '/' . $itemld;
            if (!is_dir(folder_url)) {
                mkdir($rel_url);
            }

            $map = array(
                'image/gif' => '.gif',
                'image/jpeg' => '.jpg',
                'image/png' => '.png',
                'application/pdf' => '.pdf',
                'application/msword' => '.doc',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx',
                'application/excel' => '.xls',
                'application/vnd.ms-excel' => '.xls',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => '.xlsx'
            );

            $userfile_extn = substr($file['name'], strrpos($file['name'], '.') + 1);
            if (array_key_exists($file['type'], $map)) {
                $typeOK = true;
            }
//Rename for the file if not change of the upload file makbe duplicate
            $filename = $this->VERSION() . $map[$file['type']];
            if ($typeOK) {
                switch ($file['error']) {
                    case 0:
                        @unlink($folder_url . '/' . $filename); //Delete the file if it already existing
                        $full_url = $folder_url . '/' . $filename;
                        $url = $rel_url . '/' . $filename;
                        $success = move_uploaded_file($file['tmp_name'], $url);
                        if ($success) {
                            $result['urls'][] = '/' . $url;
                            $result['upfilename'][] = $filename;
                            $result['ext'][] = $userfile_extn;
                            $result['origin_name'][] = $file['name'];
                            $result['type'][] = $file['type'];
                        } else {
                            $result['errors'][] = __("Error uploaded {$filename}. Please try again.");
                        }
                        break;
                    case 3:
                        $result['errors'][] = __("Error uploading {$filename}. Please try again.");
                        break;
                    case 4:
                        $result['nofiles'][] = __("No file Selected");
                        break;
                    default:
                        $result['errors'][] = __("System error uploading {$filename}. Contact webmaster.");
                        break;
                }
            } else {
                $permiss = '';
                foreach ($map as $k => $v) {
                    $permiss .= "{$v}, ";
                }
                $result['errors'][] = __("{$filename} cannot be uploaded. Acceptable file types in : %s", trim($permiss, ','));
            }
            return $result;
        }
    }

    public function VERSION() {
        $parts = explode(' ', microtime());
        $micro = $parts[0] * 1000000;
        return(substr(date('YmdHis'), 2) . sprintf("%06d", $micro));
    }

    function UUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

}
