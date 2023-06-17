  @extends('layouts.main')


  @section('content')

  <main class="py-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-title">
                          <div class="d-flex align-items-center">
                              <h2 class="mb-0">All Contacts</h2>
                              <div class="ml-auto">
                                  <a href="{{ route('Contact.Index') }}" class="btn btn-success"><i
                                          class="fa fa-plus-circle"></i> Add New</a>
                              </div>
                          </div>
                      </div>


                      @include('content/filterContact')

                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Company</th>
                                  <th scope="col">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if ( $message = session('message'))
                              <div class="alert alert-success"> {{ $message }} </div>
                              @endif


                              @foreach ($contacts as $index => $contact)
                              <tr>
                                  <th scope="row">{{ $index+$contacts->firstItem() }}</th>
                                  <td>{{ $contact->firstName }}</td>
                                  <td>{{ $contact->lastName }}</td>
                                  <td>{{ $contact->email }}</td>
                                  <td>{{ $contact->group->Group }}</td>
                                  <td width="150">
                                      <a href="{{ route('Contact.show'     ,$contact->id)}}"
                                          class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                              class="fa fa-eye"></i></a>
                                      <a href="{{ route('Contact.showedite',$contact->id)}}"
                                          class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                              class="fa fa-edit"></i></a>
                                      <a href="{{ route('Contact.delet'    ,$contact->id)}}"
                                          class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i
                                              class="fa fa-times"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>

                          <form action="" style="display: non" method="POST" id="form-delet">
                              @csrf
                              @method('DELETE')
                          </form>

                      </table>
                      {{ $contacts->appends(request()->only('idGroups'))->links() }}
                  </div>
              </div>
          </div>
      </div>
      </div>
  </main>
  @endsection
