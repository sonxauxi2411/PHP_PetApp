<?php

class Breed extends Controller
{

    public $data = [];

    public $model_breed;
    public function __construct()
    {
        $this->model_breed = $this->model('BreedModel');
    }

    public function index()
    {
        $this->data['sub_content']['data'] = $this->model_breed->get();
        $this->data['sub_content']['title'] = 'danh sach san pham';
        $this->data['content'] = 'breed/breed';
        // echo '<pre >';
        // print_r($this->data);
        // echo '</pre>';
        $this->render('layouts/client_layout', $this->data);
    }

    public function create()
    {
        $request = new Request();
        if($request->isPost()){
            $request->rules(['breed' => 'required|min:2',]);

            $request->messages(["breed.required" => "name not required", 'breed.min' => 'name min 2']);
    
            $validate = $request->validate();
    
            if (!$validate) {
                $this->data['sub_content']['error'] = $request->error();
                $this->data['sub_content']['old'] = $request->getField();
            }
    
            // $data = $request->getField();
            // $this->model_breed->add($data);
            // $response = new Response();
            // $response->redirect('breed');
    
            $this->data['sub_content']['data'] = $this->model_breed->get();
            $this->data['sub_content']['title'] = 'danh sach san pham';
            $this->data['content'] = 'breed/breed';
            // echo '<pre >';
            // print_r($this->data);
            // echo '</pre>';
            $this->render('layouts/client_layout', $this->data);
        }
       
    }

    public function delete($id)
    {
        $request = new Request();
        $this->model_breed->delete_breed($id);

        $response = new Response();
        $response->redirect('breed');
    }
}
