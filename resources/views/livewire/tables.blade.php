@extends('layouts.app')
@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
    <h6 class="text-white text-capitalize ps-3">Student Profile</h6>
</div>

            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Profile</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gender</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $row)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex px-2">
                                            
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{ $row->firstname }} {{ $row->lastname }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ $row->email }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ $row->age }}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ ucfirst($row->gender) }}</span>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ $row->phonenumber }}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs">{{ $row->category }}</span>
                                    </td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-secondary text-sm">No Student Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection