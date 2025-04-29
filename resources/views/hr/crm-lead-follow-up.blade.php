@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="panel shadow-sm">
            <div class="panel-header">
                <h3 class="mt-2">Lead Tracker Data</h3>
            </div>
            <div class="row mt-3 px-3">
                <!-- Lead Summary Section -->
                <div class="col-md-9">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light">
                            <strong>Lead Summary</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Project Name:</strong> NA</div>
                                <div class="col-sm-6 col-md-4"><strong>Client Name:</strong> NA</div>
                                <div class="col-sm-6 col-md-4"><strong>Deadline:</strong> NA</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Category:</strong> NA</div>
                                <div class="col-sm-6 col-md-4"><strong>Source:</strong> NA</div>
                                <div class="col-sm-6 col-md-4"><strong>Lead Created On:</strong> NA</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Lead Status:</strong> NA</div>
                                <div class="col-sm-6 col-md-4">
                                    <strong>Follow Up Status:</strong>
                                    <span class="badge bg-danger" style="font-size: 10px;">Disabled</span>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{route('view-crm-details')}}"> <button type="button"
                                            class="btn btn-sm btn-outline-primary">
                                            View More Details
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Information Panel -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <strong>Information</strong>
                        </div>
                        <div class="card-body">
                            <div><strong>Currently Assigned:</strong> NA</div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Lead Tracker Data -->

            <div class="col-md-12   text-center fs-6 fw-bold text-dark">
                Lead Tracker
                <hr>
            </div>

            <!-- Comment Section -->

            <div class="row px-3">
                <div class="col-md-12">
                    <p class="text-center fw-bold">Activity Not Started Yet</p>
                    <label for="body" class="form-label">Comment <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="body" rows="6" id="body"
                        placeholder="Write your message here"></textarea>

                </div>
            </div>

            <!-- Follow Up Date -->
            <div class="row px-3">
                <div class="col-md-6 mb-3">

                    <label for="followUpDate" class="form-label">Next Follow Up Date <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="followUpDate" required>
                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Attachment</label>
                    <input type="file" class="form-control" name="attachment">

                </div>
            </div>

            <!-- Submit button -->
            <div class="row px-3 py-4">
                <div class="col-md-12 d-flex justify-content-end gap-2 mt-3">

                    <div>
                        <button type="button" class="btn btn-sm btn-primary">Cancel</button>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Follow Up</button>

                    </div>

                </div>
            </div>

            <!-- Win or / Lose -->

            <div class="row" style="position: relative;">
                <div class="col-md-12 d-flex justify-content-end gap-2 mt-3 mx-3 border border-white bg-dark "
                    style="max-width: 10%; position:fixed; z-index: 100; right: 0; bottom: 50px;  padding: 10px; border-radius: 10px;">
                    <div>
                        <button type="button" class="btn btn-sm btn-info">Win</button>

                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-danger">Lose</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/compose.js')}}"></script>
@endsection