<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link rel="icon" href="/images/madayaw.png">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="header text-center">
        <h1>MADAYAW LENDING INVESTORS INC.</h1>
        <h2>Application For Loan</h2>
    </div>

    <div class="section">
        <div class="h3 text-uppercase font-weight-bold">A. Personal Data</div>
        <div class="row">
            <div class="col-6">
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="John Edward R. Labor">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Age:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="12">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Date of Birth:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="04/30/1983">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-2 col-form-label">Mailing Address:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="Block 10 Lot 12 South Villa Country Homes Ma-a">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Contact:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="09496961658">
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Civil Status:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="Married">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-4 col-form-label">Name of Spouse:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="Christel Ann Anib Lingayar">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Is spouse living:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="yes">
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Date of Death</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="11/13/1996">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-4 col-form-label">Cause of Death</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="Heart Disease">
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    PENSION INFORMATION DATA--}}
    <div class="section">
        <div class="h3 text-uppercase font-weight-bold">B. PENSION INFORMATION DATA</div>
        <div class="row">
            <div class="col-6">
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="John Edward R. Labor">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Age:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="12">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Date of Birth:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="04/30/1983">
                    </div>
                </div>
            </div>
        </div>

           <div class="row">
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Pension ID#:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="09-23423423-3">
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Type of Pension:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="ED">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col-4 col-form-label">Amount:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="9999">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Previous Employer:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="DecoArts Marketing Incorporated">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Length Of Service:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="23">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Pension Remittance Through:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="ATM">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Bank:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="RCBC">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Date Pension Started:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="09/23/2018">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Branch:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="Toril">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Savings Acct. No.</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="3453454">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" row">
                    <label for="staticEmail" class="col col-form-label">Date of Birth:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="staticEmail" value="04/30/1983">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>
