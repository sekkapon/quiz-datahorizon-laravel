@extends('template/body')

@section('content')

<style>
    .key {
        text-decoration: underline;
    }

    .btn-solve {
        margin-top: 250px;
        border: 2px solid #ffff;
        border-radius: 25px;
        cursor: pointer;
    }
</style>

<section class="hero" id="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="animated bounceInDown">SOLVE</h1>
                <h3 class="animated bounceInDown"> - Coding Instructions -</h3>
                <p class="animated bounceInDown">HIER + GIBT + ES = NEUES</p>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">
                <h3 class="animated bounceInDown key"> Math conditions </h3>
                <p class="animated bounceInDown">- H , E , G , N != 0 </p>
                <p class="animated bounceInDown">- R + T = 10 because S + (10) = S</p>
                <p class="animated bounceInDown">- N = 1 because no leading zeros and max value of H + G = 1X</p>
                <p class="animated bounceInDown">- 2E + B + 1(carray num from R + T + S) > 12 </p>
                <p class="animated bounceInDown">- E <= 7 because max value of H and G is 9 + 8</p>
                        <p class="animated bounceInDown">- 12 <= H + G <=17 </p>
                                <p class="animated bounceInDown">- U is odd integer because 2I is even number but even number +1 (carry number from 2E + B + 1) will make U is odd number</p>

            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center btn-solve" onclick="calulate()">
                    <h3>CALCULATE<h3>
                </div>
            </div>

        </div>
    </div>
</section>
@stop


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    calulate = () => {
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/calculate",
            processData: false,
            contentType: false,
        }).done(function(respone) {
            res = JSON.parse(respone)
            console.log(res);
            if (res.code == 1) {
                alert(`\n
                HIER + GIBT + ES = NEUES\n
                ${res.data[0]} + ${res.data[1]} + ${res.data[2]} = ${res.data[3]}\n
                Number of loop is ${res.countLoop}\n
                Thank you ^^`);
            }
        });
    }
</script>