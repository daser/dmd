<?php

namespace App\Http\Controllers;
use App\Repositories\News\NewsContract;
use App\Repositories\Posts\PostContract;
use App\Repositories\Slider\SliderContract;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $repo;
    public function __construct(NewsContract $NewsContract, PostContract $postContract, SliderContract $sliderContract) {
        $this->repo = $NewsContract;
        $this->repos = $postContract;
        $this->reposi = $sliderContract;
        // $this->middleware('auth');
    }
    public function index(){
       
        $users = User::all();
        return view('welcome');
    }
}
