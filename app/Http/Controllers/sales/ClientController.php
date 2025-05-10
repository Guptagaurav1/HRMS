<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientList;
use App\Models\ClientAttachType;
use App\Models\ClientAttachment;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyType;
use App\Models\Industry;
use App\Models\ClientReference;
use Illuminate\Support\Facades\DB;
use Throwable;

class ClientController extends Controller
{
    /**
     * Clients listing.
     */
    public function index(Request $request)
    {
        $clients = ClientList::select('id', 'client_name', 'department_name', 'company_address', 'd_maker_name', 'd_maker_email', 'd_maker_phone', 'created_by', 'created_at');

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $clients = $clients->where('client_name', 'LIKE', "%$search%")
                        ->orWhere('id', 'LIKE', "%$search%")
                        ->orWhere('department_name', 'LIKE', "%$search%")
                        ->orWhere('company_address', 'LIKE', "%$search%")
                        ->orWhere('d_maker_name', 'LIKE', "%$search%")
                        ->orWhere('d_maker_email', 'LIKE', "%$search%")
                        ->orWhere('d_maker_phone', 'LIKE', "%$search%")
                        ->orWhereHas('user',  function ($query) use ($search) {
                            $query->whereRaw("CONCAT(first_name, ' ',last_name) LIKE ?", ["%$search%"]);
                        });
        }
        $clients = $clients->orderByDesc('id')->paginate(25)->withQueryString();

        return view("sales.clients.client-list", compact('clients', 'search'));
    }

    /**
     * Add Client Form.
     */
    public function add()
    {
        $attachment_type = ClientAttachType::select('attach_type')->get();
        $states = State::select('state', 'id')->get();
        $company_type = CompanyType::select('type_name')->where('status', '1')->get();
        $industries = Industry::select('id', 'category_name')->where('active', 'Yes')->get();
        $references = ClientReference::select('id', 'ref_name')->where('status', 'active')->get();
        return view("sales.clients.create-new-client", compact('attachment_type', 'states', 'company_type', 'industries', 'references'));
    }

    /**
     * Add Client Form.
     */
    public function edit($id)
    {
        try {
            $client = ClientList::findOrFail($id);
            $attachment_type = ClientAttachType::select('attach_type')->get();
            $states = State::select('state', 'id')->get();
            $company_type = CompanyType::select('type_name')->where('status', '1')->get();
            $industries = Industry::select('id', 'category_name')->where('active', 'Yes')->get();
            $references = ClientReference::select('id', 'ref_name')->where('status', 'active')->get();
            $cities = '';
            if ($client->company_state) {
                $cities = City::select('id', 'city_name')->where('state_code', $client->company_state)->get();
            }
            return view("sales.clients.edit-new-client", compact('attachment_type', 'states', 'company_type', 'industries', 'references', 'client', 'cities'));
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-clients.list')->with(['error' => true, 'message' => 'No Record Found']);
        }
    }

    /**
     * Store Client Details.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => ['required', 'string'],
            'department_name' => ['required', 'string'],
            'consern_ministry' => ['required', 'string'],
            'contact_email' => ['email'],
            'p_email' => ['email'],
        ]);

        try {
            DB::beginTransaction();
            // echo "<pre>";
            // print_r($request->all());
            // echo "</pre>";
            // // die;
            $data = $request->all();

            unset($data['_token']);
            unset($data['file_name']);
            unset($data['file_type']);

            $client_id = ClientList::create($data)->id;

            if ($request->file_type && count($request->file_type) > 0) {
                for ($i = 0; $i < count($request->file_type); $i++) {

                    if ($request->hasFile('file_name.' . $i)) {
                        $file = $request->file('file_name.' . $i);
                        $client_file = 'client_' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/client'), $client_file);

                        // Store CLient Attachement
                        ClientAttachment::create([
                            'client_id' => $client_id,
                            'file_name' => $client_file,
                            'file_type' => $request->file_type[$i],
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('sales-clients.list')->with(['success' => true, 'message' => 'Client added successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-clients.list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Get clients and departments for suggestions.
     */
    public function get_clients(Request $request)
    {
        try {
            $clients = ClientList::where('status', '1')->pluck('client_name');
            $departments = ClientList::where('status', '1')->pluck('department_name');
            return response()->json(['success' => true, 'clients' => $clients, 'departments' => $departments]);
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'clients' => [], 'departments' => []]);
        }
    }

    /**
     * Update Client Details.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'client_name' => ['required', 'string'],
            'department_name' => ['required', 'string'],
            'consern_ministry' => ['required', 'string'],
            'contact_email' => ['email'],
            'p_email' => ['email'],
            'id' => ['required', 'integer']
        ]);

        try {
            DB::beginTransaction();

            $data = $request->all();

            unset($data['_token']);
            unset($data['file_name']);
            unset($data['file_type']);
            unset($data['remove_attachment']);

            ClientList::where('id', $request->id)->update($data);

            // Add new attachment.
            if ($request->file_type && count($request->file_type) > 0) {
                for ($i = 0; $i < count($request->file_type); $i++) {

                    if ($request->hasFile('file_name.' . $i)) {
                        $file = $request->file('file_name.' . $i);
                        $client_file = 'client_' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/client'), $client_file);

                        // Store CLient Attachement
                        ClientAttachment::create([
                            'client_id' => $request->id,
                            'file_name' => $client_file,
                            'file_type' => $request->file_type[$i],
                        ]);
                    }
                }
            }

            // Delete attachments if removed.
            if ($request->remove_attachment && count($request->remove_attachment) > 0) {
                ClientAttachment::destroy($request->remove_attachment);
            }
            DB::commit();
            return redirect()->route('sales-clients.list')->with(['success' => true, 'message' => 'Client updated successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-clients.list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * View Client Details.
     */
    public function view_details($id)
    {
        try {
            $client = ClientList::findOrFail($id);
            return view("sales.clients.view-client", compact('client'));
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-clients.list')->with(['error' => true, 'message' => 'No Record Found']);
        }
    }
}
