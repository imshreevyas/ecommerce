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
                        <!-- <div class="d-flex flex-column align-items-end">
                            <h4 class="fs-12">Maintenance Mode</h4>
                            <div id="maintenance_mode_input_div" class="form-check form-switch form-switch-md {{ $statusClass }}">
                                <input class="form-check-input maintenance-mode-update-checkbox" {{ $statusAttr }} type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
