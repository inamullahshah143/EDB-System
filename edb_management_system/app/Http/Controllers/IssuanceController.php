<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;
use App\Models\PctSubHeading;
use App\Models\Vehicle;
use App\Models\File;
use App\Models\User;
use App\Models\Role;
use App\Models\RegisterOem;
use Illuminate\Http\Request;
use App\Imports\FormatOneImport;
use App\Imports\FormatTwoImport;
use Excel;
use DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Carbon\Carbon;

class IssuanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $role_list = array();
        $roles = Role::all();
        foreach ($roles as $role) {
            $role_list[] = array('name' => $role->name, 'value' => $role->guard_name);
        }
        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_edb',
            'content' => 'edb.content.view_issuance_application',
            'title' => 'Issuance Of Import Quota Requests',
            'role_list' => $role_list
        ];

        if ($request->ajax()) {
            $q_heading = DB::table('issuance_applications')->select('*');
            return Datatables::of($q_heading)
                ->addIndexColumn()
                ->addColumn('oem_details', function ($row) {
                $user = User::where('id', $row->oem_id)->get()->first();
                $oem = RegisterOem::where('oem_id', $row->oem_id)->get()->first();
                $btn = '<button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                    data-target="#oem_details" id="oemDetailBtn" data-username="'.$user->name.'" data-email="'.$user->email.'"  data-phone="'.$oem->phone.'" data-secp-registration-no="'.$oem->secp_registration_no.'" data-ntn-no="'.$oem->ntn_no.'" data-strn-no="'.$oem->strn_no.'" data-product-brand="'.$oem->product_brand.'" data-poc="'.$oem->poc.'" data-poc-cell="'.$oem->poc_cell.'" data-contact="'.$oem->contact.'" data-registration-address="'.$oem->registration_address.'" data-factory-address="'.$oem->factory_address.'">View
                    Details</button>';
                return $btn;
                })->addColumn('vehicle_details', function ($row) {
                $vehicle = Vehicle::where('id', $row->vehicle_id)->get()->first();
                $btn = '<button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                    data-target="#vehicle_details" id="vehicleDetailBtn" data-name="'.$vehicle->name.'"
                    data-make="'.$vehicle->make.'"
                    data-model="'.$vehicle->model.'" data-hs-code="'.$vehicle->hs_code.'"
                    data-category="'.$vehicle->category.'" data-sro="'.$vehicle->under_sro.'">View
                    Details</button>';
                return $btn;
                })->addColumn('technical_agreement_doc', function ($row) {
                $file = File::where('id', $row->technical_agreement_doc_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Technical Agreement Document" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('purchase_doc_of_plant', function ($row) {
                $file = File::where('id', $row->purchase_doc_of_plant_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Purchase Document of Plant" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('snaps_of_inhouse_facilities', function ($row) {
                $file = File::where('id', $row->snaps_of_inhouse_facilities_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Snaps of innhouse Facilities" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('copies_of_sales_tax_certificate', function ($row) {
                $file = File::where('id', $row->copies_of_sales_tax_certificate_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Copies of Sales Tax Certificate" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('factory_map', function ($row) {
                $file = File::where('id', $row->factory_map_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Factory Map" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('manpower_break_up', function ($row) {
                $file = File::where('id', $row->manpower_break_up_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Manpower Breakup" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('address_of_factory', function ($row) {
                $file = File::where('id', $row->address_of_factory_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Address of Factory" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('name_of_chief_executive', function ($row) {
                $file = File::where('id', $row->name_of_chief_executive_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Name of Chief Executive" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
                })->addColumn('list_of_plant', function ($row) {
                $file = File::where('id', $row->list_of_plant_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn"
                    data-target="#pdf_modal" data-title="List of Plants" data-file="' . $storage_path . '"><i
                    class="fa fa-file-pdf-o"></i></button>';
                return $btn;
                })->addColumn('list_of_vendor', function ($row) {
                $file = File::where('id', $row->list_of_vendor_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="List of Vendors" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
            })->addColumn('brand_details', function ($row) {
                $file = File::where('id', $row->brand_detail_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Brand Details" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
            })->addColumn('parts_catalogue', function ($row) {
                $file = File::where('id', $row->parts_catalogue_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Parts Catalogue" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
            })->addColumn('lease_agreement', function ($row) {
                $file = File::where('id', $row->lease_agreement_id)->get()->first();
                $storage_path = storage_path("app/$file->path");
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#pdf_modal"
                    data-title="Lease Agreement" data-file="' . $storage_path . '"><i class="fa fa-file-pdf-o">
                    </i>
                </button>';
                return $btn;
            })->addColumn('ckd_under_656', function ($row) {
                $btn = '<button type="button" class="btn" data-toggle="modal" id="pdfBtn" data-target="#sro_656_ckd_modal"><i class="fa fa-file-excel-o"></i></button>';
                return $btn;
            })->addColumn('ckd_under_693', function ($row) {
                $btn = '<button type="button" class="btn"><i class="fa fa-file-excel-o"></i></button>';
                return $btn;
            })->addColumn('action', function ($row) {
                $btn = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#proceed_application" id="proceedBtn">Proceed</button>';
                return $btn;
            })->rawColumns(['oem_details','vehicle_details','technical_agreement_doc','purchase_doc_of_plant','snaps_of_inhouse_facilities','copies_of_sales_tax_certificate','factory_map','manpower_break_up','address_of_factory','name_of_chief_executive','list_of_plant', 'list_of_vendor', 'brand_details',
                'parts_catalogue','lease_agreement', 'ckd_under_656', 'ckd_under_693', 'action'])
                ->make(true);
        }
        return view('layouts.v_template', $data);
    }

    public function get656CKD(Request $request){
        dd(Under656Part::all());
        if ($request->ajax()) {
            $q_ckd = Under656Part::all();
            return Datatables::of($q_ckd)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function application(Request $request)
    {
        $isApplied = null;
        $trackingId = null;
        if (IssuanceApplication::where('oem_id', Auth::id())->exists()) {
            $isApplied = 1;
            $result = IssuanceApplication::where('oem_id', Auth::id())->get()->first();
            $trackingId = $result->tracking_id;
        } else {
            $isApplied = 0;
        }

        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'isApplied' => $isApplied,
            'trackingId' => $trackingId,
            'menu' => 'menu.v_menu_oem',
            'content' => 'oem.content.view_issuance_application',
            'title' => 'Apply for Issuance Of Import Quota'
        ];
        return view('layouts.oem_template', $data);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if (Carbon::parse($request->technical_assistance_agreement)->gte(Carbon::now()->addYears(3)->format('Y-m-d')) && Carbon::parse($request->purchase_doc_of_plant_validity)->gte(Carbon::now()->addYears(3)->format('Y-m-d')) && Carbon::parse($request->lease_agreement_validity)->gte(Carbon::now()->addYears(3)->format('Y-m-d'))) {
            try {
                if (PctSubHeading::where('sub_pct_heading', $request->vehicle_hs_code)->exists()) {
                    $technical_agreement_doc = time().'.'.$request->file('technical_agreement_doc')->getClientOriginalExtension();
                    $technical_agreement_doc_path = $request->technical_agreement_doc->storeAs('public/Technical Agreement Doc',$technical_agreement_doc);
                    $technical_agreement_doc_id = File::create(['path' => $technical_agreement_doc_path, 'type' => 'Technical Agreement Doc',])->id;
                   
                    $purchase_doc_of_plant = time().'.'.$request->file('purchase_doc_of_plant')->getClientOriginalExtension();
                    $purchase_doc_of_plant_path = $request->purchase_doc_of_plant->storeAs('public/Purchase doc of Plant',$purchase_doc_of_plant);
                    $purchase_doc_of_plant_id = File::create(['path' => $purchase_doc_of_plant_path, 'type' => 'Purchase doc of Plant',])->id;

                    $snaps_of_inhouse_facilities = time().'.'.$request->file('snaps_of_inhouse_facilities')->getClientOriginalExtension();
                    $snaps_of_inhouse_facilities_path = $request->snaps_of_inhouse_facilities->storeAs('public/Snaps of Inhouse Facilities',$snaps_of_inhouse_facilities);
                    $snaps_of_inhouse_facilities_id = File::create(['path' => $snaps_of_inhouse_facilities_path, 'type' => 'Snaps of Inhouse Facilities',])->id;

                    $copies_of_sales_tax_certificate = time().'.'.$request->file('copies_of_sales_tax_certificate')->getClientOriginalExtension();
                    $copies_of_sales_tax_certificate_path = $request->copies_of_sales_tax_certificate->storeAs('public/Copies of Sales Tax Certificate',$copies_of_sales_tax_certificate);
                    $copies_of_sales_tax_certificate_id = File::create(['path' => $copies_of_sales_tax_certificate_path, 'type' => 'Copies of Sales Tax Certificate',])->id;
                    
                    $factory_map = time().'.'.$request->file('factory_map')->getClientOriginalExtension();
                    $factory_map_path = $request->factory_map->storeAs('public/Factory Map',$factory_map);
                    $factory_map_id = File::create(['path' => $factory_map_path, 'type' => 'Factory Map',])->id;

                    $manpower_break_up = time().'.'.$request->file('manpower_break_up')->getClientOriginalExtension();
                    $manpower_break_up_path = $request->manpower_break_up->storeAs('public/Manpower Breakup',$manpower_break_up);
                    $manpower_break_up_id = File::create(['path' => $manpower_break_up_path, 'type' => 'Manpower Breakup',])->id;

                    $address_of_factory = time().'.'.$request->file('address_of_factory')->getClientOriginalExtension();
                    $address_of_factory_path = $request->address_of_factory->storeAs('public/Address of Factory',$address_of_factory);
                    $address_of_factory_id = File::create(['path' => $address_of_factory_path, 'type' => 'Address of Factory',])->id;

                    $name_of_chief_executive = time().'.'.$request->file('name_of_chief_executive')->getClientOriginalExtension();
                    $name_of_chief_executive_path = $request->name_of_chief_executive->storeAs('public/Name of Chief Executive',$name_of_chief_executive);
                    $name_of_chief_executive_id = File::create(['path' => $name_of_chief_executive_path, 'type' => 'Name of Chief Executive',])->id;

                    $list_of_plant = time() . '.' . $request->file('list_of_plant')->getClientOriginalExtension();
                    $list_of_plant_path = $request->list_of_plant->storeAs('public/List of Plants', $list_of_plant);
                    $list_of_plant_id = File::create(['path' => $list_of_plant_path, 'type' => 'List of Plants',])->id;

                    $brand_detail = time() . '.' . $request->file('brand_detail')->getClientOriginalExtension();
                    $brand_detail_path = $request->brand_detail->storeAs('public/Brand Details', $brand_detail);
                    $brand_detail_id = File::create(['path' => $brand_detail_path, 'type' => 'Brand Details',])->id;

                    $list_of_vendor = time() . '.' . $request->file('list_of_vendor')->getClientOriginalExtension();
                    $list_of_vendor_path = $request->list_of_vendor->storeAs('public/List of Vendors', $list_of_vendor);
                    $list_of_vendor_id = File::create(['path' => $list_of_vendor_path, 'type' => 'List of Vendors',])->id;

                    $parts_catalogue = time() . '.' . $request->file('parts_catalogue')->getClientOriginalExtension();
                    $parts_catalogue_path = $request->parts_catalogue->storeAs('public/Parts Catalogues', $parts_catalogue);
                    $parts_catalogue_id = File::create(['path' => $parts_catalogue_path, 'type' => 'Parts Catalogue',])->id;

                    $lease_agreement = time() . '.' . $request->file('lease_agreement')->getClientOriginalExtension();
                    $lease_agreement_path = $request->lease_agreement->storeAs('public/Lease Agreements', $lease_agreement);
                    $lease_agreement_id = File::create(['path' => $lease_agreement_path, 'type' => 'Lease Agreements',])->id;

                    $vehicleData = array(
                        "oem_id" => Auth::id(),
                        "name" => $request->vehicle_name,
                        "hs_code" => $request->vehicle_hs_code,
                        "make" => $request->vehicle_maker,
                        "model" => $request->vehicle_model,
                        "under_sro" => $request->under_sro,
                        "category" => $request->vehicle_category,
                    );
                    $vehicle_id = Vehicle::create($vehicleData)->id;
                    $application_id = IssuanceApplication::create([
                        'oem_id' => Auth::id(),
                        'vehicle_id' => $vehicle_id,
                        'tracking_id' => UniqueIdGenerator::generate([
                            'table' => 'issuance_applications',
                            'field' => 'tracking_id',
                            'length' => 10,
                            'prefix' => 'ISS-'
                        ]),
                        'list_of_plant_id' => $list_of_plant_id,
                        'brand_detail_id' => $brand_detail_id,
                        'list_of_vendor_id' => $list_of_vendor_id,
                        'parts_catalogue_id' => $parts_catalogue_id,
                        'lease_agreement_id' => $lease_agreement_id,
                        'technical_agreement_doc_id' => $technical_agreement_doc_id,
                        'purchase_doc_of_plant_id' => $purchase_doc_of_plant_id,
                        'snaps_of_inhouse_facilities_id' => $snaps_of_inhouse_facilities_id,
                        'copies_of_sales_tax_certificate_id' => $copies_of_sales_tax_certificate_id,
                        'factory_map_id' => $factory_map_id,
                        'manpower_break_up_id' => $manpower_break_up_id,
                        'address_of_factory_id' => $address_of_factory_id,
                        'name_of_chief_executive_id' => $name_of_chief_executive_id,
                        'technical_assistance_agreement' => $request->technical_assistance_agreement,
                        'purchase_doc_of_plant_validity' => $request->purchase_doc_of_plant_validity,
                        'lease_agreement_validity' => $request->lease_agreement_validity,
                        'application_status' => 0
                    ])->id;

                    Excel::import(new FormatOneImport($application_id, $vehicle_id, 0), request()->file('format_one'));
                    Excel::import(new FormatTwoImport($application_id, $vehicle_id, 0), request()->file('format_two'));
                    return response()->json(['success' => 'Application Posted Successfully!']);
                } else {
                    return response()->json(['error' => 'Invalid Vehicle HS Code']);
                }

            } catch (\Exception $e) {
                return response()->json(['error' => $e]);
            }
        } else {
            return response()->json(['error' => 'Lease Agreement is Not Valid']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
