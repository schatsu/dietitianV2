<div
    x-data="{ rating: {{ $getRecord()->rating }} }"
    x-init="
        let waitForRater = setInterval(() => {
            if (typeof raterJs !== 'undefined') {
                clearInterval(waitForRater);
                raterJs({
                    element: $el,
                    starSize: 20,
                    step: 1,
                    rating: rating,
                    readOnly: true,
                });
            }
        }, 100);
    "
    style="min-height: 28px;"
></div>
@once
    <link href="https://cdn.jsdelivr.net/npm/rater-js@1.0.1/lib/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/rater-js@1.0.1/index.min.js"></script>
@endonce
