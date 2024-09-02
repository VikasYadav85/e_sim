<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DB;
class CountryController extends Controller
{

    public function index()
    {
        $Country = Country::orderBy('id', 'desc')->get();


        $shows = DB::table('countries')
    ->select('*', DB::raw('( 6371 * acos( cos( radians(latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(longitude) ) + sin( radians(latitude) ) * sin( radians( latitude ) ) ) ) AS distance'))
    ->having('distance', '<', 3)
    ->orderBy('distance')
    ->get();

         return view('country.list',compact('Country'));
    }


    public function create()
    {
        return view('country.add');

    }


    public function save(Request $request)
    {

        if($request->file('Image'))
        {
          $background_image = $request->file('Image');
          $filename = uniqid() . '.'. $background_image->getClientOriginalExtension();
          $path = public_path('images/country');
          $imagepath = $request->Image->move($path, $filename);
        }

       if($request->updated_id){

                DB::beginTransaction();
                try {

                    $country =  Country::find($request->updated_id);

                    $country->country =$request->name;
                    $country->status =$request->status;
                    if ($request->file('Image')) {
                        $country->image = $filename;
                    }
                    $country->save();

                    DB::commit();
                    return redirect(route('country'))->with('successMessage', 'Country Updated successfully');
                } catch (\Exception $exception) {
                    DB::rollback();
                    return redirect(route('country'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
                } catch (\Throwable $exception) {
                    DB::rollback();
                    return redirect(route('country'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
                }

               }else{


                DB::beginTransaction();
                try {
                    $country = new Country();
                    $country->country =$request->name;
                    $country->status =$request->status;
                    if ($request->file('Image')) {
                        $country->image = $filename;
                    }
                    $country->save();

                    DB::commit();
                    return redirect(route('country'))->with('successMessage', 'Country added successfully');
                } catch (\Exception $exception) {

                    DB::rollback();
                    return redirect(route('country'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
                } catch (\Throwable $exception) {

                    DB::rollback();
                    return redirect(route('country'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
                }
            }

    }


    public function edit($id)
    {
        $country =  Country::find($id);
        return view('country.add',compact('country'));

    }



    public function update(Request $request, Country $country)
    {
        //
    }


    public function destroy(Country $country)
    {
        //
    }
}
