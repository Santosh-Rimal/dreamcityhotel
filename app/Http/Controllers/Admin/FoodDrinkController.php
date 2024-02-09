<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\FoodDrink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFoodDrinkRequest;
use App\Http\Requests\Admin\UpdateFoodDrinkRequest;

class FoodDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food_drinks=FoodDrink::paginate(10);
        return view('admin.foodanddrink.index',compact('food_drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foodanddrink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodDrinkRequest $request)
    {
        $input=$request->all();
        $input['image']=$this->fileUpload($request,'image');
        $input['slug']=Str::slug($request->name);
        // dd($input);
        FoodDrink::create($input);
        return redirect()->route('admin.food_drinks.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodDrink $food_drink)
    {
        // dd($fooddrink);
        return view('admin.foodanddrink.edit',compact('food_drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodDrinkRequest $request, FoodDrink $food_drink)
    {
         $old_image = $food_drink->image;
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->fileRemove($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $input['slug'] = Str::slug($request->name);
        $food_drink->update($input);
        return redirect()->route('admin.food_drinks.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodDrink $food_drink)
    {
        $this->fileRemove($food_drink->image);
        $food_drink->delete();
        return redirect()->route('admin.food_drinks.index')->with('message', 'Delete Successfully');

    }


     public function fileUpload($request,$name)
    {
        $imageName='';
        if($image=$request->file($name)){
            $path=public_path().'/admin/assets/img/food_drink';
            $imageName= date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($path,$imageName);
            $image=$imageName;
        }
        return $imageName;
    }
    
      public function fileRemove($image){
        $path=public_path().'/admin/assets/img/food_drink/'.$image;
        // dd($path);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}