    <!-- content -->
    <main class="py-5">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-title">
                  <strong>edite Contact</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="form-group row">
                        <label  for="firstName" class="col-md-3 col-form-label">First Name</label>
                        <div class="col-md-9">

                          <input value="{{ old('firstName' ,$contact->firstName) }}" type="text" name="firstName" id="firstName"
                                 class="form-control @error('firstName') is-invalid @enderror">

                                @error('firstName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="lastName" class="col-md-3 col-form-label">Last Name</label>
                        <div class="col-md-9">
                          <input value="{{ old('lastName' , $contact->lastName) }}"  type="text" name="lastName" id="lastName"
                            class="form-control @error('lastName') is-invalid @enderror">

                            @error('lastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                          <input value="{{ old('email' , $contact->email) }}" type="text" name="email" id="email"
                          class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-9">
                          <input value="{{ old('phone' , $contact->phone) }}" type="text" name="phone" id="phone"
                           class="form-control @error('phone') is-invalid @enderror">
                           @error('phone')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                          <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror"> {{ old('address' , $contact->address) }}</textarea>
                          @error('address')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="idGroup" class="col-md-3 col-form-label">Company</label>
                        <div class="col-md-9">

                          <select   name="idGroup" id="idGroup" class="form-control" >

                            @foreach ($groupsdropbox as $id => $GroupName)
                              <option {{  $id == old('idGroup',$contact->idGroup) ? 'selected' : ''}} value="{{$id}}" >{{ $GroupName }}</option>
                            @endforeach

                          </select>

                        </div>
                      </div>
                      <hr>
                      <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="index.html" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
