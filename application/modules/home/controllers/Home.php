<?php

class Home extends MY_Controller
{

    public function index()
    {  
        (!isset($_SESSION['userdata'])) && redirect(base_url('login'));
        $data['title'] = SYSTEMTITLE;
        $query = $this->input->get('query');

        $config = array();
        $config['base_url'] = base_url('Home/index');
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;

        // Additional pagination configuration
        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';
        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        // $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="prev">';
        // $config['prev_tag_close'] = '</li>';
        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="active"><a href="#">';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        
        if (!empty($query)) {
            $data['results'] = search('tbl_contactlist', $query, $config['per_page'], $page);
        } else {
            $config['total_rows'] = record_count('tbl_contactlist'); 
            $condition = ['type' => $_SESSION['type']];
            $data["results"] = fetch_records($config["per_page"], $page, 'tbl_contactlist', $condition);
        }

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->page('index', $data);
    }

    /* form */
    public function addcontactForm()
    {
        $data = $_POST['contact'];
        $data['type'] = $_SESSION['type'];
        try {
            insert('tbl_contactlist', $data);
            response(200, "success", "contact has been successfully added.");
        } catch (Exception $error) {
            response(500, "error", $error);
        }
    }

    public function editdepartmentForm()
    { 
        try {
            $data['where'] = array(
                'id' => $_POST['id']
            );
            $data['set'] = $_POST['contact'];
            update('tbl_contactlist', $data['set'], $data['where']);
            response(200, "success", "contact has been successfully updated.");
        } catch (Exception $error) {
            response(500, "error", $error);
        }
    }

    /* button */
    public function editdepartmentModal()
    { 
        try {
            $data['params'] = array(
                'where' => array(
                    'tbl_contactlist.id' => $this->input->post('id')
                ),
            );
            $data['result'] = getrow('tbl_contactlist', $data['params'], 'row');
            json($data['result']);
        } catch (Exception $error) {
            response(500, "error", $error);
        }
    }
    
    public function deletetbldepartmentBtn()
    { 
        try {
            $where = array(
                'id' => $_POST['id']
            );
            delete('tbl_contactlist', $where); 
            response(200, "success", "Department has been successfully deleted.");
        } catch (Exception $error) {
            response(500, "error", $error);
        }
    } 
}
