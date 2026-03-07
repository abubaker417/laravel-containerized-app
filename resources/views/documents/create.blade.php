<!DOCTYPE html>
<html>
<head>
    <title>Upload Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <!-- jQuery (Toastr requires it) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <h1>Upload New Document</h1>

    <a href="{{ route('documents.index') }}">Back to List</a>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <div class="phone-field">
            <input 
                type="tel" 
                id="phone" 
                name="phone_display"
                placeholder="Enter phone number"
                autocomplete="off"
            />
            <!-- This hidden field sends the full number (+923001234567) to Laravel -->
            <input type="hidden" name="phone" id="phone_full" />
        </div>

        @error('phone')
            <span class="error">{{ $message }}</span>
        @enderror

        <label>Select File (PNG, JPG, JPEG, PDF):</label><br>
        <input type="file" name="file" required><br><br>

        <button type="submit">Upload</button>
    </form>

    <script>
        const phoneInput = document.querySelector("#phone");

        const iti = window.intlTelInput(phoneInput, {
            // Load flags
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
            
            // Auto detect user's country (or set default)
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                // fetch("https://ipapi.co/json")
                fetch("https://ip-api.com/json")    
                    .then(res => res.json())
                    // .then(data => callback(data.country_code))
                    .then(data => callback(data.countryCode))
                    .catch(() => callback("PK")); // fallback
            },

            // Show selected dial code
            separateDialCode: true,

            // Show placeholder based on country format
            autoPlaceholder: "polite",

            // Preferred countries at top of list
            preferredCountries: ["pk", "us"],
        });

        // Block alphanumeric — only allow numbers, +, -, spaces, ()
        phoneInput.addEventListener("keypress", function(e) {
            if (!/[\d\s\+\-\(\)]/.test(e.key)) {
                e.preventDefault(); // BLOCKS letters and special chars
            }
        });

        // On paste — strip non-numeric characters
        phoneInput.addEventListener("paste", function(e) {
            e.preventDefault();
            const pasted = (e.clipboardData || window.clipboardData).getData("text");
            const cleaned = pasted.replace(/[^0-9\+\-\s\(\)]/g, "");
            this.value = cleaned;
        });

        // Before form submit — put full international number in hidden field
        document.querySelector("form").addEventListener("submit", function(e) {
            if (iti.isValidNumber()) {
                // Sets +923001234567 format into hidden input for Laravel
                document.querySelector("#phone_full").value = iti.getNumber();
            } else {
                // e.preventDefault(); // Stop form submit
                // alert("Please enter a valid phone number for the selected country.");
                e.preventDefault();

                // ← REPLACE alert() WITH THIS
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "4000",
                };
                toastr.error("Please enter a valid phone number for the selected country.");
            }
        });
    </script>
</body>
</html>