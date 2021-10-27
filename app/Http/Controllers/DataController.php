<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Models\division;
use App\Models\sub_district;
use App\Models\User_collection_Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $divisions = division::all();
        return view('dashboard.data',compact('divisions'));
    }
    public function get_districts(){
        $div_id = request('division');
        $districts = district::where('parent_id',$div_id)->get();
        $option=array("<option value=''>Select District</option>");
        foreach ($districts as $district) {
            array_push($option,'<option value="'.$district->bbs_code.'">'.$district->name.'</option>'); 
        }
        return $option;
        
    }
    public function get_sub_districts(){
        $dis_id = request('district');
        $sub_districts = sub_district::where('parent_id',$dis_id)->get();
        $options=array("<option value=''>Select Sub District</option>");
        foreach ($sub_districts as $sub_district) {
            array_push($options,'<option value="'.$sub_district->bbs_code.'">'.$sub_district->name.'</option>'); 
        }
        return $options;
        
    }
    public function add_data(Request $request){
        $all_data = new User_collection_Data();
        $all_data->date = $request->date;
        $all_data->division = $request->division;
        $all_data->district = $request->district;
        $all_data->sub_district = $request->sub_district;
        $all_data->village_order = $request->village_order;
        $all_data->city_order = $request->city_order;
        $all_data->supply_order = $request->supply_order;
        $all_data->village_supply_order = $request->village_supply_order;
        $all_data->city_supply_order = $request->city_supply_order;
        $all_data->product_type = $request->product_type;
        $all_data->total_transaction = $request->total_transaction;
        $all_data->inter_commission = $request->inter_commission;
        $all_data->source_amount = $request->source_amount;
        $all_data->digital_center = $request->digital_center;
        $all_data->join_digital_center = $request->join_digital_center;
        $all_data->trans_digital_center = $request->trans_digital_center;
        $all_data->others_center = $request->others_center;

        $all_data->save();
        return redirect()->back()->with('success','Data Add Successfully');
    }
}
