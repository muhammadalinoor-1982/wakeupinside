<div class="form-group">
    <label class="col-md-6">User Name</label>
    <div class="col-md-6">
        <input name="name" value="{{ old('name',isset($crud111)?$crud111->name:null) }}" type="text" placeholder="Enter user Name" class="form-control form-control-line @error('name') is-invalid @enderror">
    </div>
    @error('name')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Email</label>
    <div class="col-md-6">
        <input name="email" value="{{ old('email',isset($crud111)?$crud111->email:null) }}" type="text" placeholder="Enter your email" class="form-control form-control-line @error('email') is-invalid @enderror">
    </div>
    @error('email')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Phone</label>
    <div class="col-md-6">
        <input name="phone" value="{{ old('phone',isset($crud111)?$crud111->phone:null) }}" type="number" placeholder="Enter your Phone Number" class="form-control form-control-line @error('phone') is-invalid @enderror">
    </div>
    @error('phone')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Address</label>
    <div class="col-md-6">
        <textarea rows="5" name="address" class="form-control form-control-line @error('address') is-invalid @enderror">{{ old('address',isset($crud111)?$crud111->address:null) }}</textarea>
    </div>
    @error('address')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Gender</label>
    @php
        if(old("gender")){
            $gender = old('gender');
        }elseif(isset($crud111)){
            $gender = $crud111->gender;
        }else{
            $gender = null;
        }
    @endphp
    <div class="col-md-6">
        <input name="gender" @if($gender =='male') checked @endif value="male" type="radio" id="male"> <label for="male">Male</label>
        <input name="gender" @if($gender =='female') checked @endif value="female" type="radio" id="female"> <label for="female">Female</label>
        <input name="gender" @if($gender =='others') checked @endif value="others" type="radio" id="others"> <label for="others">Others</label>
    </div>
    @error('gender')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Status</label>
    @php
        if(old("status")){
            $status = old('status');
        }elseif(isset($crud111)){
            $status = $crud111->status;
        }else{
            $status = null;
        }
    @endphp
    <div class="col-md-6">
        <input name="status" @if($status =='active') checked @endif value="active" type="radio" id="active"> <label for="active">Active</label>
        <input name="status" @if($status =='inactive') checked @endif value="inactive" type="radio" id="inactive"> <label for="inactive">Inactive</label>
    </div>
    @error('status')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
