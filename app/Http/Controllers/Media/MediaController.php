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
        $getUserMedia = DB::table('medias')
                ->where('userid', '=', Auth::id())
                ->get();

        return view('Media.MainPage', ['userMedia' => $getUserMedia]);
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
                $date = Carbon::now();
                
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

                else
                {
                    $data = getimagesize($file);
                    $width = $data[0];
                    $height = $data[1];

                }

                $pid = Auth::id();
                
                $file->move("assets/Media/", $fileNameToStore);

                $id = DB::table('medias')->insertGetId([
                    'title' => $request->name,
                    'extension' => $extension,
                    'description' => $request->desc,
                    'path' => $fileNameToStore,
                    'size' => $fileSize,
                    'userid' => $pid,
                    'created_at' => $date
                ]);

                if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") 
                {
                    DB::table('videos')->insert([
                        'duaration' => $duration,
                        'mediaid' => $id
                    ]);
                }
                else
                {
                    DB::table('images')->insert([
                        'width' => $width,
                        'height' => $height,
                        'mediaid' => $id
                    ]);
                }
                $getUserMedia = DB::table('medias')
                    ->where('userid', '=', Auth::id())
                    ->get();
                return view('Media.MainPage', ['userMedia' => $getUserMedia]);
                
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
        $getUserUpdateMedia = DB::table('medias')
            ->where('userid', '=', Auth::id())
            ->where('id', '=', $id)
            ->get();

        return view('Media.Update', ['updateMedia' => $getUserUpdateMedia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $date = Carbon::now();
        if(!$request->hasFile('file')){
            DB::table('medias')
              ->where('id', '=' , $request->id)
              ->update([
                  'title' => $request->name, 
                  'description' => $request->desc, 
                  'updated_at' => $date
                ]);
        }
        else{
            $pathOld = $request->path; 
            
            $file =public_path("assets/Media/$pathOld");
            unlink($file);
            
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
            else
            {
                $data = getimagesize($file);
                $width = $data[0];
                $height = $data[1];
            }

            $pid = Auth::id();
            $file->move("assets/Media/", $fileNameToStore);

            DB::table('medias')
            ->where('id', $request->id)
            ->update([
                'title' => $request->name,
                'extension' => $extension,
                'description' => $request->desc,
                'path' => $fileNameToStore,
                'size' => $fileSize,
            ]);
            
            if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") 
            {
                DB::table('videos')
                ->where('mediaid', $request->id)
                ->update([
                    'duaration' => $duration
                ]);
            }
            else
            {
                DB::table('images')
                ->where('mediaid', $request->id)
                ->update([
                    'width' => $width,
                    'height' => $height
                ]);
            }
            $getUserMedia = DB::table('medias')
            ->where('userid', '=', Auth::id())
            ->get();
            return view('Media.MainPage', ['userMedia' => $getUserMedia]);
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('images')->where('mediaid', '=', $id)->delete();
        DB::table('videos')->where('mediaid', '=', $id)->delete();
        DB::table('user_likes')->where('media_id', '=', $id)->delete();
        DB::table('medias')->where('id', '=', $id)->delete();
        return $this->index();
    }
}

//composer require james-heinrich/getid3