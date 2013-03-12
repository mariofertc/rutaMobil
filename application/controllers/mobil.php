<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller {

    public function index() {
        //$this->load->view('mobil/bienvenido');
        //$this->load->view('mobil/menu');
        $this->load->view('mobile/partial/head.php');
        $this->load->view('mobile/home/content.php');
        $categoria = $this->Categoria->getall();
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
        $coordenadas = array();
        $categoria = $this->Categoria->getall();
        foreach ($categoria->result() as $oferta) {
            $lugares = $this->Lugar->get_by_categoria($oferta->id);
            foreach ($lugares->result() as $lugar) {
//               json_decode($lugar->coordenadas);
//               $coordenadas[] = json_decode($lugar->coordenadas);
//               $coordenadas[] = json_decode($lugar->coordenadas);

                $coor = json_decode($lugar->coordenadas);
                if (!isset($coor->latitud))
                    continue;
                $lat = $coor->latitud;
                $lon = $coor->longitud;
                $titulo = $lugar->nombre;
                $coordenadas[] = array('latitud' => $lat, 'longitud' => $lon, 'titulo' => $titulo);
            }
        }
        //var_dump($coordenadas);
        echo json_encode($coordenadas);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */