@extends('layouts.success')

@section('title')
    Store Success Page
@endsection

@section('content')
<div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/logo.svg" alt="" class="mb-4" />
              <h2>Register Success</h2>
              <p>
                Kamu sudah berhasil terdaftar bersama kami.<br />
                Let’s grow up now.
              </p>
              <div>
                <a href="{{ route('dashboard') }}" class="btn btn-success w-50 mt-4">
                  My Dashboard
                </a>
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-4">
                  Go To Shopping
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection