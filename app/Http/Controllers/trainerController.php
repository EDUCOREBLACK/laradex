<?php

namespace laradex\Http\Controllers;
use laradex\Trainer;
use Illuminate\Http\Request;
use laradex\http\requests\StoreTrainerRequest;
class trainerController extends Controller
{
    
    public function index()
    {
 
   $trainers= Trainer::orderBy('Id','ASC')->paginate(8);
    return view('trainers.index')->with('trainers',$trainers);


    }
    


    public function create()
    {
       
      return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        

       if($request->hasFile('avatar')){

          $file= $request->file('avatar');
          $name= time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);

       }

       $trainer = new Trainer();
       $trainer->name=$request->input('name');
       $trainer->description=$request->input('description');
       $trainer->avatar= $name;
    $trainer->slug= $request->input('name');

       $trainer->save();


      return redirect()->route('trainers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
       
   
     return view('trainers.show',compact('trainer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        
       return view('trainers.edit',compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
       $trainer->fill($request->except('avatar'));
       if($request->hasFile('avatar')){

          $file= $request->file('avatar');
          $name= time().$file->getClientOriginalName();
          $trainer->avatar= $name;
        $file->move(public_path().'/images/', $name);
         
       }

        $trainer->save();


  return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
      $file_path= public_path().'/images/'.$trainer->avatar;
      \File::delete($file_path);
      $trainer->delete();


       return redirect()->route('trainers.index');
    }
}
