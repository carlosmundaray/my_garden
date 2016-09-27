<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Input, Redirect, Validator, Session, File;
use App\Http\Requests;
use App\Periodico;

class PeriodicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodicos = DB::table('periodicos')->get();
        return view('periodico.consult',compact('periodicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodico.save');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          // getting all of the post data
      $file = array('name' => $request->input('name'), 'image' => Input::file('image'), 'pdf' => Input::file('pdf'), 'fecha_active' => $request->input('fecha_active'));
      // setting up rules
      $rules = array('name' => 'required', 'image' => 'image|required|max:10000', 'pdf' => 'required|mimes:pdf', 'fecha_active' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
        return Redirect::to('periodico/create')->withInput()->withErrors($validator);
      }
      else {
                // checking file is valid.
                if (Input::file('image')->isValid() && Input::file('pdf')->isValid()) {

                  $destinationPath = 'uploads/img'; // upload path
                  $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                  $fileName = rand(11111,99999).'.'.$extension; // renameing image

                  $destinationPath2 = 'uploads/pdf'; // upload path
                  $extension2 = Input::file('pdf')->getClientOriginalExtension(); // getting image extension
                  $fileName2 = rand(11111,99999).'.'.$extension2; // renameing image

                  Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                  Input::file('pdf')->move($destinationPath2, $fileName2); 


                    Periodico::create([
                            'name' =>  $request['name'],
                            'img' =>   $destinationPath."/".$fileName,
                            'pdf' =>   $destinationPath2."/".$fileName2,
                            'fecha_active' => $request['fecha_active'],
                            'status' => 0
                    ]);
                  // sending back with message
                  Session::flash('success', 'Se ha registrado satisfactoriamente'); 
                  return Redirect::to('periodico/create');
                }
                else {
                  // sending back with error message.
                  Session::flash('error', 'error el archivo no es valido');
                  return Redirect::to('periodico/create');
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
           
        $periodicos = DB::table('periodicos')->where('id', $id)->first();
        //dd($periodicos);
       return view('periodico.edit',compact('periodicos'));
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
          $vl1 = Input::file('image');
          $vl2 = Input::file('pdf');

          $soliste = Periodico::findOrFail($id);

          if(isset($vl1) && isset($vl2)){

              // getting all of the post data
               $file = array('name' => $request->input('name'), 'image' => Input::file('image'), 'pdf' => Input::file('pdf'), 'fecha_active' => $request->input('fecha_active'));
              // setting up rules
              $rules = array('name' => 'required', 'image' => 'image|required|max:10000', 'pdf' => 'required|mimes:pdf', 'fecha_active' => 'required');  //mimes:jpeg,bmp,png and for max size max:10000
              // doing the validation, passing post data, rules and the messages
              $validator = Validator::make($file, $rules);
              if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('periodico/'.$id.'/edit')->withInput()->withErrors($validator);
              }
              else 
              {

              $old_image = $soliste->img;
              $old_pdf = $soliste->pdf;

              // Deleting old images - preview & original
              if(File::isFile($old_image))
              {
                  File::delete($old_image);
              }


              // Deleting old pdf - preview & original
              if(File::isFile($old_pdf))
              {
                  File::delete($old_pdf);
              }




                        // checking file is valid.
                        if (Input::file('image')->isValid() && Input::file('pdf')->isValid()) {

                          $destinationPath = 'uploads/img'; // upload path
                          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                          $fileName = rand(11111,99999).'.'.$extension; // renameing image

                          $destinationPath2 = 'uploads/pdf'; // upload path
                          $extension2 = Input::file('pdf')->getClientOriginalExtension(); // getting image extension
                          $fileName2 = rand(11111,99999).'.'.$extension2; // renameing image

                          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                          Input::file('pdf')->move($destinationPath2, $fileName2); 



                                    $periodico = Periodico::find($id);
                                    $periodico->fill([
                                    'name' =>  $request['name'],
                                    'img' =>   $destinationPath."/".$fileName,
                                    'pdf' =>   $destinationPath2."/".$fileName2,
                                    'fecha_active' =>$request['fecha_active']
                                    ]);
                                    $periodico->save();
                          // sending back with message
                          Session::flash('success', 'Se ha registrado satisfactoriamente'); 
                          return Redirect::to('periodico/'.$id.'/edit');
                        }
                        else {
                          // sending back with error message.
                          Session::flash('error', 'error el archivo no es valido');
                          return Redirect::to('periodico/'.$id.'/edit');
                        }
                      }

                 }else{

                                 $periodico = Periodico::find($id);
                                    $periodico->fill([
                                    'name' =>  $request['name'],
                                    'fecha_active' =>$request['fecha_active']
                                    ]);
                                    $periodico->save();

                  return Redirect::to('periodico');

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
              $soliste = Periodico::findOrFail($id);
              $old_image = $soliste->img;
              $old_pdf = $soliste->pdf;

              // Deleting old images - preview & original
              if(File::isFile($old_image) && File::isFile($old_pdf))
              {
                  File::delete($old_image);
                  File::delete($old_pdf);
              }

        Periodico::destroy($id);
        return Redirect::to('/periodico');

    }
}
