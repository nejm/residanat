<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $data = [];
        if (isset($_SESSION['id'])) {
            redirect("admin/dashboard");
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'trim|required');
        $this->form_validation->set_rules('pass', 'Mot de passe', 'trim|required');

        if ($this->form_validation->run() !== false) {
            if (isset($_SESSION['id'])) {
                redirect('admin/dashboard');
            }
            $this->load->model('admin_model');
            $res = $this
                ->admin_model
                ->verify(
                    $this->input->post('login'),
                    $this->input->post('pass')
                );
            if ($res !== false) {
                $_SESSION['id'] = "1";
                $_SESSION['name'] = $this->input->post('login');
                redirect('admin/dashboard');
            } else {
                $data['msg'] = "<div class='alert alert-danger'>
                <a class='close'' data-dismiss='alert'>x</a>
                <strong>Error !</strong>
                Login ou mot de passe invalide</div>";
            }
        }
        $this->load->view("administration/login", $data);
    }

    function dashboard()
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        $this->load->model('etudiant_model');
        $this->load->model('specialite_model');
        $moyennes=[];
        $data['nombre'] = $this->etudiant_model->getNbr();
        $data['places'] = $this->specialite_model->getSum();
        $data['spec']=$this->specialite_model->getAll();
        $data['choix']=$this->etudiant_model->getNbrMadeChoice();
        //$data['test'] = $this->etudiant_model->getByMoy(13.5,14);
        for($i=12;$i<17;$i=$i+2)
        {
            $j=$i+1;
            $moyennes["$i-$i.5"] = $this->etudiant_model->getByMoy($i,$i+(1/2));
            $moyennes["$i.5-$j"] = $this->etudiant_model->getByMoy(($i+(1/2)),$i+1);
        }
        $data['moyenne'] = $moyennes;
        $this->load->view("administration/dashboardheader");
        $this->load->view("administration/dashboard", $data);

    }

    function ajout()
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        $data['nom'] = $_SESSION['name'];
        $this->load->model('media_model');
        $data['imgs'] = $this->media_model->getAll();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('titre', 'Titre', 'trim|required');
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required');
        $this->form_validation->set_rules('contenu', 'Contenu', 'trim|required');


        if ($this->form_validation->run() !== false) {
            $this->load->model('article_model');
            $this
                ->article_model
                ->ajout(array(
                    'titre' => $this->input->post('titre'),
                    'contenu' => $this->input->post('contenu'),
                    'alias' => $this->input->post('alias'),
                    'etat' => $this->input->post('pb'),
                    'par' => $_SESSION['id']
                ));
            redirect('admin/dashboard');
            die();
        }
        $this->load->view("administration/dashboardheader");
        $this->load->view('administration/ajout_article', $data);
    }

    function modifier($a=0)
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        if (isset($_SESSION['flash'])) {
            $data['msg'] = "<div id='alert' class='alert alert-success'><a class='close'>x</a>{$_SESSION['flash']}</div>";
            unset($_SESSION['flash']);
        }
        $this->load->model("article_model");
        //afficher toutes la liste des article
        if ($a == 0) {
            $articles = $this->article_model->getAll();
            $data['articles'] = $articles;
            $this->load->view("administration/dashboardheader");
            $this->load->view("administration/liste_article", $data);
        } else {
            $article = $this->article_model->getById($a);
            $data['article'] = $article;
            $this->load->view("administration/dashboardheader");
            $this->load->view("administration/modif_article", $data);
        }
    }

    function update()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'titre' => $this->input->post('titre'),
            'contenu' => $this->input->post('contenu'),
            'alias' => $this->input->post('alias'),
            'etat' => $this->input->post('etat'),
            'par' => $_SESSION['id']
        );
        $this->load->model('article_model');
        $this->article_model->modifier($data);
        $_SESSION['flash'] = "Article '{$this->input->post('titre')}' modifié avec succées";
        redirect('admin/modifier');
    }

    function choix($cin = NULL)
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        if (is_null($cin) or $cin < 592) {
            $this->load->model('etudiant_model');

            $this->load->library('pagination');

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '>';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '<';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            $config['anchor_class'] = 'class="follow_link"';


            $config['base_url'] = base_url('admin/choix');
            $config['total_rows'] = $this->etudiant_model->getNbr();
            $config['per_page'] = 20;

            $data = [];

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["etudiants"] = $this->
                                 etudiant_model->
                                 getEtudiant($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('administration/dashboardheader');
            $this->load->view('administration/liste_etudiant', $data);
        } else {
            $this->load->model('choix_model');
            $this->load->model('etudiant_model');

            $data ['choix'] = ($this->choix_model->get($cin)!==false) ? $this->choix_model->get($cin): false;

            $data ['etudiant'] = $this->etudiant_model->getByCin($cin);
            $this->load->view('administration/dashboardheader');
            $this->load->view('administration/liste_choix', $data);
        }
    }

    function media()
    {
        if(isset($_SESSION['msg']))
        {
            $data['msg'] = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        $this->load->model('media_model');
        $data['img'] = $this->media_model->getAll();
        $this->load->view('administration/dashboardheader');
        $this->load->view('administration/liste_media', $data);

        if (isset($_POST['upload'])) // si formulaire soumis
        {
            $content_dir = 'assets/img/'; // dossier où sera déplacé le fichier
            $tmp_file = $_FILES['fichier']['tmp_name'];
            if (!is_uploaded_file($tmp_file)) {
                $_SESSION['msg'] = "Le fichier est introuvable";
            }
            // on vérifie maintenant l'extension
            $type_file = $_FILES['fichier']['type'];
            if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {
                $_SESSION['msg'] = "Le fichier n'est pas une image";
                redirect($_SERVER['HTTP_REFERER']);
            }
            // on fait un test de sécurité
            $name_file = $_FILES['fichier']['name'];
            if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file)) {
                $_SESSION['msg'] = "Nom de fichier non valide" ;
            } // on copie le fichier dans le dossier de destination
            else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
                $_SESSION['msg'] = "Impossible de copier le fichier dans $content_dir";
            }

            redirect('admin/media', 'refresh');
        }
    }

    function logout()
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        //$this->session->unset_userdata('name');
        redirect(base_url('admin'), 'refresh');
    }
} 