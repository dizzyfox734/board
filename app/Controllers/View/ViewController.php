<?php

namespace App\Controllers\View;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class ViewController extends \App\Controllers\BaseController
{
	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
	}

    public function showView($view, $otherData=[], $wrapper = true) {
        $datas = array_merge([
            'viewName' => $view,
        ], $otherData);

        if($wrapper) {
            return view('/common/view_wrapper', $datas);
        } else {
            return view($view, $datas);
        }
    }
}
