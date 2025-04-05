@extends('layouts.master')

@section('style')
<style>
    .user-picture img {
        border: 5px solid #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        padding: 0.5rem 2rem;
        font-weight: 500;
    }

    .info-pair {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e9ecef;
    }
</style>
@endsection

@section('contents')
<div class="container-fluid profile-container shadow">

    <div class="panel">
        <div class="panel-header mb-4">
            <h3 class="text-white">Profile Details</h3>
        </div>

        <div class="row g-4">

           
            <div class="col-md-4 mt-2">
                <div class="card-client shadow rounded-4 p-4">
                    <div class="user-picture text-center mb-3">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                             alt="User Image"
                             class="img-fluid rounded-circle"
                             width="150">
                    </div>
                    <div class="text-center">
                        <p>First Name: <strong>Super Admin</strong></p>
                        <p>Last Name: <strong>Super</strong></p>
                    </div>

                    <div>
                        <div class="info-pair d-flex flex-wrap">
                            <p class="info-title text-dark fw-bold">Email</p>
                            <p class="info-value">ProfileInformation@gmail.com</p>
                        </div>
                        <div class="info-pair">
                            <p class="info-title text-dark fw-bold">Logged In As</p>
                            <p class="info-value">Profile Information</p>
                        </div>
                        <div class="info-pair">
                            <p class="info-title text-dark fw-bold">Contact No</p>
                            <p class="info-value">+91 8738273873</p>
                        </div>
                        <div class="info-pair">
                            <p class="info-title text-dark fw-bold">Gender</p>
                            <p class="info-value">Male</p>
                        </div>
                        <div class="info-pair">
                            <p class="info-title text-dark fw-bold">DOB</p>
                            <p class="info-value">01 Jan 1990</p>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="col-md-8 px-4">
                <form class="mt-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="profile-label">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                        </div>
                        <div class="col-md-6">
                            <label class="profile-label">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" placeholder="Enter Zipcode" required>
                        </div>

                        <div class="col-md-12">
                            <label class="profile-label">State</label>
                            <select class="form-select form-control" name="state" required>
                                <option value="">Select State</option>
                                <option value="1">State 1</option>
                                <option value="2">State 2</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-lebel">Permanent Address</label>
                            <textarea class="form-control mb-2" name="permanent_address"  placeholder="Enter Permanent Address"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="exampleTextarea" class="form-label">Correspondence Address <span><input class="form-check-input" type="checkbox" id="inlineFormCheck"></span>Same as permanent</label>
                            <textarea class="form-control" name="correspondence_address"  placeholder="Enter Correspondence Address"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
