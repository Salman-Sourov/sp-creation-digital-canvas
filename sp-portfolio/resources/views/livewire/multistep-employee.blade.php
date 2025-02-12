<div>
    <form wire:submit.prevent="register">
        @if($currentStep == 1)
            <div class="card">
                    <div class="card-header bg-secondary text-white center text-justify">STEP 1/4 - Personal Info</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Id(Unique)</label>
                                    <input type="number" class="form-control @if($errors->has('employee_id')) is-invalid @endif" placeholder="Enter Employee Unique Id" wire:model="employee_id">
                                    @if($errors->has('employee_id'))
                                        <span class="error invalid-feedback">{!! $errors->first('employee_id') !!}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name(English)</label>
                                    <input type="text" class="form-control @if($errors->has('name_english')) is-invalid @endif" placeholder="Enter Employee Name(English)" wire:model="name_english">
                                    @if($errors->has('name_english'))
                                        <span class="error invalid-feedback">{!! $errors->first('name_english') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name(Bangla)</label>
                                    <input type="text" class="form-control @if($errors->has('name_bangla')) is-invalid @endif" placeholder="Enter Employee Name(Bangla)" wire:model="name_bangla">
                                    @if($errors->has('name_bangla'))
                                        <span class="error invalid-feedback">{!! $errors->first('name_bangla') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Father Name(English)</label>
                                    <input type="text" class="form-control @if($errors->has('father_name_english')) is-invalid @endif" placeholder="Enter Employee Father Name(English)" wire:model="father_name_english">
                                    @if($errors->has('father_name_english'))
                                        <span class="error invalid-feedback">{!! $errors->first('father_name_english') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Father Name(Bangla)</label>
                                    <input type="text"  class="form-control @if($errors->has('father_name_bangla')) is-invalid @endif" placeholder="Enter Employee Father Name(Bangla)" wire:model="father_name_bangla">
                                    @if($errors->has('father_name_bangla'))
                                        <span class="error invalid-feedback">{!! $errors->first('father_name_bangla') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Mother Name(English)</label>
                                    <input type="text" class="form-control @if($errors->has('mother_name_english')) is-invalid @endif" placeholder="Enter Employee Mother Name(English)" wire:model="mother_name_english">
                                    @if($errors->has('mother_name_english'))
                                        <span class="error invalid-feedback">{!! $errors->first('mother_name_english') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Mother Name(Bangla)</label>
                                    <input type="text" class="form-control @if($errors->has('mother_name_bangla')) is-invalid @endif" placeholder="Enter Employee Mother Name(Bangla)" wire:model="mother_name_bangla">
                                    @if($errors->has('mother_name_bangla'))
                                        <span class="error invalid-feedback">{!! $errors->first('mother_name_bangla') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Spouse Name</label>
                                    <input type="text" class="form-control @if($errors->has('spouse_name1')) is-invalid @endif" placeholder="Enter Employee Spouse Name" wire:model="spouse_name1">
                                    @if($errors->has('spouse_name1'))
                                        <span class="error invalid-feedback">{!! $errors->first('spouse_name1') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Spouse Name</label>
                                    <input type="text"  class="form-control @if($errors->has('spouse_name2')) is-invalid @endif" placeholder="Enter Employee Spouse Name" wire:model="spouse_name2">
                                    @if($errors->has('spouse_name2'))
                                        <span class="error invalid-feedback">{!! $errors->first('spouse_name2') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date Of Birth</label>
                                    <input type="date" class="form-control @if($errors->has('date_of_birth')) is-invalid @endif" placeholder="Date Of Birth" wire:model="date_of_birth">
                                    @if($errors->has('date_of_birth'))
                                        <span class="error invalid-feedback">{!! $errors->first('date_of_birth') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Blood Group</label>
                                    <input type="text" class="form-control @if($errors->has('blood_group')) is-invalid @endif" placeholder="Enter Blood Group" wire:model="blood_group">
                                    @if($errors->has('blood_group'))
                                        <span class="error invalid-feedback">{!! $errors->first('blood_group') !!}</span>

                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gender</label><br>
                                        <select class="form-control @if($errors->has('gender')) is-invalid @endif" wire:model="gender">
                                            <option value="" selected>Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>

                                    @if($errors->has('gender'))
                                        <span class="error invalid-feedback">{!! $errors->first('gender') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marital Status</label><br>
                                    <select class="form-control @if($errors->has('marital_status')) is-invalid @endif" wire:model="marital_status">
                                        <option value="" selected>Select Status</option>
                                        <option value="1">Married</option>
                                        <option value="2">Unmarried</option>
                                    </select>
                                    @if($errors->has('marital_status'))
                                        <span class="error invalid-feedback">{!! $errors->first('marital_status') !!}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if($currentStep == 2)
            <div class="card">
                <div class="card-header bg-secondary text-white center text-justify">STEP 2/4 - Address Info</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Present Address(English)</label>
                                    <input type="text" class="form-control @if($errors->has('present_address_english')) is-invalid @endif" placeholder="Enter Present Address(English)" wire:model="present_address_english">
                                    @if($errors->has('present_address_english'))
                                        <span class="error invalid-feedback">{!! $errors->first('present_address_english') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Present Address(Bangla)</label>
                                    <input type="text" class="form-control @if($errors->has('present_address_bangla')) is-invalid @endif" placeholder="Enter Present Address(Bangla)" wire:model="present_address_bangla">
                                    @if($errors->has('present_address_bangla'))
                                        <span class="error invalid-feedback">{!! $errors->first('present_address_bangla') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Permanent Address(Bangla)</label>
                                    <input type="text" class="form-control @if($errors->has('permanent_address_bangla')) is-invalid @endif" placeholder="Enter Permanent Address(Bangla)" wire:model="permanent_address_bangla">
                                    @if($errors->has('permanent_address_bangla'))
                                        <span class="error invalid-feedback">{!! $errors->first('permanent_address_bangla') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NID</label>
                                    <input type="text"  class="form-control @if($errors->has('nid')) is-invalid @endif" placeholder="Enter NID" wire:model="nid">
                                    @if($errors->has('nid'))
                                        <span class="error invalid-feedback">{!! $errors->first('nid') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="text" class="form-control @if($errors->has('mobile')) is-invalid @endif" placeholder="Enter Mobile" wire:model="mobile">
                                    @if($errors->has('mobile'))
                                        <span class="error invalid-feedback">{!! $errors->first('mobile') !!}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter Email" wire:model="email">
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback">{!! $errors->first('email') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($currentStep == 3)
                <div class="card">
                    <div class="card-header bg-secondary text-white center text-justify">STEP 3/4 - Office Info</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Department</label><br>
                                        <select  class="form-control @if($errors->has('department_id')) is-invalid @endif" wire:model="department_id">
                                            <option>Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('department_id'))
                                            <span class="error invalid-feedback">{!! $errors->first('department_id') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Designation</label><br>
                                        <select class="form-control @if($errors->has('designation_id')) is-invalid @endif" wire:model="designation_id">
                                            <option>Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('designation_id'))
                                            <span class="error invalid-feedback">{!! $errors->first('designation_id') !!}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date Of Join</label>
                                        <input type="date"  class="form-control @if($errors->has('date_of_join')) is-invalid @endif" wire:model="date_of_join">
                                        @if($errors->has('date_of_join'))
                                            <span class="error invalid-feedback">{!! $errors->first('date_of_join') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Commission Date</label>
                                        <input type="date" class="form-control @if($errors->has('commission_date')) is-invalid @endif" wire:model="commission_date">
                                        @if($errors->has('commission_date'))
                                            <span class="error invalid-feedback">{!! $errors->first('commission_date') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Date</label>
                                        <input type="date" class="form-control @if($errors->has('promotion_date')) is-invalid @endif" wire:model="promotion_date">
                                        @if($errors->has('promotion_date'))
                                            <span class="error invalid-feedback">{!! $errors->first('promotion_date') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telephone Of Office</label>
                                        <input type="text" class="form-control @if($errors->has('telephone_office')) is-invalid @endif" placeholder="Telephone Of Office" wire:model="telephone_office">
                                        @if($errors->has('telephone_office'))
                                            <span class="error invalid-feedback">{!! $errors->first('telephone_office') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telephone Of Home</label>
                                        <input type="text" class="form-control @if($errors->has('telephone_home')) is-invalid @endif" placeholder="Telephone Of Home" wire:model="telephone_home">
                                        @if($errors->has('telephone_home'))
                                            <span class="error invalid-feedback">{!! $errors->first('telephone_home') !!}</span>
                                    @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PBX</label>
                                        <input type="text" class="form-control @if($errors->has('pbx')) is-invalid @endif" placeholder="PBX" wire:model="pbx">
                                        @if($errors->has('pbx'))
                                            <span class="error invalid-feedback">{!! $errors->first('pbx') !!}</span>
                                    @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Salary</label>
                                        <input type="number" class="form-control @if($errors->has('salary')) is-invalid @endif" placeholder="Enter Salary" wire:model="salary">
                                        @if($errors->has('salary'))
                                            <span class="error invalid-feedback">{!! $errors->first('salary') !!}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                @if($currentStep == 4)
                    <div class="card">
                        <div class="card-header bg-secondary text-white center text-justify">STEP 3/4 - Emergency Info</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emergency Contact</label>
                                            <input type="text" class="form-control @if($errors->has('emergency_contact')) is-invalid @endif" placeholder="Emergency Contact" wire:model="emergency_contact">
                                            @if($errors->has('emergency_contact'))
                                                <span class="error invalid-feedback">{!! $errors->first('emergency_contact') !!}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Relation With Emergency Contact</label>
                                            <input type="text" class="form-control @if($errors->has('emergency_relation')) is-invalid @endif" placeholder="Relation With Emergency Contatct" wire:model="emergency_relation">
                                            @if($errors->has('emergency_relation'))
                                                <span class="error invalid-feedback">{!! $errors->first('emergency_relation') !!}</span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Photo</label>
                                            <input type="file" class="form-control mb-1" id="formFile" onChange="mainThamUrl(this)" wire:model="employee_photo">
                                            <img src="" style="margin:auto;display:block;" class="mb-2" id="mainThmb" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Signature</label>
                                            <input type="file" class="form-control mb-1" id="formFile2" onChange="mainThamUrl2(this)" wire:model="employee_sign">
                                            <img src="" style="margin:auto;display:block;" class="mb-2" id="mainThmb2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endif

                    <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2 px-2">
                        @if($currentStep == 1)
                            <div></div>
                        @endif

                        @if($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                            <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep();">Previous</button>
                        @endif

                        @if($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                            <button type="button" class="btn btn-md btn-success"  wire:click="increaseStep();">Next</button>
                        @endif
                        @if($currentStep == 4)
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        @endif
                    </div>

    </form>



</div>




