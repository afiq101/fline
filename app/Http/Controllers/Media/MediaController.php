<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Media.MainPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Media.UploadPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file'))
            {
                
                $fileNameToStore = $request->file->hashName();

                $fileSize = $request->file('file')->getSize();

                $extension = $request->file('file')->extension();

                $file = $request->file;

                $pid = Auth::id();
                
                $file->move("assets/Media/", $fileNameToStore);

                $id = DB::table('media')->insertGetId([
                    'Title' => $request->name,
                    'Extension' => $extension,
                    'Description' => $request->desc,
                    'file_path' => $fileNameToStore,
                    'Size' => $fileSize,
                    'UserID' => $pid
                ]);
    
                if($extension == 'jpeg')
    
                $oid = DB::table('users')
                        ->where('id' , $pid)
                        ->value('OID');
    
                DB::table('menu_organization')->insert([
                    'menu_id' => $id,
                    'organization_id' => $oid
                ]);
       
                if($id != NULL)
                {
                    return redirect()->route('canteen.Canteen.index');
                }
    
                else
                {
                    return view('canteen.management.add');
                }
                
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
