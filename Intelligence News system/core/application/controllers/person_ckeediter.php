<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_e_army.php");

class Person_ckeediter extends Base_e_army {
    public $images_path;
     
    public function __construct() {
        parent::__construct();
        $this->load->model('m_db');
    }
    
    public function insert($id = '') {
        $sesstion = $this->getSesstion();
        $insert = array();
        //print_r($sesstion);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $insert['p_updatedby']         = $sesstion['user_id'];
                $insert['p_updateddate']       = date('Y-m-d H:i:s');
                $insert['p_siblingdesc'] = $_POST['editor1'];
                        
                $result = $this->m_db->edit('person', array('p_personid' => $id), $insert);
                redirect(site_url('person/lists'));
            }
        else {
            $this->data['title_section'] = 'เพิ่มบุคคล';
            $this->data['breadcrumb'] = array(array('name' => 'หน้าแรก', 'link' => site_url('')), array('name' => 'รายการบุคคล', 'link' => site_url('person/lists')), array('name' => 'เพิ่มบุคคล'));
            $this->view('person/v_form_add', $this->data);
        }
    }

}