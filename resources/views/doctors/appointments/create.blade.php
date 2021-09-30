@extends('layouts.doctor')
@section('content')

{{-- Doctor's Patients --}}
<div class="col-md-12">
    <div class="top-articles">
        <h5 class="stat-heading">Give Appointment</h5>

        <form action="{{route('dashboard.doctors.appointments.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                {{-- select patient --}}
                <div class="col-md-4 my-2">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Patient</label>
                        <select class="form-select @error('patient') is-invalid @enderror"
                                id="patient" name="patient"
                                value="{{old('patient')}}"
                                style="width:100%;"
                                required>

                            <option>Select patient</option>
                            @forelse (auth()->user()->appointments as $appointment)
                                {{-- @foreach ($appointment->patients as $patient) --}}
                                <option value="{{$appointment->patient->id}}">{{$appointment->patient->user->name}}</option>
                                {{-- @endforeach --}}

                            @empty
                                <option value="#">No patients assigned</option>
                            @endforelse

                        </select>

                        @error('patient')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                {{-- purpose --}}
                <div class="col-md-4 my-2">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Purpose</label>
                        <input  class="form-control @error('purpose') is-invalid @enderror"
                                type="text" id="formFile"
                                name="purpose">

                        @error('purpose')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                {{-- select date --}}
                <div class="col-md-4 my-2">
                    <div class="form-group">
                        <label for="date" class="form-label">Select Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                id="date" placeholder="Enter date"
                                name="date" value="{{old('date')}}"
                                required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>

                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                {{-- describe issue or symptoms --}}
                <div class="form-group my-3">
                    <label for="issue" class="form-label">Describe your issue or symptoms</label>
                    <textarea class="form-control" id="ck-editor"
                                rows="10" name="issue"
                                value="{{old('issue')}}"></textarea>

                    @error('issue')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm"
                        style="width: 100%;">SUBMIT</button>
                </div>
            </div>
        </form>

    </div>
</div>
{{-- End section 2 --}}

@endsection

