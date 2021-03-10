<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTemplateRequest;
use App\User;
use App\Role;
use App\Template;
use App\Textsize;
use App\Style;
use App\Photo;

class TemplateController extends Controller
{

	public function start_template(Request $request)
    {
        $role=Role::where('id',$request->user()->role_id)->first();
        return view('template/start',[
            'role' => $role, 
    	]);

    }

    public function structure(CreateTemplateRequest $request)
    {
        
        $role=Role::where('id',$request->user()->role_id)->first();
        return view('template/structure',[
            'role' => $role,
            'numFil'=> $request->rows,
            'numCol' => $request->columns,
        ]);
    }

    public function scheme(Request $request)
    {
        //dd($request->filas);
        $images=[];
        $form=[];

        $myFila="";
        
        foreach ($request->filas as $key => $value) {
            if($value==1){
                
                $images[]=[
                'img'=>[
                        [
                            'url' => '/images/gorila.jpg',
                            'size' => 'col-12',
                            'title' => [
                                'id' => 'title11',
                                'name' => 'title11',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title11_input',
                                'id_icon' => 'title11_icon',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle11',
                                'name' => 'subtitle11',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle11_input',
                                'id_icon' => 'subtitle11_icon',
                            ],
                            'description' => [
                                'id' => 'description11',
                                'name' => 'description11',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description11_input',
                                'id_icon' => 'description11_icon',

                            ],
                        ],
                    ],

                ];

                $myFila.='11,';

            }

            if($value==2){
                
                $images[]=[
                    'img'=>[
                        [
                            'url'=>'/images/surf.jpg',
                            'size'=>'col-6',
                            'title' => [
                                'id' => 'title21',
                                'name' => 'title21',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title21_input',
                                'id_icon' => 'title21_icon',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle21',
                                'name' => 'subtitle21',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle21_input',
                                'id_icon' => 'subtitle21_icon',
                            ],
                            'description' => [
                                'id' => 'description21',
                                'name' => 'description21',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description21_input',
                                'id_icon' => 'description21_icon',
                            ],
                        ],
                        [
                            'url'=>'/images/surf.jpg',
                            'size'=>'col-6',
                            'title' => [
                                'id' => 'title22',
                                'name' => 'title22',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title22_input',
                                'id_icon' => 'title22_icon',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle22',
                                'name' => 'subtitle22',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle22_input',
                                'id_icon' => 'subtitle22_icon',
                            ],
                            'description' => [
                                'id' => 'description22',
                                'name' => 'description22',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description22_input',
                                'id_icon' => 'description22_icon',
                            ],
                            
                        ],
                    ],
                    
                ];

                $myFila.='21,22,';
                
            }

            if($value==3){
                
                $images[]=[
                    'img'=>[
                        [
                            'url'=>'/images/surf.jpg',
                            'size'=>'col-4',
                            'title' => [
                                'id' => 'title31',
                                'name' => 'title31',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title31_input',
                                'id_icon' => 'title31_icon',
                                'id_align-items' => 'title31_align-items',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle31',
                                'name' => 'subtitle31',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle31_input',
                                'id_icon' => 'subtitle31_icon',
                                'id_align-items' => 'subtitle32_align-items',
                            ],
                            'description' => [
                                'id' => 'description31',
                                'name' => 'description31',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description31_input',
                                'id_icon' => 'description31_icon',
                                'id_align-items' => 'description32_align-items',
                            ],
                        ],
                        [
                            'url'=>'/images/surf.jpg',
                            'size'=>'col-4',
                            'title' => [
                                'id' => 'title32',
                                'name' => 'title32',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title32_input',
                                'id_icon' => 'title32_icon',
                                'id_align-items' => 'title32_align-items',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle32',
                                'name' => 'subtitle32',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle32_input',
                                'id_icon' => 'subtitle32_icon',
                                'id_align-items' => 'subtitle32_align-items',
                            ],
                            'description' => [
                                'id' => 'description32',
                                'name' => 'description32',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description32_input',
                                'id_icon' => 'description32_icon',
                                'id_align-items' => 'description32_align-items',
                            ],
                        ],
                        [
                            'url'=>'/images/surf.jpg',
                            'size'=>'col-4',
                            'title' => [
                                'id' => 'title33',
                                'name' => 'title33',
                                'type' => 'text',
                                'value' => 'Titulo',
                                'id_input' => 'title33_input',
                                'id_icon' => 'title33_icon',
                                'id_align-items' => 'title33_align-items',
                            ],
                            'subtitle' => [
                                'id' => 'subtitle33',
                                'name' => 'subtitle33',
                                'type' => 'text',
                                'value' => 'Subtitulo',
                                'id_input' => 'subtitle33_input',
                                'id_icon' => 'subtitle33_icon',
                                'id_align-items' => 'subtitle33_align-items',
                            ],
                            'description' => [
                                'id' => 'description33',
                                'name' => 'description33',
                                'type' => 'text',
                                'value' => 'Esta es mi descripción',
                                'id_input' => 'description33_input',
                                'id_icon' => 'description33_icon',
                                'id_align-items' => 'description33_align-items',
                            ],
                        ],
                    ],
                ];

                $myFila.='31,32,33,';

            }



        }

        $sizeText=Textsize::all();

        $col='col-6 col-xl-3 mt-1';
        $role=Role::where('id',$request->user()->role_id)->first();
        return view('template/scheme',[
            'role' => $role,
            'col' => $col,
            'images' => $images,
            'textsize' => $sizeText,
            'filas' => substr($myFila, 0, -1),
        ]);
    }
    /**
      * Método que guarda la foto, luego el texto y por último el estilo del texto
    **/
    public function save(Request $request){

        $photo=Photo::create([
            'url_img' => $request->url_img,
        ]);

        
    }
}
