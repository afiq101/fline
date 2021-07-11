<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

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
                $date = Carbon::now()->format('Y-m-d');
                
                $fileNameToStore = $request->file->hashName();

                $fileSize = $request->file('file')->getSize();

                $extension = $request->file('file')->extension();

                $file = $request->file;

                if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") 
                {
                    $getID3 = new \getID3;
                    $fileinfo = $getID3->analyze($file);
                    $duration = date('H:i:s.v', $fileinfo['playtime_seconds']);
                }

                else if($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif")
                {
                    $data = getimagesize($file);
                    $width = $data[0];
                    $height = $data[1];
                }

                else
                {
                    return view('Media.UploadPage')->with('failed','Please Insert The Right Format .');
                }

                //$pid = Auth::id();
                $pid = 1;


                $file->move("assets/Media/", $fileNameToStore);

                $id = DB::table('medias')->insertGetId([
                    'title' => $request->name,
                    'extension' => $extension,
                    'description' => $request->desc,
                    'path' => $fileNameToStore,
                    'size' => $fileSize,
                    'userid' => $pid,
                    'dateuploaded' => $date
                ]);

                if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") 
                {
                    DB::table('videos')->insert([
                        'duration' => $duration,
                        'mediaid' => $id
                    ]);
                }
                else if($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif")
                {
                    DB::table('images')->insert([
                        'width' => $width,
                        'height' => $height,
                        'mediaid' => $id
                    ]);
                }
                
                return view('Media.MainPage');
                
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

//composer require james-heinrich/getid3