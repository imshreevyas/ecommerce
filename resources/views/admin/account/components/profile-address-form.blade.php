<form action="{{ route('admin.update-address-details') }}" method="POST">
    @csrf
    @php
        $operating_days_arr = old(
            'operating_days',
            json_decode(check_isset_or_null($admin_details->profile, 'operating_days', '{}'), true),
        );
        $opening_time = isset($admin_details->profile->opening_hour) ? date('H:i', strtotime($admin_details->profile->opening_hour)) : date('H:i', time());
        $closing_hour = isset($admin_details->profile->closing_hour) ? date('H:i', strtotime($admin_details->profile->closing_hour)) : date('H:i', time());
    @endphp
    <!--end col-->
    <div class="col-lg-12">
        <div class="mb-3 pb-2">
            <label for="exampleFormControlTextarea" class="form-label">Full Adrress</label>
            <textarea class="form-control" id="exampleFormControlTextarea" name="full_address" placeholder="Enter your Full Address"
                rows="3" value="{{ check_isset_or_null($admin_details->profile, 'full_address', '') }}">{{ check_isset_or_null($admin_details->profile, 'full_address', '') }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Support Contact Number</label>
                <input class="form-control" id="exampleFormControlTextarea" name="full_address" placeholder="Enter Support Contact Number" value="{{ check_isset_or_null($admin_details->profile, 'full_address', '') }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Support Contact Email</label>
                <input class="form-control" id="exampleFormControlTextarea" name="full_address" placeholder="Enter Support Email ID" value="{{ check_isset_or_null($admin_details->profile, 'full_address', '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Days</label>
                <select class="form-control" name="operating_days[]" data-choices data-choices-sorting-false
                    data-choices-removeItem data-choices-text-unique-true multiple id="operating_days">
                    <option value="monday" {{ in_array('monday', $operating_days_arr) ? 'selected' : '' }}>Monday
                    </option>
                    <option value="tuesday" {{ in_array('tuesday', $operating_days_arr) ? 'selected' : '' }}>Tuesday
                    </option>
                    <option value="wednesday" {{ in_array('wednesday', $operating_days_arr) ? 'selected' : '' }}>
                        Wednesday</option>
                    <option value="thrusday" {{ in_array('thrusday', $operating_days_arr) ? 'selected' : '' }}>Thrusday
                    </option>
                    <option value="friday" {{ in_array('friday', $operating_days_arr) ? 'selected' : '' }}>Friday
                    </option>
                    <option value="saturday" {{ in_array('saturday', $operating_days_arr) ? 'selected' : '' }}>Saturday
                    </option>
                    <option value="sunday" {{ in_array('sunday', $operating_days_arr) ? 'selected' : '' }}>Sunday
                    </option>
                </select>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Opening From</label>
                <input type="time" class="form-control" id="opening_hour" name="opening_hour"
                    data-provider="timepickr"
                    data-default-time="{{ old('opening_hour', $opening_time ) }}"
                    value="{{ old('opening_hour', $opening_time) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Closing Time</label>
                <input type="time" class="form-control" id="closing_hour" name="closing_hour"
                    data-provider="timepickr"
                    data-default-time="{{ old('closing_hour', $closing_hour) }}"
                    value="{{ old('closing_hour', $closing_hour) }}">
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-start">
            <button type="submit" class="btn btn-primary">Updates</button>
        </div>
    </div>
</form>
