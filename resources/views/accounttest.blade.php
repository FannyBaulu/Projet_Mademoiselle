<!DOCTYPE html>
@extends('layouts.header')
@section('stylesheet')
    <style>
        .menu-item{
            border-color: coral;
            margin:1em;
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex flex-row" style="min-height: 500px;">
        <div class="d-flex flex-column justify-content-between">
                <a class="menu-item btn " href="http://justinfarrow.com">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        My account
                    </span>
                </a>
                <a class="menu-item btn" href="#">
                    <i class="fa fa-laptop fa-2x"></i>
                    <span class="nav-text">
                        My information
                    </span>
                </a>
                <a class="menu-item btn" href="#">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        My orders
                    </span>
                </a>
                <a class="menu-item btn" href="#">
                    <i class="fa fa-folder-open fa-2x"></i>
                    <span class="nav-text">
                        Feedback
                    </span>
                </a>
                <a class="menu-item btn" href="#">
                    <i class="fa fa-bar-chart-o fa-2x"></i>
                    <span class="nav-text">
                        Wishlist
                    </span>
                </a>
                <a class="menu-item btn" href="#">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
        </div>
        <div class="container">
            <h1 class="text-center">TEST</h1>
        </div>
    </div>
@endsection

