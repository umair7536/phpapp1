<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function home(){
        return $this->header()."<br>Home Page <br>".$this->footer();
    }


    public function about(){
        $a=34;
        $b=23;
        $c=$a+$b;
//        return view('contact',compact('c','a'));
        $data=array(
            'c'=>$c,
            'title'=>'Languages',
          'courses'=>["Python","Django","Flask"]
        );
        return view('contact')->with($data);
//        return $this->header()."<br> About Page<br>".$this->footer();
    }

    public function contact(){
        return $this->header()."<br> Contact Page <br>".$this->footer();
    }

    public function blog(){
        return $this->header()."<br> Blog Page <br>".$this->footer();
    }



    // Header & footer Pages
    public function header(){
        return "Header Navbar";
    }

    public function footer()
    {
        return "footer";
    }

}
