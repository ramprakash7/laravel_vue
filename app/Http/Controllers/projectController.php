<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use Illuminate\Support\Facades\Validator;


class projectController extends Controller
{

    public function index(){

    }

    public function projectsView(){
        $project_list = Project::All();
        $result = 0;
        if(!empty($project_list)){
            $project_list =  $project_list->toArray();
        }else{
            $result = 1;
            $project_list = [];
        }
        // dd($project_list);exit;
        $response = ['success'=> $result , 'data'=> $project_list ];
        return $project_list;
        // return ['message' => 'Project Created!'];
    }


    public function store(){

        $this->validate(request() ,[
            'name' => 'required',
            'description' => 'required'
        ]);
        $data = [
            'project_name' => request('name'),
            'project_description' => request('description'),
        ];
        // dd($data);
        Project::create($data);
    return ['message' =>'Project Created'];
    }

}
