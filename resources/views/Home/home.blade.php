@extends('layouts.app')

@section('content')
<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<div class="container text-center mt-5" style="position: relative; z-index: 2;">
    <h1 style="font-weight: bold; color: #00008b; font-size: 3em; font-family: 'Lobster', cursive;">Local Labour Works
    </h1>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="What do you need help with?"
            aria-label="Recipient's username">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Service Categories -->
        <div class="col-md-4">
            <div class="p-2 service-card">
                <img src="moving.jpeg" alt="Assembly" class="service-image">
                <p class="service-title">Moving Service <br>
                    Starting at MVR1400</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-2 service-card">
                <img src="assembly.jpg" alt="Assembly" class="service-image">
                <p class="service-title">Assembly <br>
                    Starting at MVR300</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-2 service-card">
                <img src="cleaning.jpg" alt="Assembly" class="service-image">
                <p class="service-title">Cleaning <br>
                    Starting at MVR400</p>
            </div>
        </div>

    </div>
</div>

<!-- Background Image -->
<style>
    body {
        background: url('backgroundp.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .container::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('background.jpg') no-repeat center center;
        background-size: cover;
        opacity: 0.4;
        z-index: 1;
    }

    .service-card {
        background-color: #333;
        border-radius: 8px;
        padding: 20px;
        color: #fff;
        text-align: center;
        transition: transform 0.2s;
        height: 350px;
        /* Increase the height as needed */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .service-card:hover {
        transform: scale(1.05);
    }

    .service-image {
        max-height: 200px;
        width: auto;
        margin-bottom: 10px;
        object-fit: cover;
    }

    .service-title {
        font-family: 'Lobster', cursive;
        font-size: 1.5em;
        margin-top: auto;
    }
</style>
@endsection