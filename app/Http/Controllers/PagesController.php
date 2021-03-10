<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
    	//Devolveremos carrusel e imagenes aleatorias
        $images = [
            [
                'id' => 1,
                'title' => 'imagen 1',
                'subtitle' => 'sub imagen 1',
                'description' => 'description imagen 1',
                'image' => 'http://lorempixel.com/600/338?1'
            ],
            [
                'id' => 2,
                'title' => 'imagen 2',
                'subtitle' => 'sub imagen 2',
                'description' => 'description imagen 2',
                'image' => 'http://lorempixel.com/600/338?2'
            ],
            [
                'id' => 3,
                'title' => 'imagen 3',
                'subtitle' => 'sub imagen 3',
                'description' => 'description imagen 3',
                'image' => 'http://lorempixel.com/600/338?3'
            ],
            [
                'id' => 4,
                'title' => 'imagen 4',
                'subtitle' => 'sub imagen 4',
                'description' => 'description imagen 4',
                'image' => 'http://lorempixel.com/600/338?4'
            ]
        ];
        $photos = [
            [
                'id' => 5,
                'name' => 'My image 1',
                'image' => 'http://lorempixel.com/600/338?5',
            ],
            [
                'id' => 6,
                'name' => 'My image 2',
                'image' => 'http://lorempixel.com/600/338?6',
            ],
            [
                'id' => 7,
                'name' => 'My image 3',
                'image' => 'http://lorempixel.com/600/338?7',
            ],
            [
                'id' => 8,
                'name' => 'My image 4',
                'image' => 'http://lorempixel.com/600/338?8',
            ],
        ];
    	return view('welcome',[
    		'images'=> $images,
    		'photos' => $photos,
    	]);
    }
}
