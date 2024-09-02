<?php

namespace App\Http\Controllers;

use App\Models\Privacy_Center;
use Illuminate\Http\Request;
use DB;
class PrivacyCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Privacy_Center=Privacy_Center::orderBy("id","desc")->get();
        return view('Privacy_Center.list',compact('Privacy_Center'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Privacy_Center.add');
    }

    public function store(Request $request)
    {

        if ($request->updated_id) {
            DB::beginTransaction();
            try {

                $data = Privacy_Center::find($request->updated_id);
                $data->discription = $request->textareaBox;
                $data->save();

                DB::commit();
                return redirect(route('privacy-list'))->with('successMessage', 'Privacy Center Updated successfully');
            } catch (\Exception $exception) {
              
                DB::rollback();
                return redirect(route('privacy-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            } catch (\Throwable $exception) {
              

                DB::rollback();
                return redirect(route('privacy-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            }


        } else {
            DB::beginTransaction();
            try {
                $data = new Privacy_Center();
                $data->discription = $request->textareaBox;
               $data->save();

                DB::commit();
                return redirect(route('privacy-list'))->with('successMessage', 'Privacy Center added successfully');
            } catch (\Exception $exception) {
               
                DB::rollback();
                return redirect(route('privacy-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            } catch (\Throwable $exception) {
               

                DB::rollback();
                return redirect(route('privacy-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            }
        }
    }


    public function update($id)
    {
        $Privacy_Center=Privacy_Center::find($id);
        return view('Privacy_Center.edit',compact('Privacy_Center'));
    }

    public function destroy($id)
    {
        $Privacy_Center=Privacy_Center::find($id);
        if($Privacy_Center)
        {
            $Privacy_Center->delete();
            return redirect(route('privacy-list'))->with('successMessage', 'Privacy Center Deleted successfully');

        }else
        {
            return redirect(route('privacy-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');

        }
    }
}
