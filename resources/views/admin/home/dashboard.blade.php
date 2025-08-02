@extends('admin.layout')

@section('content')

@php 
    $maintenance_mode = check_isset_or_null($general_settings, 'maintenance_mode', false);
    $statusClass = $maintenance_mode == 1 ? 'form-switch-success' : ''; 
    $statusAttr = $maintenance_mode == 1 ? 'checked' : '';
@endphp

    <div class="page-content">
        <div class="container-fluid">
            
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <h4 class="fs-16 mb-1">Hello, {{ check_isset_or_null($company_profile, 'company_name', '#Name') }}!</h4>
                        <div class="d-flex flex-column align-items-end">
                            <h4 class="fs-12">Maintenance Mode</h4>
                            <div id="maintenance_mode_input_div" class="form-check form-switch form-switch-md {{ $statusClass }}">
                                <input class="form-check-input maintenance-mode-update-checkbox" {{ $statusAttr }} type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Maintainence Mode Actiavted -->
             <div class="row maintenance_mode_alert {{ $maintenance_mode ? '' : 'd-none' }}">
                <div class="col-12">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center"
                                    role="alert">
                                    <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i>
                                    <div class="flex-grow-1 text-truncate">
                                        Your Webiste is in <b> maintenance</b> Mode.
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                </div>
            </div>

            {{-- Package Details --}}
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center"
                                    role="alert">
                                    <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i>
                                    <div class="flex-grow-1 text-truncate">
                                        Your free trial expired in <b>17</b> days.
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="pages-pricing.html"
                                            class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                                    </div>
                                </div>

                                <div class="row align-items-end">
                                    <div class="col-sm-8">
                                        <div class="p-3">
                                            <p class="fs-17 lh-base">Upgrade your plan from a <span
                                                    class="fw-semibold">Free
                                                    trial</span>, to ‘Premium Plan’ <i
                                                    class="mdi mdi-arrow-right"></i></p>
                                            <div class="mt-3">
                                                <a href="pages-pricing.html" class="btn btn-success">Upgrade
                                                    Account!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                </div>
            </div>


            <div class="card overflow-hidden shadow-none">
                <div class="card-body bg-danger-subtle">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-danger-subtle text-danger rounded-circle fs-17">
                                    <i class="ri-gift-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-16">Invite your friends to Velzon</h6>
                            <p class="text-muted mb-0">Nor again is there anyone who loves or pursues or desires to obtain
                                pain of itself, because it is pain, but because occasionally.</p>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <a href="#!" class="btn btn-danger">Invite Friends</a>
                    </div>
                </div>
            </div>

            {{-- Update Account Details. --}}
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="alert alert-secondary border-0 rounded-0 m-0 d-flex align-items-center"
                                    role="alert">
                                    <div class="fs-14 flex-grow-1 text-truncate">
                                        Lets Get started, Configure Below Elements.
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-sm-12 fs-18">
                                        <div class="list-group list-group-fill-success">
                                            <a href="{{ route('admin.profile') }}" class="list-group-item list-group-item-action"><i class="ri-account-circle-line align-middle me-2"></i>Update Your Profile</a>
                                            <a href="{{ route('admin.profile') }}" class="list-group-item list-group-item-action disabled"><i class="ri-scissors-2-fill align-middle me-2"></i>Add Your Services</a>
                                            <a href="{{ route('admin.profile') }}" class="list-group-item list-group-item-action disabled"><i class="ri-user-star-line align-middle me-2"></i>Add Your Employees</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Greetings --}}
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="mt-3 mt-lg-0">
                            <div class="row g-3 mb-0 align-items-center">
                                <!--end col-->
                                <div class="col-auto">
                                    <a type="button" class="btn btn-soft-success"><i
                                            class="ri-add-circle-line align-middle me-1"></i>
                                        Add New Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <h1>Hello There</h1>
        </div>
    </div>

@stop
