<?php

namespace App\Http\Controllers\Front;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{

    public function __construct()
    {
         if(Config::find(1)->active==0){
                    return redirect()->to('site-bakimda')->send();
         }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
             view()->share('categories',Category::where('status',1)->inRandomOrder()->get());


    }

    public function index(){
        $data['articles']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->paginate(10);
        $data['articles']->withPath(url('sayfa'));
        return view('front.homepage',$data);
    }


    public  function  single($category,$slug){
       $category= Category::whereSlug($category)->first();
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first();
        $article->increment('hit');
        $data['article']=$article;
        return view('front.single',$data);
    }

    public  function  category($slug){
        $category= Category::whereSlug($slug)->first();
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at','DESC')->paginate(5);
        return view('front.category',$data);

    }

    public  function page($slug){
         $page=Page::whereSlug($slug)->first();
         $data['page']=$page;
         $data['pages']=Page::orderBy('order','ASC')->get();
        return view('front.page',$data);
//        $page = Page::where("slug",$slug)->orderBy("id","DESC")->first();
//        return view('front.page',["page"=>$page]);
    }

    public function  contact(){
          return view("front.contact");
    }

    public  function  contactpost(Request $request){

        $rules=[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ];

       $validate= Validator::make($request->post(),$rules);
        if ($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
         }



        $to_name = 'Mustafa';
        $to_email = 'info@diyetoloqum.az';

        $data = $request->only('name','email','phone','message');

        Mail::send('front.contact_email', ['data' => $data], function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Diyetoloqum.az contact mail');
            $message->from('info@diyetoloqum.az','Artisans Web');
        });


//        $contact=new Contact;
//        $contact->name=$request->name;
//        $contact->email=$request->email;
//        $contact->phone=$request->phone;
//        $contact->message=$request->message;
//        $contact->save();
        return redirect()->route('contact')->with('success','Mesaj Uğurla Çatdı');
    }
}
