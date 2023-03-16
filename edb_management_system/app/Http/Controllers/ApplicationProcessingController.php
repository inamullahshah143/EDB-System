<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationProcessingController extends Controller
{
    
    public function applicationRemarks(Request $request){
       if( $request->input('action') == 'revision'){
        dd('revision');
       }elseif($request->input('action') == 'reject'){
        dd('reject');
        // try {
        //     $data = array(
        //         'manufecturer_id' => $request->input('manufecturer_id'),
        //         'application_id' => $request->input('application_id'),
        //         'technical_agreement_doc_remarks' => $request->input('technical_agreement_doc_remarks'),
        //         'technical_agreement_doc_validatity_remarks' => $request->input('technical_agreement_doc_validatity_remarks'),
        //         'list_of_plant_remarks' => $request->input('list_of_plant_remarks'),
        //         'purchase_documents_of_plant_remarks' => $request->input('purchase_documents_of_plant_remarks'),
        //         'snaps_of_inhouse_facilities_remarks' => $request->input('snaps_of_inhouse_facilities_remarks'),
        //         'copies_of_sales_tax_remarks' => $request->input('copies_of_sales_tax_remarks'),
        //         'products_brand_name_remarks' => $request->input('products_brand_name_remarks'),
        //         'proof_of_factory_remarks' => $request->input('proof_of_factory_remarks'),
        //         'complete_factory_map_remarks' => $request->input('complete_factory_map_remarks'),
        //         'address_of_factory_remarks' => $request->input('address_of_factory_remarks'),
        //         'name_of_chief_executive_remarks' => $request->input('name_of_chief_executive_remarks'),
        //         'manpower_break_up_remarks' => $request->input('manpower_break_up_remarks'),
        //         'parts_catalogue_remarks' => $request->input('parts_catalogue_remarks'),
        //         'noc_from_municipal_remarks' => $request->input('noc_from_municipal_remarks'),
        //         'registration_of_firm_remarks' => $request->input('registration_of_firm_remarks'),
        //         'format_I_remarks' => $request->input('format_I_remarks'),
        //         'format_II_remarks' => $request->input('format_II_remarks'),
        //     );
        //         DB::table('application_remarks')->insert($data);
        //         Toastr::success('Remarks Submited Successfully :)', 'Success');
        //         DB::commit();
        //         return redirect()->back();
        // }
        // catch (\Exception $e) {
        //         DB::rollback();
        //         return $e;
        // }
        }
        else{
            
        }
    }
}
