<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.03.16
 * Time: 18:53
 */

class Page extends CI_Controller {

    private $default_template;
    private $data;
    private $template_url;
    private $shortname;

    function __construct()
    {
        parent::__construct();

        $this->load->model('page_model');
    }

    function index($page = "") {
        $this->page = $page;
        $this -> template = "default";
        $this->template_url ="templates/" .$this-> template ."/";
        $this->shortname =$page;
        $this->data = array();


        if(!empty($page)) {
            if ($this->template_exists()) {
                $this->get_data();
                $this -> load -> view($this->template_url. "page", $this->data);

                print_r($this->data);

            } else {
                die("Page template dosn't exists!");
             }
            }else {
                echo "404";
            }
        }


    private function get_data() {
        $this->data =array_merge($this->data, $this ->page_model ->get_data($this->shortname));

    }


    public function hello() {
        echo "Hello2";
    }

    private function template_exists() {
        return file_exists(APPPATH ."views/templates/". $this ->default_template ."/page.php");
    }
}

?>