<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller {

    public function index() {
        //$this->load->view('mobil/bienvenido');
        //$this->load->view('mobil/menu');
        $this->load->view('mobile/partial/head.php');
        //$this->load->view('mobile/home/content.php');
//        $categoria = $this->Categoria->getall();
        $inicio = $this->Categoria->get_all(100,0,"order = 0");
//        $this->load->view('mobile/home/content.php');
        $data['lugar'] = get_lugar($inicio, array('no_breadcrumbs' => true, 'shadow' => false, 'no_back'=>true), $this);
        $this->load->view('mobile/lugar/pagina', $data);
        $data['lugar'] = get_photos($inicio, array('busqueda' => false, 'shadow' => false), $this);
        $this->load->view('mobile/lugar/pagina', $data);
        
        $categoria = $this->Categoria->get_all(100,0,"order > 0");
        $data['oferta'] = get_oferta($categoria, array('busqueda' => true, 'shadow' => true));
        $this->load->view('mobile/oferta/content.php', $data);


        $data['lugar'] = get_lugares($categoria, array('busqueda' => true, 'shadow' => true), $this);
        $this->load->view('mobile/lugar/pagina', $data);
        $data['lugar'] = get_lugar($categoria, array('busqueda' => false, 'shadow' => false), $this);
        $this->load->view('mobile/lugar/pagina', $data);
        $data['lugar'] = get_photos($categoria, array('busqueda' => false, 'shadow' => false), $this);
        $this->load->view('mobile/lugar/pagina', $data);


        $data['geo'] = get_geo($categoria, array('busqueda' => false, 'shadow' => false), $this);
        $this->load->view('mobile/geo/pagina', $data);

        $data['aboutus'] = get_aboutus($this);
        $this->load->view('mobile/about/pagina', $data);

        $data['comentario'] = get_add_comentario($this);
        $this->load->view('mobile/comentario/pagina', $data);
        $data['comentario'] = get_add_thankyou($this);
        $this->load->view('mobile/comentario/pagina', $data);
        $this->load->view('mobile/partial/footer', $data);


//        $this->load->view('mobile/inicio.php');
    }

    public function menu() {
        $this->load->view('mobil/menu');
    }

    public function mapa() {
        //$data['id_mapa'] = $id_mapa;
        $this->load->view('mobil/mapa');
    }

    function coordenadas() {
        //Si es 0, entonces debe enviar todas las locaciones.
        $categoria_id = $_GET['categoria_id'];
        $lugar_id = $_GET['lugar_id'];
        
        $data = array();
//        $categoria = $this->Categoria->getall();
        $where_categoria = $categoria_id != 0?array('id'=>$categoria_id):array();
        $categoria = $this->Categoria->get_all(100,0,$where_categoria);
//        if($categoria_id == 0 && $lugar_id == 0)
            
        $where_lugar = $lugar_id!=0?array('id'=>$lugar_id):array();
        foreach ($categoria->result() as $oferta) {
//            var_dump($where_lugar);
            $lugares = $this->Lugar->get_all(100,0, array_merge($where_lugar,array("categoria_id"=>$oferta->id)));
//            var_dump($lugares);
            foreach ($lugares->result() as $lugar) {
                $coor = json_decode($lugar->coordenadas);
                if (!isset($coor->latitud))
                    continue;
                $lat = $coor->latitud;
                $lon = $coor->longitud;
                $titulo = $lugar->nombre;
                $data[$oferta->id][] = array('latitud' => $lat, 'longitud' => $lon, 'titulo' => $titulo, 'id_lugar' => $lugar->id, 
                    'id_categoria' => $oferta->id);
//                $coordenadas[] = array('latitud' => $lat, 'longitud' => $lon, 'titulo' => $titulo, 'id_lugar' => $lugar->id);
            }
        }
        echo json_encode($data);
    }

    function save_comments() {
        if (
                isset($_POST['username']) && !empty($_POST['username']) &&
                isset($_POST['comment']) && !empty($_POST['comment']) &&
                isset($_POST['titulo']) && !empty($_POST['titulo']) &&
                isset($_POST['lugar_id']) && !empty($_POST['lugar_id'])
        ) {
            $username = $_POST['username'];
            $comment = $_POST['comment'];
            $lugar_id = $_POST['lugar_id'];
            $titulo = $_POST['titulo'];
            
            $data = array('nombre_comentario' => $username, 
                'titulo' => $titulo, 
                'mensaje' => $comment, 
                'id_lugar'=>$lugar_id,
                'fecha' => date('Y-m-d H:i:s')
                );

            $is_save = $this->Comentario->save($data);
            if ($is_save)
                echo json_encode(array('success' => true, 'id_comment'=>$data['id']));
            else
                echo json_encode(array('success' => false, 'message' => 'No se pudo guardar el Comentario!'));
        }
    }
    function save_vote() {            
            $data = array('voto' => $this->input->post('voto'),
                'id_lugar' => $this->input->post('id_lugar'), 
                'ip1' => $this->input->server('REMOTE_ADDR'), 
                'ip2'=> $this->input->server('HTTP_X_FORWARDED_FOR'),
                'fecha' => date('Y-m-d H:i:s')
                );

            $is_save = $this->Voto->save($data);
            if ($is_save)
                echo json_encode(array('success' => true, 'id_voto'=>$data['id']));
            else
                echo json_encode(array('success' => false, 'message' => 'No se pudo registrar tu voto!'));
        
    }
    
    function get_lugares()
    {
        $lugares = $this->Lugar->get_by_categoria($_POST['id']);
        echo json_encode($lugares->result_array());
    }

    function send_email()
    {
       $to = $this->input->get('email');
       $name = $this->input->get('name');
       $messagetext = "Estimado ".$name."\r\nAgradecemos su tiempo para contactarse con nosotros.\r\n\r\nSu mensaje:\r\n".$this->input->get('mensaje');
       $subject = "Contactos Ecuadorinmobile";
       $config=array(
      'protocol'=>'smtp',
      'smtp_host'=>'ssl://hosting.dnsseguras.com',
      'smtp_port'=>465,
      'smtp_user'=>'info@ecuadorinmobile.com',
      'smtp_pass'=>'12345qwer_1'
    );
       $config['smtp_timeout'] = 5;
    $this->load->library("email",$config);
    $this->email->set_newline("\r\n");
    $this->email->from("info@ecuadorinmobile.com","Administrador");
    $this->email->to($to); 
    $this->email->bcc('mariofertc@hotmail.es'); 
    $this->email->subject($subject); 
    $this->email->message($messagetext); 
    if($this->email->send())
    {
//        $this->load->view('mobile/lugar/pagina', $data);
        redirect('mobil#thankyou', 'location');
//        echo "{success:'Mensaje enviado correctamente'}";
    }
    else
    {
        show_error($this->email->print_debugger());
    }
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */