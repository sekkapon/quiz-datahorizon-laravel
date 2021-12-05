@extends('template/body')

@section('content')
<style>
    .key {
        text-decoration: underline;
    }

    .btn-solve {
        margin-top: 50px;
        border: 2px solid #ffff;
        border-radius: 25px;
    }
</style>
<section class="hero" id="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="animated bounceInDown">Coding Challenge</h1>
                <h3 class="animated bounceInDown"> - Coding Instructions -</h3>
                <p class="animated bounceInDown">The following German words represent a mathematical formula:</p>
                <p class="animated bounceInDown key">HIER + GIBT + ES = NEUES</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h3 class="animated bounceInDown"> - Conditions -</h3>
                <p class="animated bounceInDown">every letter symbolizes one digit [0..9]</p>
                <p class="animated bounceInDown">the 10 different letters have to be 10 different digits</p>
                <p class="animated bounceInDown">every word is an unsigned integer number (no leading zeros)</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h3 class="animated bounceInDown"> - Challenge -</h3>
                <p class="animated bounceInDown">create a PHP class containing a private method that solves the problem mentioned</p>
                <p class="animated bounceInDown">“worst case” solution: brute force (1010 iterations = 10,000,000,000 iterations)</p>
                <p class="animated bounceInDown">“best case” solution: use mathematical rules to reduce the amount of iterations of the problem (“if then continue”)</p>
                <p class="animated bounceInDown">use a counter variable to measure the amount of loops needed to find possible results</p>
                <p class="animated bounceInDown">the method should output all results – if there are any – including the amount if iterations needed</p>
                <p class="animated bounceInDown">use comments to describe the mathematical rules used to reduce the complexity of the task</p>
                <p class="animated bounceInDown">the first place goes to the correct solution having the least iterations</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center btn-solve" >
                <a href="{{url('/solve')}}">
                    <h3>SOLVE<h3>
                </a>
            </div>
        </div>
    </div>
</section>
@stop