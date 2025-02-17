@extends('layouts.admin')

@section('title', 'User Charges')

@section('content')
    <div class="dashboard-main-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Edit Courier Weight Slab</h5>
                <button class="badge text-sm fw-semibold bg-success-600 px-20 py-9 radius-4 text-white"><a href="{{ route('courier-rate-slab') }}">Priority</a></button>
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
            </style>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>delhivery</p>
                    </div>
                    <div class="col-md-2">
                        <span class="switch">
                            <input id="switch-rounded1" type="checkbox" />
                            <label for="switch-rounded1"></label>
                        </span>
                    </div>
                    <div class="col-md-7">
                        <select class="form-select" id="multiple-select-field" data-placeholder="Choose weight slab" multiple>
                            <option value="1">0.5kg</option>
                            <option value="2">1kg</option>
                            <option value="3">2kg</option>
                            <option value="3">4kg</option>
                            <option value="3">5kg</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>Xpressbeez</p>
                    </div>
                    <div class="col-md-2">
                        <span class="switch">
                            <input id="switch-rounded2" type="checkbox" />
                            <label for="switch-rounded2"></label>
                        </span>
                    </div>
                    <div class="col-md-7">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (must be included before Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
        });
    </script>
@endsection
