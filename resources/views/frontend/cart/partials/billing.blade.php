<div class="col-12 mb-3">
    <div class="card border shadow-sm rounded-2">
        <div class="card-body p-4">
            <div class="pb-2 mb-2">
                <!-- Title -->
                <div class="mb-5">
                    <strong class="section-title font-size-18  mb-0 pb-2">Billing details</strong>
                </div>

                <div class="border-bottom pb-2 mb-2">
                    <strong class="font-size-18">Cart Total</strong>
                </div>
                <!-- End Title -->

                <!-- Billing Form -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Full Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="name" placeholder="Your Full Name"value="{{auth('customer')->user()->name ?? ''}}" 
                                required="" data-msg="Please enter your full name." data-error-class="u-has-error"
                                data-success-class="u-has-success" autocomplete="off">
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="w-100"></div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Email Address (optional)
                            </label>
                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{auth('customer')->user()->email ?? ''}}"
                                aria-label="Email Address" data-msg="Please enter your email address."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <!-- End Input -->
                    </div>
                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Phone Number <strong class="text-danger">*</strong>
                            </label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{auth('customer')->user()->phone ?? ''}}"
                                aria-label="Phone Number" data-msg="Please enter your phone number."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <!-- End Input -->
                    </div>
                    <div class="col-md-12">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Full Address * <strong class="text-danger">*</strong>
                            </label>
                            <input type="text" class="form-control" name="address" placeholder="Full Address" value="{{auth('customer')->user()->address ?? ''}}"
                                aria-label="Full Address" data-msg="Please enter your full address."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                City
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control js-select selectpicker dropdown-select" required=""
                                data-msg="Please select country." data-error-class="u-has-error"
                                data-success-class="u-has-success" data-live-search="true"
                                data-style="form-control border-color-1 font-weight-normal" id="district-select"
                                name="district">
                                @foreach ($districts as $key => $district)
                                    <option value="{{ $district->name }}" {{ $key == 46 ? 'selected' : '' }}>
                                        {{ $district->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message">
                            <label class="form-label" for="destination">
                                Shipping Destination
                            </label>
                            <select class="form-control" id="destination" name="destination" disabled>
                                <option value="inside_dhaka">Inside Dhaka</option>
                                <option value="outside_dhaka">Outside Dhaka</option>
                            </select>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="w-100"></div>
                </div>
                <!-- End Billing Form -->

                <!-- Input -->
                <div class="js-form-message">
                    <label class="form-label">
                        Order notes (optional)
                    </label>

                    <div class="input-group">
                        <textarea class="form-control p-5" rows="4" name="note"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
                <!-- End Input -->
            </div>
        </div>
    </div>
</div>
