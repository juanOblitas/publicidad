<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTemplateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Template;

class Advertising extends Controller
{
     public function start(Request $request)
    {
        //Devolveremos unas imagenes de lorempixel con tamaños determinados
        $images=[
            [
                'img'=>[
                    [
                        'url'=>'/images/gorila.jpg',
                        'size'=>'col-12',
                    ],
                ],
            ],
            [
                'img'=>[
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                ],
            ],
            [
                'img'=>[
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                ],
            ],
            [
                'img'=>[
                    [
                        'url'=>'/images/gorila.jpg',
                        'size'=>'col-12',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                    [
                        'url'=>'/images/surf.jpg',
                        'size'=>'col-6',
                    ],
                ],
            ],
        ];
        $col='col-6 col-xl-3 mt-1';
        $role=Role::where('id',$request->user()->role_id)->first();
        return view('advertising/start',[
            'images'=> $images,
            'col' => $col,
            'role' => $role, 
        ]);
    }

    public function generateTemplate(Request $request)
    {
        $role=Role::where('id',$request->user()->role_id)->first();
        return view('advertising/table',[
            'role' => $role, 
            'is_numeric_row'=>true,
            'is_numeric_column' => true,
            'error_row' => '',
            'error_column' => '',
        ]);
    }

}
