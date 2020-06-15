<?php

namespace WebFramework;

use Twig_Environment;
use Twig_Loader_Filesystem;

use WebFramework\ORM;

use App\Helpers\Session;
use App\Helpers\FlashError;

class AppController
{

    private $twig;
    private $orm;
    public $session;
    public $flashError;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem("../App/Views");
        $twig = new Twig_Environment($loader, []);
        $this->twig = $twig;

        $this->orm = ORM::getInstance();
        // TODO: Uncomment this lines in order to link the ORM to the database
        //   specified in the 'db.php' file.
        // $this->orm->connect(require '../config/db.php');

        $this->session = Session::getInstance();
        $this->flashError = FlashError::getInstance();
    }

    /**
     * Render a view.
     *
     * @param string $view - Path of the view to render
     * @param array $context - Associative array used as a TWIG context. (default: [])
     */
    public function render(string $view, array $context = [])
    {
        echo $this->twig->render($view, $context);
    }

    /**
     * Redirect to an URL.
     *
     * @param string $url - Redirection URL.
     * @param string $status - HTTP status code for the redirection.
     */
    public function redirect(string $url, string $status)
    {
        header('Location: ' . $url, true, $status);
    }

}
