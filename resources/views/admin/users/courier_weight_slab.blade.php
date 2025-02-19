@extends('layouts.admin')

@section('title', 'User Charges')

@section('content')
<div class="dashboard-main-body">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Edit Courier Weight Slab</h5>
        </div>

        <style>
            .switch {
                display: inline-block;
            }

            .switch input {
                display: none;
            }

            .switch label {
                display: block;
                width: 60px;
                height: 30px;
                padding: 3px;
                border-radius: 15px;
                border: 2px solid #000000;
                cursor: pointer;
                transition: 0.3s;
            }

            .switch label::after {
                content: "";
                display: inherit;
                width: 20px;
                height: 20px;
                border-radius: 12px;
                background: #1D30A3;
                transition: 0.3s;
            }

            .switch input:checked~label {
                border-color: #1D30A3;
            }

            .switch input:checked~label::after {
                translate: 30px 0;
                background: #554545;
            }

            .switch input:disabled~label {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .hidden-section {
                display: none;
            }
        </style>

        <div class="card-body">
            @foreach ($courierCompanies as $company)
            <form action="{{ route('save-weight-slabs') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ request()->user_id }}">
                <input type="hidden" name="company_id" value="{{ $company->id }}">

                <div class="row align-items-center mt-2">
                    <div class="col-md-3">
                        <p>{{ $company->name }}</p>
                    </div>

                    <div class="col-md-3">
                        <span class="switch">
                            <input id="switch-{{ strtolower($company->name) }}" type="checkbox"
                                class="toggle-switch"
                                data-target="{{ strtolower($company->name) }}"
                                {{ $company->isChecked ? 'checked' : '' }} />
                            <label for="switch-{{ strtolower($company->name) }}"></label>
                        </span>
                    </div>

                    <!-- Select Box (Multiple) -->
                    <div class="col-md-3 hidden-section select-container"
                        id="select-{{ strtolower($company->name) }}-container"
                        style="{{ $company->isChecked ? 'display:block' : 'display:none' }}">
                        <select class="form-select weight-slab-select"
                            name="weight_slab[]"
                            id="select-{{ strtolower($company->name) }}-field"
                            multiple>
                            @foreach ($weightSlabs as $slab)
                            <option value="{{ $slab->id }}"
                                {{ in_array($slab->id, $company->selectedSlabs) ? 'selected' : '' }}>
                                {{ $slab->weight }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Save Button -->
                    <div class="col-md-3 hidden-section" id="buttons-{{ strtolower($company->name) }}"
                        style="{{ $company->isChecked ? 'display:block' : 'display:none' }}">
                        <button class="btn btn-success btn-sm mr-2" type="submit">Save</button>
                        <button class="badge text-sm fw-semibold bg-primary-600 px-20 py-9 radius-4 text-white">
                            <a href="{{ route('courier-rate-slab', ['company_id' => $company->id, 'user_id' => request()->user_id]) }}">
                                Priority
                            </a>
                        </button>
                    </div>
                </div>
            </form>
            @endforeach

        </div>
    </div>
</div>

<!-- jQuery (must be included before Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 for Multiple Select Dropdown -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        // Initialize Select2 for multiple selection
        $(".weight-slab-select").select2({
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Choose weight slab",
            closeOnSelect: false,
        });

        // Toggle switch functionality
        $(".toggle-switch").change(function() {
            var target = $(this).data("target");
            if ($(this).is(":checked")) {
                $("#select-" + target + "-container").show();
                $("#buttons-" + target).show();
            } else {
                $("#select-" + target + "-container").hide();
                $("#buttons-" + target).hide();
            }
        });

        // Ensure sections are visible for pre-checked switches on page load
        $(".toggle-switch").each(function() {
            var target = $(this).data("target");
            if ($(this).is(":checked")) {
                $("#select-" + target + "-container").show();
                $("#buttons-" + target).show();
            }
        });
    });
</script>
@endsection