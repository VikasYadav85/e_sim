<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Curl;
use App\Models\Coverage;
use App\Models\Package;
use App\Models\PackageCountry;
use App\Models\CoverageNetwork;
use App\Models\Operator;
use App\Models\CoverageNetworkType;

class PackageController extends Controller
{
	public function index()
    {
        $operators = Operator::orderBy('id', 'desc')->get();
        return view('operators.list',compact('operators'));
    }

    public function store(Request $request)
    {
    	$withData = [
            'client_id'       => '7d6651fa07aa43af9390fceee25d1ae9',
            'client_secret'   => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
            'grant_type'      => 'client_credentials',
        ];

        $response = Curl::to('https://sandbox-partners-api.airalo.com/v2/token')
            ->withData($withData)
            ->post();
        $responses = json_decode($response, true);
        $token     = $responses['data']['access_token'];
        $live_url = 'https://sandbox-partners-api.airalo.com/v2/packages';
        $result = Curl::to($live_url)
            ->withBearer($token)
            ->withHeader('Accept: application/json')
            ->get();
        $results = json_decode($result, true);
        $packages = $results['data'];
        DB::beginTransaction();
          try {
            foreach ($packages as $key => $package) {
            	foreach ($package['operators'] as $operator) {
            		$operators = Operator::where('operator_id', $operator['id'])->first();
					if (!$operators) {
					    $operators = new Operator;
					}
	            	$operators->operator_id = $operator['id'];
					$operators->slug = $package['slug'];
					$operators->country_code = $package['country_code'];
					$operators->country_title = $package['title'];
					$operators->country_image = json_encode($package['image']);
					$operators->style = $operator['style'];
					$operators->gradient_start = $operator['gradient_start'];
					$operators->gradient_end = $operator['gradient_end'];
					$operators->type = $operator['type'];
					$operators->is_prepaid = $operator['is_prepaid'];
					$operators->title = $operator['title'];
					$operators->esim_type = $operator['esim_type'];
					$operators->warning = $operator['warning'];
					$operators->apn_type = $operator['apn_type'];
					$operators->apn_value = $operator['apn_value'];
					$operators->is_roaming = $operator['is_roaming'];
					$operators->info = json_encode($operator['info']);
					$operators->image = json_encode($operator['image']);
					$operators->plan_type = $operator['plan_type'];
					$operators->activation_policy = $operator['activation_policy'];
					$operators->is_kyc_verify = $operator['is_kyc_verify'];
					$operators->rechargeability = $operator['rechargeability'];
					$operators->other_info = $operator['other_info'];
					$operators->save();
            		foreach ($operator['coverages'] as $key => $data) {
            			$coverage = Coverage::where('operator_id', $operator['id'])->first();
						if (!$coverage) {
						    $coverage = new Coverage;
						}
						$coverage->operator_id = $operator['id'];
						$coverage->name = $data['name'];
						$coverage->save();

	                    foreach ($data['networks'] as $key => $network) {
	                    	CoverageNetwork::where('coverage_id', $coverage->id)->where('operator_id', $operator['id'])->delete();
	                    	$coverageNetwork = new CoverageNetwork;
					        $coverageNetwork->coverage_id = $coverage->id;
					        $coverageNetwork->operator_id = $operator['id'];
					        $coverageNetwork->name = $network['name'];
					        $coverageNetwork->save();

	                    	foreach ($network['types'] as $key => $type) {
	                    		CoverageNetworkType::where('coverage_network_id', $coverageNetwork->id)->where('operator_id', $operator['id'])->delete();
	                    		$coverageNetworkType = new CoverageNetworkType;
						        $coverageNetworkType->coverage_network_id = $coverageNetwork->id;
						        $coverageNetworkType->operator_id = $operator['id'];
						        $coverageNetworkType->types = $type;
			                    $coverageNetworkType->save();
	                    	}
	                    }
            		}
            		foreach ($operator['packages'] as $key => $value) {
            			$package = Package::where('operator_id', $operator['id'])->first();

						if (!$package) {
						    $package = new Package;
						}
            			$package->operator_id = $operator['id'];
            			$package->package_id = $value['id'];
            			$package->type = $value['type'];
            			$package->price = $value['price'];
            			$package->amount = $value['amount'];
            			$package->day = $value['day'];
            			$package->is_unlimited = $value['is_unlimited'];
            			$package->title = $value['title'];
            			$package->data = $value['data'];
            			$package->short_info = $value['short_info'] ?? null;
            			$package->voice = $value['voice'] ?? 0;
            			$package->text = $value['text'] ?? 0;
            			$package->save();
            		}
            		foreach ($operator['countries'] as $key => $value) {
            			$packageCountry = PackageCountry::where('operator_id', $operator['id'])->first();
						if (!$packageCountry) {
						    $packageCountry = new PackageCountry;
						}
            			$packageCountry->operator_id = $operator['id'];
            			$packageCountry->country_code = $value['country_code'];
            			$packageCountry->title = $value['title'];
            			$packageCountry->width = $value['image']['width'];
            			$packageCountry->height = $value['image']['height'];
            			$packageCountry->url = $value['image']['url'];
            			$packageCountry->save();
            		}
			        
			    }
            }
           
            
            DB::commit();
            if ($request->ajax()) {
                return response()->json(['success' => 'Package updated successfully'], 200);
            }
           return redirect(route('index_package'))->with('successMessage', 'Synced successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('index_package'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }            
    }

    public function show($id)
    { 
    	$operator = Operator::where('operator_id', $id)->first();
        $coverages = Coverage::where('operator_id', $id)->get();
        $packages = Package::where('operator_id', $id)->get();
        $packageCountries = PackageCountry::where('operator_id', $id)->get();
        return view('operators.view', compact('operator', 'coverages', 'packages', 'packageCountries'));

    }

    public function showCoverage($id)
    {  
        $coverage = Coverage::where('id', $id)->first();
        $coverageNetworks = CoverageNetwork::with('coverageNetworkTypes')->where('coverage_id', $id)->get();
        return view('operators.view_coverage', compact('coverage', 'coverageNetworks'));
    }
}
