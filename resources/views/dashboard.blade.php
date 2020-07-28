@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Settings</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route("setting.index")}}" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Contact Email</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                       {{$Settings->site_name}}
                                    </th>
                                    <td>
                                        {{$Settings->contact_number}}
                                    </td>
                                    <td>
                                        {{$Settings->contact_email}}
                                    </td>
                                    <td>
                                        {{$Settings->address}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
