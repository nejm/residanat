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
            /*if (isset($_SESSION['id'])) {
                redirect('admin/dashboard');
            }*/
            $this->load->model('admin_model');
            $res = $this
                ->admin_model
                ->verify(
                    $this->input->post('login'),
                    $this->input->post('pass')
                );
            if ($res !== false) {
                $_SESSION['id'] = $_SESSION['name'] = $this->input->post('login');
                //----------------//
                $this->load->model('online_model');
                $this->online_model->add($_SESSION['name'],$this->input->ip_address());
                //**********************************//
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
        $data['spec']=$this->specialite_model->getAll('DESC');

        $data['admis']=$this->etudiant_model->getNbrAdmis();

        $data['sousse'] = $this->etudiant_model->getByFac('SOUSSE');
        $data['sfax'] = $this->etudiant_model->getByFac('SFAX');
        $data['monastir'] = $this->etudiant_model->getByFac('MONASTIR');
        $data['tunis'] = $this->etudiant_model->getByFac('TUNIS');

        $min = $this->etudiant_model->getMinMoy();
        $max = $this->etudiant_model->getMaxMoy();

        for($i=floor($min->moyenne);$i<ceil($max->moyenne);$i++)
        {
            $j=$i+1;

            $moyennes["$i-$j"] = $this->etudiant_model->getByMoy($i,$i+1);

            //$moyennes["$i.5-$j"] = $this->etudiant_model->getByMoy(($i+(1/2)),$i+1);
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
            redirect('admin/modifier');
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
        $this->load->model('media_model');
        $data['imgs'] = $this->media_model->getAll();
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

    function etudiant($cin = NULL)
    {
        if (!isset($_SESSION['name'])) redirect('admin/');

        $this->load->model('etudiant_model');
        if (is_null($cin) or $cin < $this->etudiant_model->getNbr()) {

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

    function choix($cin = NULL)
    {
        if (!isset($_SESSION['name'])) redirect('admin/');

        $this->load->model('etudiant_model');
        if (is_null($cin) or $cin < $this->etudiant_model->getNbrMadeChoice()) {

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
            $config['total_rows'] = $this->etudiant_model->getNbrMadeChoice();
            $config['per_page'] = 20;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["etudiants"] = $this->
                                 etudiant_model->
                                 getMadeChoice($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('administration/dashboardheader');
            $this->load->view('administration/made_choice', $data);
        } else {
            $this->load->model('choix_model');
            $this->load->model('etudiant_model');

            $data ['choix'] = ($this->choix_model->get($cin)!==false) ? $this->choix_model->get($cin) : false;

            $data ['etudiant'] = $this->etudiant_model->getByCinMadeChoice($cin);
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
            $name_file = $this->input->post('filename');
            if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file)) {
                $_SESSION['msg'] = "Nom de fichier non valide" ;
            } // on copie le fichier dans le dossier de destination
            else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
                $_SESSION['msg'] = "Impossible de copier le fichier dans $content_dir";
            }

            redirect('admin/media', 'refresh');
        }
    }

    function chercher()
    {
        $this->load->view("administration/dashboardheader");
        $this->load->view("administration/etudiant");
    }

    function recherche()
    {
        $search=  $this->input->post('name');
        $moymin=  $this->input->post('moymin');
        $moymax=  $this->input->post('moymax');

        $this->load->model('etudiant_model');
        $query = $this->etudiant_model->search($search,$moymin,$moymax);
        if($query !==false)
            echo json_encode ($query);
        else
            echo json_encode("aucune résultat");
    }

    function profile()
    {
        $this->load->view("administration/dashboardheader");
        $this->load->view("administration/profile");
    }

    function user()
    {
        $this->load->view("administration/dashboardheader");
        $this->load->view("administration/ajout_user");
    }

    function verifLogin()
    {
        $login =  $this->input->post('login');
        $this->load->model('admin_model');
        echo json_encode($this->admin_model->verifyLogin($login));
    }

    function addUser()
    {
        explode($this->input->post());
        $privilège = 0;
        if(isset($media)) $privilège+=1;
        if(isset($etudiant)) $privilège+=2;
        if(isset($admin)) $privilège+=4;

        $this->load->model('admin_model');
        $this->admin_model->addUser(array(
            'nom'       => $nom,
            'prenom'    => $prenom,
            'login'     => $login,
            'pass'      => $pass,
            'mail'      => $mail,
            'privilege' => $privilege
        ));
    }

    function exporter()
    {
        $this->load->library("fpdf/fpdf");
        $this->load->model("etudiant_model");
        $max = $this->etudiant_model->getNbr();
        $perpage = ceil($max/42);

        $pdf = new FPDF();
        //$pdf->AddFont('Arial','','',true);

        $pdf->SetFillColor(128,50,10);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(64,21,5);

        for($j=0;$j<$perpage;$j++)
        {

            $header=['convocation','cin','Nom & Prénom','Moyenne'];
            $data = $this->etudiant_model->getEtudiant(42,$j*42);

            $pdf->AddPage();

            // Largeurs des colonnes
            $w=[30,20,80,20];

            // En-tête
            $pdf->SetFont('Arial','B',11);
            for($i=0;$i<count($header);$i++)
                $pdf->Cell($w[$i],7,iconv('UTF-8', 'windows-1252',$header[$i]),1,0,'C',true);
            $pdf->SetFont('Arial','',10);
            $pdf->Ln();
            // Données

            foreach($data as $row)
            {
                $pdf->Cell($w[0],6,$row->num,1,'LR');
                $pdf->Cell($w[1],6,$row->cin,1,'LR');
                $pdf->Cell($w[2],6,$row->nom,1,'L');
                $pdf->Cell($w[3],6,number_format($row->moyenne,2,',',' '),1,'R');
                $pdf->Ln();
            }
            // Trait de terminaison
            $pdf->Cell(array_sum($w),0,'','T');
        }
        $pdf->Output();

    }

    function logout()
    {
        if (!isset($_SESSION['name'])) redirect('admin/');
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        redirect(base_url('admin'), 'refresh');
    }

    function deleteFile()
    {

        $filename = $this->input->post('file');
        $path = "R:\\wamp\\www\\residanat\\assets\\img\\".$filename;
        if (file_exists($path)) {
            unlink($path);
            echo 'File '.$path.' has been deleted';
        } else {
            echo 'Could not delete '.$path.', file does not exist';
        }
    }

    function deleteArticle()
    {

        $id = $this->input->post('id');
        $this->load->model("article_model");
        $this->article_model->deleteById($id);
        echo "Article supprimer avec succès";
    }


    // FPDF functions

} 