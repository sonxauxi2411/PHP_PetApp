<?php

class Home extends Controller
{
    public $data = [];
    public $model_home;

    public $model_breed;

    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
        $this->model_breed = $this->model('BreedModel');
    }

    public function index()
    {
        $this->data['sub_content']['data'] = [];
        foreach ($this->model_home->get() as $pet) {
            $type_id = $pet['type_id'];
            $type = $this->model_breed->get_breed($type_id);
            $pet['type'] = $type[0]['breed'];
            unset($pet['type_id']);
            $this->data['sub_content']['data'][] = $pet;
        }

        $this->data['sub_content']['title'] = 'danh sach san pham';
        $this->data['content'] = 'home/home';

        $this->render('layouts/client_layout', $this->data);
    }

    public function create_pet()
    {
        $this->data['sub_content']['breeds'] = $this->model_breed->get();
        $this->data['sub_content']['title'] = 'danh sach san pham';
        $this->data['content'] = 'home/formPet';

        $this->render('layouts/client_layout', $this->data);
    }

    public function post_request()
    {
        $request = new Request();
        $data = $request->getField();
        $this->model_home->add($data);

        $response = new Response();
        $response->redirect('home');
    }

    public function edit_pet($id)
    {

        $this->data['sub_content']['data'] = $this->model_home->getPet($id)[0];
        $this->data['sub_content']['title'] = 'danh sach san pham';
        $this->data['content'] = 'home/formPet';

        $this->render('layouts/client_layout', $this->data);
    }

    public function post_update_pet($id)
    {
        $request = new Request();
        $data = $request->getField();
        $this->model_home->update_pet($id, $data);


        $response = new Response();
        $response->redirect('home');
    }

    public function delete_pet($id)
    {
        $request = new Request();
        $this->model_home->delete_pet($id);

        $response = new Response();
        $response->redirect('home');
    }
}
