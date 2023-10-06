<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Dotenv\Repository\RepositoryInterface;

class BlogController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   


       $data = blog ::with('comments')->get();
     
        
       
       
       

   if ($data) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Post!',
           'data'      => $data 
           
           
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Post Tidak Ditemukan!',
       ], 404);
   };
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $profile = blog::create($request -> all());
        return response()->json($profile);
       
      
    }
        
    
    // $comment = Comment::with('comments')->Orderby('idblog','DESC')->paginate(2)->toArray();
        //return response()->json($comment);
     
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $comment = Comment::create($request -> all());
        return response()->json($comment); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = blog::with('comments')->where('idblog', $id )->get();
       
        // $comment= [
        //     'idblog'=> $id,
        //     'nama'=> $request->get($com,'nama'),
        //     'comment'=>$request->get($com,'comment')
        //    ];
     
         
        if ($data) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Post!',
                'data'      => $data
                
              
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
            ], 404);
        };

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id )
    {

// $data =  blog::where('idblog',$id)->update($request->all());

//     return response()->json($data);

//    $comment= [
//     'idblog'=>$request->input($id),
//     'nama'=>$request->input('nama'),
//     'comment'=>$request->input('comment')
//    ];


$comment = Comment::create([
    'idblog' =>  $id,
    'nama' => $request -> input('nama') ,
    'comment'=> $request -> input('comment')
]);

     return response()->json($comment); 
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = blog::where('idblog', $id )->delete();
        $comment = Comment::where('idblog', $id )->delete();
        return response()->json("Data Sudah di hapus");
    }
}