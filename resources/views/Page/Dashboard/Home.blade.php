@extends('Layouts.main')

@section('title')

<title>Dashboard</title>



@endsection

@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-7 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title" style="color: black">Congratulations John! 🎉</h5>
                <p class="mb-4" style="color: black">
                  You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                  your profile.
                </p>

                <a href="https://www.youtube.com/" class="btn btn-sm btn-success">View Badges</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset ('assets/img/illustrations/man-with-laptop-light.png')}}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

  </div>

















@endsection
