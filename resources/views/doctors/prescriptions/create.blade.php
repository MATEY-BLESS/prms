@extends('layouts.doctor')
@section('content')

{{-- Doctor's Patients --}}
<div class="col-md-12">
    <div class="top-articles">
        <h3 class="stat-heading text-center">Write Prescriptions for <br> <br>
            <b>
                <span class="bg-warning px-2">{{$appointment->patient->user->name}}</span>
            </b>
        </h3>

        <form action="{{route('dashboard.doctors.prescription.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 px-5">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="row">
                        {{-- patient name --}}
                        <input type="hidden" name="patient_id" value="{{$appointment->patient->user->id}}">
                        <input type="text" name="doctor_id" value="{{$appointment->doctor->id}}">

                        {{-- disease --}}
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Disease or Ailment</label>
                                <input  class="form-control @error('disease') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="disease">

                                @error('disease')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- describe issue or symptoms --}}
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <label for="details" class="form-label">Symptoms Details</label>
                                <textarea class="form-control" id="ck-editor"
                                            rows="10" name="details"
                                            value="{{old('details')}}"></textarea>

                                @error('details')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- describe issue or symptoms --}}
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <label for="medicine" class="form-label">Medicine/ Prescription</label>
                                <textarea class="form-control" id="ck-editor"
                                            rows="10" name="medicine"
                                            value="{{old('medicine')}}"></textarea>

                                @error('medicine')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- any notes --}}
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <label for="note" class="form-label">Any Note (option)</label>
                                <textarea class="form-control" id="ck-editor"
                                            rows="10" name="note"
                                            value="{{old('note')}}"></textarea>

                                @error('note')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>




                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm"
                                style="width: 100%;">SUBMIT</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>


            </div>
        </form>

    </div>
</div>
{{-- End section 2 --}}

@endsection

